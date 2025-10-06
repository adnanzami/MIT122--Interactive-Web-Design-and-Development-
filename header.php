<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
$user_type = $_SESSION['user_type'] ?? '';
?>
<header class="site-header">
  <div class="nav container">
    <div class="brand">🐾 <span>SafePaws</span></div>
    <nav class="menu">
      <a href="index.php">Home</a>
      <a href="about_us.php">About Us</a>
      <a href="services.php">Services</a>
      <a href="sitters.php">View Sitters</a>
      <a href="register_sitter.php">Become a Sitter</a>
      <a href="contact_us.php">Contact Us</a>

      <?php if($logged_in && $user_type === 'sitter'): ?>
        <a href="bookings.php">My Bookings</a>
        <a href="logout.php">Logout</a>
      <?php elseif($logged_in && $user_type === 'booker'): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
