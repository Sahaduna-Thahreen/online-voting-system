<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Update Password</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container" style="padding-top:150px;">
  <div class="row">
    <div class="col-sm-4"></div>

    <div class="col-sm-4 text-center" style="border:2px solid gray;padding:50px;">

<?php
// ---------------- DATABASE CONFIG ----------------
$hostname = "localhost";
$username = "root";
$password = "";          // your MySQL password
$database = "db_evoting";
$port     = 3307;        // MySQL port

// ---------------- CONNECT DATABASE ----------------
$conn = mysqli_connect($hostname, $username, $password, $database, $port);

if (!$conn) {
    die("<img src='images/error.png' width='70'><h3 class='text-danger'>Database connection failed: " . mysqli_connect_error() . "</h3>");
}

// ---------------- INPUT CLEANING ----------------
function test_input($conn, $data) {
    return mysqli_real_escape_string($conn, trim($data));
}

// ---------------- CHECK FORM DATA ----------------
if (empty($_POST['existingPassword']) || empty($_POST['newPassword'])) {
    echo "<img src='images/error.png' width='70'>";
    echo "<h3 class='text-danger'>Fields Required</h3>";
    exit;
}

$oldPassword = test_input($conn, $_POST['existingPassword']);
$newPassword = test_input($conn, $_POST['newPassword']);

// ---------------- SESSION USERNAME ----------------
session_start();
$admin_username = $_SESSION['admin_username'] ?? 'admin';

// ---------------- VERIFY OLD PASSWORD ----------------
$sql = "SELECT admin_password FROM tbl_admin WHERE admin_username='$admin_username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) !== 1) {
    echo "<img src='images/error.png' width='70'>";
    echo "<h3 class='text-danger'>Admin not found</h3>";
    exit;
}

$row = mysqli_fetch_assoc($result);
$dbPassword = $row['admin_password'];

// ---------------- PASSWORD CHECK ----------------
// If old passwords are PLAIN TEXT:
if ($dbPassword !== $oldPassword) {
    echo "<img src='images/error.png' width='70'>";
    echo "<h3 class='text-danger'>Old Password is Incorrect</h3>";
    exit;
} else {
    // ---------------- UPDATE WITH HASHED PASSWORD ----------------
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $updateSql = "UPDATE tbl_admin 
                  SET admin_password='$hashedPassword' 
                  WHERE admin_username='$admin_username'";

    if (mysqli_query($conn, $updateSql)) {
        echo "<img src='images/success.png' width='70'>";
        echo "<h3 class='text-success'><strong>SUCCESSFULLY CHANGED</strong></h3>";
        echo "<a href='cpanel.php' class='btn btn-primary'>Finish</a>";
    } else {
        echo "<img src='images/error.png' width='70'>";
        echo "<h3 class='text-danger'>Error updating password</h3>";
    }
}

// ---------------- CLOSE CONNECTION ----------------
mysqli_close($conn);
?>

    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</body>
</html>
