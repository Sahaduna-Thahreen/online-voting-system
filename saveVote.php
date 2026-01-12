<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eVoting | Vote Status</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Ubuntu|Raleway|Oswald|Roboto+Condensed|Poppins&display=swap' rel='stylesheet'>

  <style>
    body {
      font-family: 'Roboto Condensed', sans-serif;
      background: #f4f8ff;
      padding-top: 80px;
    }

    .card {
      max-width: 600px;
      margin: 50px auto;
      padding: 40px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 18px 40px rgba(0,0,0,0.2);
    }

    .card img {
      width: 90px;
      height: 90px;
      margin-bottom: 20px;
    }

    .card h3 {
      font-family: 'Oswald', sans-serif;
      font-size: 24px;
      font-weight: bold;
      color: #0072ff;
      margin-bottom: 20px;
    }

    .card p {
      font-size: 16px;
      color: #555;
      margin-bottom: 30px;
    }

    .btn-primary, .btn-success {
      border-radius: 25px;
      padding: 12px 30px;
      font-weight: bold;
      font-size: 16px;
      transition: 0.3s;
    }

    .btn-primary:hover, .btn-success:hover {
      opacity: 0.85;
    }

    .navbar-inverse {
      background-color: #0072ff;
      border-radius: 0;
      border: none;
      padding: 12px 30px;
    }

    .navbar-inverse .navbar-brand {
      font-family: 'Nunito', sans-serif;
      font-size: 28px;
      color: #fff;
      font-weight: 700;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="index.html" class="navbar-brand">eVoting</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="admin.html" class="btn btn-success navbar-btn" style="color:#fff;">Admin Panel</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Voting Result Card -->
  <div class="card">
    <?php
    // Helper function to sanitize input
    function test_input($data) {
      return htmlspecialchars(stripslashes(trim($data)));
    }

    // Database credentials
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "db_evoting";
    $DB_PORT = 3307;

    // Connect to database
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);
    if (!$conn) {
      die("<h3>Database connection failed: " . mysqli_connect_error() . "</h3>");
    }

    if(isset($_POST["submit"])) {
      if(!empty($_POST["voterName"]) && !empty($_POST["voterEmail"]) && !empty($_POST["voterID"]) && !empty($_POST["selectedCandidate"])) {

        $name = mysqli_real_escape_string($conn, test_input($_POST["voterName"]));
        $email = mysqli_real_escape_string($conn, test_input($_POST["voterEmail"]));
        $voterID = mysqli_real_escape_string($conn, test_input($_POST["voterID"]));
        $selection = mysqli_real_escape_string($conn, test_input($_POST["selectedCandidate"]));

        $check_sql = "SELECT * FROM tbl_users WHERE voter_id='$voterID'";
        $check_result = mysqli_query($conn, $check_sql);

        if(mysqli_num_rows($check_result) > 0) {
          echo "<img src='images/error.png' alt='Error'>";
          echo "<h3>YOU HAVE ALREADY VOTED</h3>";
          echo "<p>You cannot vote more than once.</p>";
          echo "<a href='index.html' class='btn btn-primary'>Finish</a>";
        } else {
          $sql = "INSERT INTO tbl_users (full_name, email, voter_id, voted_for)
                  VALUES ('$name', '$email', '$voterID', '$selection')";
          if(mysqli_query($conn, $sql)){
            echo "<img src='images/success.jpg' alt='Success'>";
            echo "<h3>VOTE SUCCESSFUL</h3>";
            echo "<p>Thank you for participating in the election.</p>";
            echo "<a href='index.html' class='btn btn-success'>Finish</a>";
          } else {
            echo "<img src='images/error.png' alt='Error'>";
            echo "<h3>ERROR</h3>";
            echo "<p>There was a problem submitting your vote. Please try again.</p>";
            echo "<a href='index.html' class='btn btn-primary'>Finish</a>";
          }
        }

      } else {
        echo "<img src='images/error.png' alt='Error'>";
        echo "<h3>ALL FIELDS REQUIRED</h3>";
        echo "<p>Please fill in all the voter details.</p>";
        echo "<a href='index.html' class='btn btn-primary'>Go Back</a>";
      }
    } else {
      echo "<img src='images/error.png' alt='Error'>";
      echo "<h3>NO FORM SUBMITTED</h3>";
      echo "<p>Please submit your vote using the voting form.</p>";
      echo "<a href='index.html' class='btn btn-primary'>Go Back</a>";
    }

    mysqli_close($conn);
    ?>
  </div>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
