<?php
session_start();
?>
<header class="site-header">
  <div class="nav container">
    <div class="brand">🐾 <span>SafePaws</span></div>
    <nav class="menu" aria-label="Main navigation">
      <a href="index.php">Home</a>
      <a href="about_us.php">About Us</a>
      <a href="services.php">Services</a>
      <a href="sitters.php">View Sitters</a>
      <a href="register_sitter.php">Become a Sitter</a>
      <a href="contact_us.php">Contact Us</a>

      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="bookings.php">My Bookings</a>
        <span style="display:flex; align-items:center; gap:8px; margin-left:10px;">
          <img src="<?= htmlspecialchars($_SESSION['user_img'] ?? 'images/default-avatar.png') ?>" 
               alt="Profile" style="width:32px; height:32px; border-radius:50%; object-fit:cover; border:2px solid #fff;">
          <span style="color:#fff; font-weight:600;"><?= htmlspecialchars($_SESSION['user_name']) ?></span>
        </span>
        <a href="logout.php" style="margin-left:10px;">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register_owner.php">Register</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
