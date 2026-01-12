<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - eVoting</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu|Raleway|Oswald|Roboto+Condensed&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #00c6ff, #0072ff);
      height: 100vh;
      font-family: 'Roboto Condensed', sans-serif;
    }

    .login-container {
      margin-top: 120px;
      padding: 40px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.2);
      text-align: center;
    }

    .login-container h2 {
      font-family: 'Oswald', sans-serif;
      margin-bottom: 30px;
      color: #0072ff;
    }

    .form-control {
      border-radius: 25px;
      padding: 15px;
      font-size: 16px;
    }

    .btn-login {
      border-radius: 25px;
      padding: 12px 30px;
      font-size: 16px;
      background: #0072ff;
      border: none;
      color: #fff;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: #005bb5;
    }

    .alert {
      border-radius: 12px;
      margin-top: 15px;
    }

    .brand-text {
      font-family: 'Ubuntu', sans-serif;
      font-size: 28px;
      color: #fff;
      font-weight: bold;
    }

    .navbar-inverse {
      background-color: #0072ff;
      border: none;
    }

    .navbar-inverse .navbar-brand {
      color: #fff;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="cpanel.php" class="navbar-brand brand-text">eVoting Admin</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-4 col-sm-offset-4 login-container">

<?php
// --- Database credentials ---
$hostname = "127.0.0.1";
$port = 3307; // XAMPP MySQL port
$username = "root";
$password = "";
$database = "db_evoting";

// --- Function to sanitize input ---
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// --- Check if form submitted ---
if (isset($_POST['adminUserName']) && isset($_POST['adminPassword'])) {
    $admin_username = test_input($_POST['adminUserName']);
    $admin_password = test_input($_POST['adminPassword']);

    // --- Connect to database ---
    $conn = mysqli_connect($hostname, $username, $password, $database, $port);
    if (!$conn) {
        die("<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>");
    }

    // --- Prepared statement ---
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE admin_username=? AND admin_password=?");
    $stmt->bind_param("ss", $admin_username, $admin_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Authentication successful
        header("Location: cpanel.php");
        exit();
    } else {
        // Authentication failed
        echo "<div class='alert alert-danger'><strong>Authentication Failed!</strong><br>Your username or password is incorrect.</div>";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>

      <h2>Admin Login</h2>
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="adminUserName" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="password" name="adminPassword" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-login btn-block">Login</button>
      </form>

      <p class="text-muted" style="margin-top:20px;">&copy; 2026 eVoting System</p>
    </div>
  </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
