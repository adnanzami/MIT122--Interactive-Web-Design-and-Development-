<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM sitters");
$sitters = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – View Sitters</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container sitters-main" style="padding:28px 0 60px">
  <h1>Available Sitters</h1>
  <p class="intro">Browse trusted sitters and open their profiles to book.</p>

  <div class="grid sitters-grid">
    <?php foreach($sitters as $s): ?>
    <article class="card sitter-card">
      <img class="thumb" src="<?= $s['img'] ?>" alt="<?= $s['name'] ?>">
      <h3 class="sitter-name"><?= $s['name'] ?></h3>
      <p class="sitter-meta"><?= $s['city'] ?></p>
      <p class="sitter-tags">
        <?php foreach(explode(',', $s['services']) as $service): ?>
          <span class="chip"><?= $service ?></span>
        <?php endforeach; ?>
      </p>
      <a class="btn btn-small" href="sitter_profile.php?id=<?= $s['id'] ?>">View profile</a>
    </article>
    <?php endforeach; ?>
  </div>
</main>
</body>
</html>
