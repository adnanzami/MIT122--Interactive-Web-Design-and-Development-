<?php
require 'config.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $city = trim($_POST['city']);
    $bio = trim($_POST['bio']);
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "";
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Handle image upload
    $image_path = "";
    if (!empty($_FILES['img']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $fileName = time() . "_" . basename($_FILES["img"]["name"]);
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
            $image_path = $targetFile;
        }
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO sitters (name, email, phone, city, services, bio, password, img)
                               VALUES (:name, :email, :phone, :city, :services, :bio, :password, :img)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':city' => $city,
            ':services' => $services,
            ':bio' => $bio,
            ':password' => $password,
            ':img' => $image_path
        ]);
        $message = "✅ Sitter registered successfully!";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $message = "❌ Error: This email is already registered.";
        } else {
            $message = "❌ Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Become a Sitter | SafePaws</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
<?php include 'header.php'; ?>
</header>

<main class="container" style="padding:40px 0">
  <h1>Become a Sitter</h1>

  <?php if ($message): ?>
    <p class="alert"><?= $message ?></p>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" class="form-card">
    <label>Full Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Phone:</label>
    <input type="tel" name="phone" required>

    <label>City:</label>
    <input type="text" name="city" required>

    <label>Services Offered:</label>
    <select name="services[]" multiple required>
      <option value="Dog Walking">Dog Walking</option>
      <option value="Dog Boarding">Dog Boarding</option>
      <option value="House Sitting">House Sitting</option>
      <option value="Day Care">Day Care</option>
      <option value="Drop-in Visits">Drop-in Visits</option>
    </select>

    <label>Short Bio:</label>
    <textarea name="bio" rows="4"></textarea>

    <label>Upload Photo:</label>
    <input type="file" name="img" accept="image/*">

    <label>Create Password:</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn">Submit Application</button>
  </form>
</main>
</body>
</html>
