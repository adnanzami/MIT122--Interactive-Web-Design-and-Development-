
<header class="site-header" style="background:#C8A2C8; padding:10px 0;">
  <div class="nav container" 
       style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap;">
    
    <!-- Brand -->
    <div class="brand" style="font-size:1.5rem; font-weight:bold; color:#fff;">
      🐾 <span>SafePaws</span>
    </div>

    <!-- Navigation Menu -->
    <nav class="menu" aria-label="Main navigation"
         style="display:flex; align-items:center; gap:18px; flex-wrap:wrap;">

      <a href="index.php" style="color:#fff; text-decoration:none;">Home</a>
      <a href="sitters.php" style="color:#fff; text-decoration:none;">View Sitters</a>
      <a href="register_sitter.php" style="color:#fff; text-decoration:none;">Become a Sitter</a>
      <a href="contact_us.php" style="color:#fff; text-decoration:none;">Contact Us</a>

      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php" style="color:#fff; text-decoration:none;">My Bookings</a>

        <!-- User Info + Logout -->
        <div style="display:flex; align-items:center; gap:10px; margin-left:10px;">
          
          <span style="color:#fff; font-weight:600;">
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </span>
          <a href="logout.php" style="color:#fff; text-decoration:none; margin-left:5px;">Logout</a>
        </div>

      <?php else: ?>
        <a href="login.php" style="color:#fff; text-decoration:none;">Login</a>
        <a href="register_owner.php" style="color:#fff; text-decoration:none;">Register</a>
      <?php endif; ?>
    </nav>
  </div>
</header>