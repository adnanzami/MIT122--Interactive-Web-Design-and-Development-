<?php
require 'config.php';
$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM sitters WHERE id=?");
$stmt->execute([$id]);
$sitter = $stmt->fetch();

$stmt2 = $pdo->prepare("SELECT * FROM reviews WHERE sitter_id=? ORDER BY id DESC");
$stmt2->execute([$id]);
$reviews = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SafePaws – Sitter Profile</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:26px 0 60px">
<?php if(!$sitter): ?>
<p>Sitter not found.</p>
<?php else: ?>

  
<div class="profile">
  <img src="<?= $sitter['img'] ?>" alt="<?= $sitter['name'] ?>" style="width: 550px">
  <h1><?= $sitter['name'] ?></h1>
  <p><strong>City:</strong> <?= $sitter['city'] ?></p>
  <p><?= $sitter['bio'] ?></p>
  <div style="margin-top:8px">
    <?php foreach(explode(',', $sitter['services']) as $service): ?>
      <span class="chip"><?= $service ?></span>
    <?php endforeach; ?>
  </div>
  <a class="btn" href="book.php?sitter_id=<?= $sitter['id'] ?>">Book this sitter</a>
</div>

<div class="reviews">
  <h2>Reviews</h2>
  <?php if(count($reviews) === 0): ?>
    <p>No reviews yet.</p>
  <?php else: ?>
    <?php foreach($reviews as $r): ?>
      <div class="review">
        <div class="stars"><?= str_repeat('★', $r['rating']) . str_repeat('☆', 5-$r['rating']); ?></div>
        <p><strong><?= $r['user_name'] ?>:</strong> <?= $r['text'] ?></p>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php endif; ?>
</main>
</body>
</html>
