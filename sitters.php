<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>SafePaws – View Sitters</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

  <!-- MAIN CONTENT -->
  <main class="container sitters-main" style="padding:28px 0 60px">
    <h1>Available Sitters</h1>
    <p class="intro">Browse trusted sitters and open their profiles to book.</p>

    <div class="grid sitters-grid" id="list">
      <?php
      try {
        $stmt = $pdo->query("SELECT * FROM sitters ORDER BY id DESC");
        $sitters = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($sitters) {
          foreach ($sitters as $sitter) {
            $services = !empty($sitter['services']) ? explode(',', $sitter['services']) : [];
            $imagePath = $sitter['img']; // default placeholder
            echo "<article class='card sitter-card'>
                    <img class='thumb' src='$imagePath' alt='Profile photo of {$sitter['name']}' />
                    <h3 class='sitter-name'>{$sitter['name']}</h3>
                    <p class='sitter-meta'>{$sitter['city']}</p>
                    <p class='sitter-tags'>";
                      foreach ($services as $srv) {
                        echo "<span class='chip'>" . htmlspecialchars(trim($srv)) . "</span>";
                      }
            echo    "</p>
                    <a class='btn btn-small' href='sitter_profile.php?id={$sitter['id']}'>View profile</a>
                  </article>";
          }
        } else {
          echo "<p>No sitters available yet. Be the first to <a href='register_sitter.php'>register as a sitter</a>.</p>";
        }
      } catch (PDOException $e) {
        echo "<p>Error fetching sitters: " . htmlspecialchars($e->getMessage()) . "</p>";
      }
      ?>
    </div>
  </main>
</body>
</html>




