<?php
require 'config.php'; // DB connection if needed
session_start()
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
    <section class="hero" style="margin-top:30px">
      <!-- Left column -->
      <div class="hero-left">
        <h1>Find a loving local pet sitter</h1>
        <p class="tagline">LOVE, CARE, AND SAFETY FOR YOUR PETS.</p>

        <!-- Search form -->
        <form class="searchbar" action="sitters.php" method="get">
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

          <button class="findbtn" type="submit" aria-label="Find sitter" style="margin-top: 15px">🔍 Find sitter</button>
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

    
    <h1>Our Services</h1>
    <p class="hero-desc">
    </p>
  

  <!-- Services description -->
  
    <h2>What we offer</h2>

    <article class="service">
      <h3>Dog Boarding</h3>
      <p>Your pet stays overnight at a sitter’s home with supervision, playtime, and regular updates. Perfect when you are away for several days.</p>
    </article>

    <article class="service">
      <h3>House Sitting</h3>
      <p>A sitter stays in your home to care for your pet and house. Includes feeding, walks, and basic household tasks like watering plants or bringing in mail.</p>
    </article>

    <article class="service">
      <h3>Doggy Day Care</h3>
      <p>Daytime care for dogs, providing play, socialization, and rest while you are at work or running errands.</p>
    </article>

    <article class="service">
      <h3>Dog Walking</h3>
      <p>Regular walks tailored to your dog’s needs, ensuring exercise and fresh air with safe, trusted sitters.</p>
    </article>

    <article class="service">
      <h3>Drop-in Visits</h3>
      <p>Quick visits to feed, refresh water, clean up, and spend time with your pet. Ideal for cats or independent pets that need short check-ins.</p>
    </article>

  </main>
  <?php include 'footer.php'; ?>
</body>

</html>

