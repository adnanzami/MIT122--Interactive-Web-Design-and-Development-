<?php
require 'config.php';


$message_sent = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    $message_sent = true;
}

session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – Contact Us</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
  <h1>Contact Us</h1>
  <p>Have a question or need help? Send us a message!</p>

  <?php if($message_sent): ?>
    <p style="color:green;">Thank you! Your message has been sent.</p>
  <?php endif; ?>

  <form method="post">
    <label>Your Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Your Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Message</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button class="findbtn" type="submit">Send Message</button>
  </form>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
