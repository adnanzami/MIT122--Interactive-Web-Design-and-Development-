<?php
require 'config.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO bookers (name,email,phone,password) VALUES (?,?,?,?)");
    if($stmt->execute([$name,$email,$phone,$password])){
        echo "<p>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        echo "<p>Error: Could not register. Email might already be used.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
  <h1>Register New Pet Owner</h1>
  <p>Select your user type and login.</p>

  <form method="post">
  <label>Full Name</label>
  <input type="text" name="name" required>

  <label>Email</label>
  <input type="email" name="email" required>

  <label>Phone</label>
  <input type="tel" name="phone">

  <label>Password</label>
  <input type="password" name="password" required>

  <button type="submit">Register</button>
</form>

</main>
</body>
</html>




