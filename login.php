<?php
require 'config.php';

$error = ''; // Initialize error message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $type = $_POST['type'] ?? 'sitter'; // 'sitter' or 'booker'

    // Choose table based on type
    $table = ($type === 'booker') ? 'bookers' : 'sitters';

    $stmt = $pdo->prepare("SELECT * FROM $table WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Correct credentials
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $type;
        $_SESSION['user_name'] = $user['name'];
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Show error inline
        $error = 'Invalid username or password.';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SafePaws – Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main class="container" style="padding:28px 0 60px">
<h1>Login</h1>
<p>Enter your email and password to access your account.</p>

<?php if($error): ?>
    <p class="error" style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="check_login.php" method="post">
    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <label>Login as:</label>
    <select name="user_type"> 
        <option value="sitter">Sitter</option>
        <option value="booker">Pet Owner</option>
    </select>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Login</button>
    </div>
</form>


<p>Don't have an account? <a href="register_sitter.php">Register as Sitter</a> or <a href="register_owner.php">Register as Pet Owner</a></p>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
