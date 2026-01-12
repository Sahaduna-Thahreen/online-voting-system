<?php
session_start();

// Database credentials
$DB_HOST = "127.0.0.1";
$DB_PORT = 3307; // MySQL port
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "db_evoting";

// Connect to database
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME, $DB_PORT);

// Check connection
if (!$conn) {
    die("<p class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</p>");
}

// Helper function to count votes for a party
function countVotes($conn, $party) {
    $sql = "SELECT COUNT(*) AS cnt FROM tbl_users WHERE voted_for='$party'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['cnt'];
}

// Count votes
$BJP = countVotes($conn, 'BJP');
$INC = countVotes($conn, 'INC');
$AAP = countVotes($conn, 'AAP');
$TMC = countVotes($conn, 'TMC');

$totalVotes = $BJP + $INC + $AAP + $TMC;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Control Panel | eVoting</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu|Raleway|Oswald|Roboto+Condensed' rel='stylesheet'>
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            padding-top: 70px;
            background: #f0f2f5;
        }

        .headerFont { font-family: 'Ubuntu', sans-serif; font-size: 24px; color: #fff; }
        .subFont { font-family: 'Raleway', sans-serif; font-size: 14px; color: #fff; }
        .specialHead { font-family: 'Oswald', sans-serif; font-size: 28px; font-weight: bold; }
        .normalFont { font-family: 'Roboto Condensed', sans-serif; }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        .progress {
            height: 25px;
            border-radius: 12px;
            overflow: hidden;
        }
        .progress-bar {
            line-height: 25px;
            font-weight: bold;
        }
        .party-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .total-votes {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 40px;
        }

        /* Full-width navbar */
        .navbar-inverse {
            border-radius: 0;
            margin-bottom: 0;
            background-color: #222;
        }
        .navbar-nav > li > a {
            color: #fff !important;
            font-weight: 600;
        }
        .navbar-btn {
            margin-top: 8px;
        }
    </style>
</head>
<body>

<!-- FULL-WIDTH NAVIGATION BAR -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid"><!-- changed container to container-fluid -->
        <div class="navbar-header">
            <a href="cpanel.php" class="navbar-brand headerFont">eVoting</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#adminNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="nav navbar-nav">
                <li><a href="nomination.html"><span class="subFont">Nomination's List</span></a></li>
                <li><a href="changePassword.php"><span class="subFont">Admin's Password</span></a></li>
                <li><a href="feedbackreport.php"><span class="subFont">Feedback Report</span></a></li>
            </ul>
            <a href="index.html" class="btn btn-success navbar-btn navbar-right"><strong>Sign Out</strong></a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container-fluid"><!-- changed container to container-fluid -->
    <div class="page-header">
        <h2 class="specialHead">CONTROL PANEL</h2>
        <p class="normalFont">Overview of voting results.</p>
    </div>

    <div class="row">
        <?php
        $parties = [
            'BJP' => ['count' => $BJP, 'class' => 'success'],
            'INC' => ['count' => $INC, 'class' => 'primary'],
            'AAP' => ['count' => $AAP, 'class' => 'info'],
            'TMC' => ['count' => $TMC, 'class' => 'warning']
        ];

        foreach ($parties as $name => $data):
            $width = $totalVotes > 0 ? ($data['count'] / $totalVotes * 100) : 0;
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="party-title"><?php echo $name; ?> <span class="text-muted">(<?php echo $data['count']; ?> votes)</span></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-<?php echo $data['class']; ?>" role="progressbar" style="width: <?php echo $width; ?>%">
                        <?php echo round($width, 2); ?>%
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="total-votes">
        Total Votes Cast: <?php echo $totalVotes; ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php
mysqli_close($conn);
?>
