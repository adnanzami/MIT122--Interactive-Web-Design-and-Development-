<?php
require 'config.php'; // DB connection if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SafePaws – Find a loving local pet sitter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- External stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--HEADER / NAVBAR -->
  <header class="site-header">
       <!-- Main navigation -->
       <?php include 'header.php'; ?>
  </header>

   <!--MAIN CONTENT-->
  <main class="container">
    <!-- Hero section -->
    <section class="hero">
      <!-- Left column -->
      <div class="hero-left">
        <h1>Find a loving local pet sitter</h1>
        <p class="tagline">LOVE, CARE, AND SAFETY FOR YOUR PETS.</p>

        <!-- Search form -->
        <form class="searchbar" action="sitters.html" method="get">
          <div class="field">
            <label for="service">I’m looking for</label>
            <select id="service" name="service" required>
              <option value="boarding">Dog Boarding</option>
              <option value="house-sitting">House Sitting</option>
              <option value="daycare">Doggy Day Care</option>
              <option value="walking">Dog Walking</option>
              <option value="dropin">Drop-in Visits</option>
            </select>
          </div>

          <div class="field">
            <label for="city">Near</label>
            <input id="city" type="text" name="city" placeholder="Enter your city" required>
          </div>

          <div class="field">
            <label for="date">On</label>
            <input id="date" type="date" name="date" required>
          </div>

          <button class="findbtn" type="submit" aria-label="Find sitter">🔍 Find sitter</button>
        </form>

        <!-- Trust badges -->
        <ul class="badges" aria-label="Key benefits">
          <li class="badge">✔ Verified sitters</li>
          <li class="badge">⭐ Owner reviews</li>
          <li class="badge">💬 Quick messaging</li>
        </ul>
      </div>

      <!-- Right column -->
      <div class="hero-right">
        <img src="images/imagen1.png" alt="Dog and cat friends">
      </div>
    </section>
  </main>
</body>
</html>



