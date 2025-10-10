<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SafePaws – Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>Welcome, <?= htmlspecialchars($user_name) ?>!</h1>

<?php if ($user_type === 'sitter'): ?>
    <h2>Your Bookings</h2>
    <p>These are your upcoming bookings as a sitter.</p>

    <div class="table-wrap">
    <table class="table">
        <thead>
            <tr>
                <th>Owner Name</th>
                <th>Notes</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Fetch bookings for this sitter only
        $stmt = $pdo->prepare("SELECT * FROM bookings WHERE sitter_id = ? ORDER BY date ASC");
        $stmt->execute([$user_id]);
        $bookings = $stmt->fetchAll();

        if (!$bookings) {
            echo "<tr><td colspan='4'>No bookings yet.</td></tr>";
        } else {
            foreach ($bookings as $b) {
                echo "<tr>
                        <td>" . htmlspecialchars($b['owner_name']) . "</td>
                        <td>" . htmlspecialchars($b['notes']) . "</td>
                        <td>" . htmlspecialchars($b['date']) . "</td>
                        <td>" . htmlspecialchars($b['status']) . "</td>
                      </tr>";
            }
        }
        ?>
        </tbody>
    </table>
    </div>

<?php elseif ($user_type === 'booker'): ?>
    <h2>Your Bookings</h2>
    <p>These are your upcoming bookings as a pet owner.</p>

    <div class="table-wrap">
    <table class="table">
        <thead>
            <tr>
                <th>Sitter Name</th>
                <th>Notes</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $pdo->prepare("SELECT b.*, s.name AS sitter_name FROM bookings b
                               JOIN sitters s ON b.sitter_id = s.id
                               WHERE b.owner_email = ?
                               ORDER BY b.date ASC");
        // For booker, we use the email stored in session
        $owner_email = $_SESSION['user_email'] ?? '';
        $stmt->execute([$owner_email]);
        $bookings = $stmt->fetchAll();

        if (!$bookings) {
            echo "<tr><td colspan='4'>No bookings yet.</td></tr>";
        } else {
            foreach ($bookings as $b) {
                echo "<tr>
                        <td>" . htmlspecialchars($b['sitter_name']) . "</td>
                        <td>" . htmlspecialchars($b['notes']) . "</td>
                        <td>" . htmlspecialchars($b['date']) . "</td>
                        <td>" . htmlspecialchars($b['status']) . "</td>
                      </tr>";
            }
        }
        ?>
        </tbody>
    </table>
    </div>
<?php endif; ?>

</main>
<?php include 'footer.php'; ?>
</body>
</html>
