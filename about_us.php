<?php
require 'config.php'; // DB connection if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – About Us</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header">
<?php include 'header.php'; ?>
</header>


  <!-- Main content -->
  <main class="container" style="padding:28px 0 60px">
    <h1>About Us</h1>
  <p><strong>SafePaws</strong> connects pet owners with caring and trusted sitters. 
     Our mission is to ensure every paw receives love, care, and safety. 
     We make pet care simple, reliable, and stress-free.</p>

  <h2>Our Mission</h2>
  <p>To provide a safe, reliable, and friendly platform where pet owners can easily 
     find trusted sitters who treat every pet with love and respect.</p>

  <h2>Our Vision</h2>
  <p>To become the most trusted pet-sitting community, recognized for quality service, 
     transparency, and commitment to animal well-being across Australia and beyond.</p>

  <h2>Our Values</h2>
  <ul>
    <li>❤️ <strong>Care:</strong> Every pet deserves love and attention.</li>
    <li>✔️ <strong>Trust:</strong> Verified sitters with honest reviews.</li>
    <li>🔒 <strong>Safety:</strong> Prioritizing secure communication and bookings.</li>
    <li>🌍 <strong>Community:</strong> Building meaningful connections between sitters and owners.</li>
  </ul>

  <h2>Why choose SafePaws?</h2>
  <ul>
    <li>✓ Verified sitters</li>
    <li>⭐ Reviews from real pet owners</li>
    <li>💬 Easy communication</li>
    <li>📅 Flexible booking options</li>
    <li>📱 Mobile-friendly and easy to use</li>
    </ul>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>

