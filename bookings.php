<?php
require 'config.php';
$bookings = $pdo->query("SELECT * FROM bookings ORDER BY date DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SafePaws – My Bookings</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Main navigation -->
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>My Bookings</h1>
<div class="table-wrap">
<table class="table">
<thead><tr><th>Owner</th><th>Date</th><th>Notes</th><th>Status</th></tr></thead>
<tbody>
<?php foreach($bookings as $b): ?>
<tr>
<td><?= htmlspecialchars($b['owner_name']) ?></td>
<td><?= $b['date'] ?></td>
<td><?= htmlspecialchars($b['notes']) ?></td>
<td><?= htmlspecialchars($b['status']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</main>
</body>
</html>
