<?php
session_start();
?>

<!DOCTYPE html>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">

<!-- scripts -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<header>
    <title>MyCoVTest Hub</title>
</header>
<link rel="stylesheet" href="index.css">
<script src="#.js"></script>

<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color: #2B7A78">

    <div class="container">
        <h1 id="title">MyCoVTest Hub</h1>

        <div class="navbar-nav-scroll">
            <ul class="navbar-nav bd-navbar-nav flex-row">
                <li class="nav-item ">
                    <a class="nav-link" href="admin_home.php">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="self-Reporting.php">Test swap</a>
                </li>

                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                    ?>
                        <a class="nav-link " href="logout.php">Sign out</a>
                    <?php
                    } else {

                    ?>
                        <a class="nav-link " href="login.php">Sign in</a> <?php } ?>
                </li>

            </ul>
        </div>
    </div>
</header>

<body>

    <div class="centered pt-5">
        <h1 style="text-align: center;">Welcome To </h1>
        <h1 style="text-align: center;"> MyCovTest Hub</h1>
        <p style="text-align: center;">Report the results from your SARS-CoV-3 home test swap to help save the valley!!</p>
    </div>

    <Br>

    <hr class="solid" style="width: 70%">
    <div class="text-center">
        <dl>
            <dt><a class="btn btn-info " href="self-Reporting.php" role="button">Report your SARS-CoV-3 test result</a></dt>
            <br>
            <?php
            if (isset($_SESSION["user_id"])) {
            ?>
                <dt><a class="btn btn-info " href="admin_stat.php" role="button"> SARS-CoV-3 Statistics</a></dt>
            <?php
            }
            ?>
        </dl>
    </div>

    <footer style="background-color: #2B7A78" class="fixed-bottom">

        <div class="row">
            <div class="col-md-12 copy">
                <p class="text-center" style="color: white">&copy; Copyright 2020 - MyCoVTest. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>