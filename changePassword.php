<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Admin Password | eVoting</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu|Raleway|Oswald|Roboto+Condensed" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      font-family: 'Roboto Condensed', sans-serif;
      height: 100vh;
    }

    .headerFont {
      font-family: 'Ubuntu', sans-serif;
      font-size: 24px;
    }

    .specialHead {
      font-family: 'Oswald', sans-serif;
      font-weight: bold;
      letter-spacing: 1px;
      color: #333;
    }

    .login-card {
      background: #fff;
      border-radius: 12px;
      padding: 40px 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .form-control {
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .btn-primary {
      border-radius: 8px;
      font-weight: bold;
      background: #2575fc;
      border: none;
      transition: background 0.3s;
    }

    .btn-primary:hover {
      background: #6a11cb;
    }

    .page-header {
      border-bottom: 2px solid #eee;
      margin-bottom: 30px;
      text-align: center;
    }

    .navbar-inverse {
      border-radius: 0;
      margin-bottom: 0;
      background-color: #222;
    }

    .login-container {
      padding-top: 120px;
      padding-bottom: 50px;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.html" class="navbar-brand headerFont"><strong>eVoting</strong></a>
    </div>
  </div>
</nav>

<!-- CHANGE PASSWORD FORM -->
<div class="container login-container">
  <div class="row">
    <div class="col-sm-4 col-xs-12"></div>
    <div class="col-sm-4 col-xs-12">
      <div class="login-card">
        <div class="page-header">
          <h2 class="specialHead">Change Admin Password</h2>
          <p class="text-muted normalFont">Update your login credentials securely</p>
        </div>

        <form action="updatePwd.php" method="POST">
          <input type="password" name="existingPassword" class="form-control" placeholder="Enter Old Password" required>
          <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password" required>
          <input type="password" name="retypePassword" class="form-control" placeholder="Retype New Password" required>
          
          <button type="submit" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-ok"></span> Change Password
          </button>
        </form>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12"></div>
  </div>
</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
