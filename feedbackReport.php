<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voting Panel | Feedback</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu|Raleway|Oswald|Roboto+Condensed" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }

    .headerFont {
      font-family: 'Ubuntu', sans-serif;
      font-size: 24px;
    }

    .subFont {
      font-family: 'Raleway', sans-serif;
      font-size: 14px;
    }

    .specialHead {
      font-family: 'Oswald', sans-serif;
      letter-spacing: 1px;
    }

    .normalFont {
      font-family: 'Roboto Condensed', sans-serif;
    }

    /* Page spacing below navbar */
    .page-wrapper {
      padding: 120px 40px 40px;
    }

    /* Feedback card */
    .feedback-card {
      background: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .page-header {
      margin-top: 0;
      border-bottom: 2px solid #eee;
    }

    .page-header h2 {
      margin-bottom: 5px;
    }

    .admin-btn {
      margin-top: 8px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.html" class="navbar-brand headerFont"><strong>eVoting</strong></a>
    </div>

    <div class="collapse navbar-collapse" id="example-nav-collapse">
      <button type="button" class="btn btn-success navbar-right admin-btn">
        <span class="normalFont"><strong>Admin Panel</strong></span>
      </button>
    </div>
  </div>
</nav>

<!-- CONTENT -->
<div class="container-fluid page-wrapper">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="feedback-card">
        <div class="page-header">
          <h2 class="specialHead">Feedback List</h2>
          <p class="normalFont text-muted">
            View feedback submitted by registered users.
          </p>
        </div>

        <!-- PHP Feedback Content -->
        <?php
          // Display feedback list here
        ?>

        <!-- Placeholder (remove when PHP data loads) -->
        <p class="normalFont text-center text-muted">
          No feedback available at the moment.
        </p>

      </div>

    </div>
  </div>
</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
