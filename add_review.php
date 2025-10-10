<?php
require 'config.php';


// Ensure user is logged in as a booker
if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'bookers'){
    header("Location: login.php");
    exit;
}

// Get sitter ID from URL
$sitter_id = $_GET['sitter_id'] ?? 0;

// Handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $rating = $_POST['rating'] ?? 0;
    $text = $_POST['text'] ?? '';
    $user_name = $_SESSION['user_name']; // store booker's name from session

    $stmt = $pdo->prepare("INSERT INTO reviews (sitter_id, user_name, rating, text) VALUES (?,?,?,?)");
    if($stmt->execute([$sitter_id, $user_name, $rating, $text])){
        header("Location: sitter_profile.php?id=$sitter_id");
        exit;
    } else {
        $error = "Failed to add review. Please try again.";
    }
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Review – SafePaws</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>Add Review</h1>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post">
    <label>Rating (1 to 5)</label>
    <select name="rating" required>
        <option value="">Select rating</option>
        <option value="1">1 ★</option>
        <option value="2">2 ★★</option>
        <option value="3">3 ★★★</option>
        <option value="4">4 ★★★★</option>
        <option value="5">5 ★★★★★</option>
    </select>

    <label>Review</label>
    <textarea name="text" rows="4" required placeholder="Write your review here..."></textarea>

    <button type="submit" class="findbtn">Submit Review</button>
</form>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
