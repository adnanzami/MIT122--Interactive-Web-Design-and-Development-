<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM bookings ORDER BY id DESC LIMIT 1");
$latest_booking = $stmt->fetch();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SafePaws – My Bookings</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>My Bookings</h1>
<div class="table-wrap">
<table class="table">
<tr>
    <th>Sitter Name</th>
    <td>
      <?php
      $stmt2 = $pdo->prepare("SELECT name FROM sitters WHERE id = ?");
      $stmt2->execute([$latest_booking['sitter_id']]);
      $sitter = $stmt2->fetch();
      echo htmlspecialchars($sitter['name'] ?? 'Unknown');
      ?>
    </td>
  </tr>
  <tr>
    <th>Owner Name</th>
    <td><?= htmlspecialchars($latest_booking['owner_name']) ?></td>
  </tr>
  <tr>
    <th>Date</th>
    <td><?= htmlspecialchars($latest_booking['date']) ?></td>
  </tr>
  <tr>
    <th>Notes</th>
    <td><?= nl2br(htmlspecialchars($latest_booking['notes'])) ?></td>
  </tr>
  <tr>
    <th>Status</th>
    <td><?= htmlspecialchars($latest_booking['status']) ?></td>
  </tr>


</tbody>
</table>
</div>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
