<?php

session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["user_id"])) {
   header("location: login.php");
   exit;
}


include 'db_connection.php';
$conn = OpenCon();
$db = "CO3102_CW2_2020";

// Total number of reports
$sql_total = "SELECT Email FROM testresult";
$result_total = mysqli_query($conn, $sql_total);
$numOfusers_total = mysqli_num_rows($result_total);

// Total number of positive cases
$sql_pos = "SELECT TestResult FROM testresult WHERE TestResult = 'Positive' ";
$result_pos = mysqli_query($conn, $sql_pos);
$numOfusers_pos = mysqli_num_rows($result_pos);

// Total number of negative cases
$sql_neg = "SELECT TestResult FROM testresult WHERE TestResult = 'Negative'";
$result_neg = mysqli_query($conn, $sql_neg);
$numOfusers_neg = mysqli_num_rows($result_neg);

// Total number of Inconclusive cases
$sql_Inc = "SELECT TestResult FROM testresult WHERE TestResult = 'Inconclusive'";
$result_Inc = mysqli_query($conn, $sql_Inc);
$numOfusers_Inc = mysqli_num_rows($result_Inc);

/////////// BY AGE OR POSTCODE /////////

// 1) Total number of positive cases by age (0-17)
$sql_age1 = "SELECT TestResult FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 0 AND 17";
$result_age1 = mysqli_query($conn, $sql_age1);
$numOfusers_age1 = mysqli_num_rows($result_age1);

// 2) Total number of positive cases by age (18-44)
$sql_age2 = "SELECT TestResult FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 18 AND 44";
$result_age2 = mysqli_query($conn, $sql_age2);
$numOfusers_age2 = mysqli_num_rows($result_age2);

// 3) Total number of positive cases by age (45-64)
$sql_age3 = "SELECT TestResult FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 45 AND 64";
$result_age3 = mysqli_query($conn, $sql_age3);
$numOfusers_age3 = mysqli_num_rows($result_age3);

// 4) Total number of positive cases by age (65+)
$sql_age4 = "SELECT TestResult FROM testresult WHERE TestResult = 'Positive' AND Age >= 65";
$result_age4 = mysqli_query($conn, $sql_age4);
$numOfusers_age4 = mysqli_num_rows($result_age4);


// Total number of positive cases by postcode

$postcodes = array();
$sql_postcode = "SELECT Postcode, TestResult FROM testresult WHERE TestResult = 'Positive'";
$result_postcode = mysqli_query($conn, $sql_postcode);
// $numOfusers_postcodes = mysqli_num_rows($result_postcode);
while ($row = mysqli_fetch_row($result_postcode)) {
   // print_r($row);
   if (array_key_exists($row[0], $postcodes)) {
      $postcodes[$row[0]]++;
   } else {
      $postcodes[$row[0]] = 1;
   }
}



/////////INFECTION ///////////
$sql_total = "SELECT Email FROM testresult ";
$result_total = mysqli_query($conn, $sql_total);
$numOfusers_total = mysqli_num_rows($result_total);

// Infection rate by age 0-17
//POSITIVE
$sql_infec_ageP1 = "SELECT Age FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 0 AND 17";
$result_infec_ageP1 = mysqli_query($conn, $sql_infec_ageP1);
$numOfusers_infec_ageP1 = mysqli_num_rows($result_infec_ageP1);
//ALL OF THE SAME CATOGERY
$sql_infec_age1 = "SELECT Age FROM testresult WHERE Age BETWEEN 0 AND 17";
$result_infec_age1 = mysqli_query($conn, $sql_infec_age1);
$numOfusers_infec_age1 = mysqli_num_rows($result_infec_age1);

$infec_rate_age1 = round(($numOfusers_infec_ageP1 / $numOfusers_infec_age1) * 100, 1);


// Infection rate by age 18 - 44
//POSITIVE
$sql_infec_ageP2 = "SELECT Age FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 18 AND 44";
$result_infec_ageP2 = mysqli_query($conn, $sql_infec_ageP2);
$numOfusers_infec_ageP2 = mysqli_num_rows($result_infec_ageP2);
//ALL OF THE SAME CATOGERY
$sql_infec_age2 = "SELECT Age FROM testresult WHERE Age BETWEEN 18 AND 44";
$result_infec_age2 = mysqli_query($conn, $sql_infec_age2);
$numOfusers_infec_age2 = mysqli_num_rows($result_infec_age2);

$infec_rate_age2 = round(($numOfusers_infec_ageP2 / $numOfusers_infec_age2) * 100, 1);


// Infection rate by age 45 - 64
//POSITIVE
$sql_infec_ageP3 = "SELECT Age FROM testresult WHERE TestResult = 'Positive' AND Age BETWEEN 45 AND 65";
$result_infec_ageP3 = mysqli_query($conn, $sql_infec_ageP3);
$numOfusers_infec_ageP3 = mysqli_num_rows($result_infec_ageP3);
////ALL OF THE SAME CATOGERY
$sql_infec_age3 = "SELECT Age FROM testresult WHERE Age BETWEEN 45 AND 65";
$result_infec_age3 = mysqli_query($conn, $sql_infec_age3);
$numOfusers_infec_age3 = mysqli_num_rows($result_infec_age3);

$infec_rate_age3 = round(($numOfusers_infec_ageP3 / $numOfusers_infec_age3) * 100, 1);


// Infection rate by age 65+
//POSITIVE
$sql_infec_ageP4 = "SELECT Age FROM testresult WHERE TestResult = 'Positive' AND Age >= 65";
$result_infec_ageP4 = mysqli_query($conn, $sql_infec_ageP4);
$numOfusers_infec_ageP4 = mysqli_num_rows($result_infec_ageP4);
////ALL OF THE SAME CATOGERY
$sql_infec_age4 = "SELECT Age FROM testresult WHERE Age >= 65";
$result_infec_age4 = mysqli_query($conn, $sql_infec_age4);
$numOfusers_infec_age4 = mysqli_num_rows($result_infec_age4);

$infec_rate_age4 = round(($numOfusers_infec_ageP4 / $numOfusers_infec_age4) * 100, 1);


// Infection rate by postcode
$postcodes_infec = array();

$sql_infec_postcode = "SELECT Postcode, TestResult FROM testresult WHERE TestResult = 'Positive'";
$result_infec_postcode = mysqli_query($conn, $sql_infec_postcode);
$numOfusers_infec_postcode = mysqli_num_rows($result_infec_postcode);

while ($row = mysqli_fetch_row($result_infec_postcode)) {

   if (array_key_exists($row[0], $postcodes_infec)) {
      $postcodes_infec[$row[0]]++;
   } else {
      $postcodes_infec[$row[0]] = 1;
   }
}

// get results of infection rate from each postcode
$outerArray = array();
foreach ($postcodes_infec as $key1 => $value) {
   $total1 = "SELECT Postcode FROM testresult WHERE Postcode = '" . $key1 . "'";
   $result_infec_postcode_total = mysqli_query($conn, $total1);
   $numOfusers_infec_Bypostcode = mysqli_num_rows($result_infec_postcode_total);
   $rate = round(($value / $numOfusers_infec_Bypostcode) * 100, 1);
   $outerArray[] = array($key1 => $rate);
}

mysqli_close($conn);

?>

<!DOCTYPE html>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="stats.css">



<!-- Google charts script -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- scripts -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- PIE CHART OF POSITIVE CASES BY AGE -->

<script type="text/javascript">
   google.charts.load('current', {
      'packages': ['corechart']
   });
   google.charts.setOnLoadCallback(drawChart);

   // Draw the chart and set the chart values
   function drawChart() {
      var data = google.visualization.arrayToDataTable([
         ['Task', 'Pie Chart: % of total number of Positive cases by age group'],
         ['0-17 years old', <?php echo $numOfusers_age1 ?>],
         ['18-44 years old', <?php echo $numOfusers_age2 ?>],
         ['45-64 years old', <?php echo $numOfusers_age3 ?>],
         ['Over 65 years old', <?php echo $numOfusers_age4 ?>]
      ]);

      var options = {
         'title': 'Positive cases by age group',
         // 'width': 525,
         // 'height': 300
      };

      var chart = new google.visualization.PieChart(document.getElementById('POS_ageGroup'));
      chart.draw(data, options);
   }
</script>

<!-- BAR CHART OF POSITIVE CASES BY POSTCODE -->


<script type="text/javascript">
   // Load Charts and the corechart and barchart packages.
   google.charts.load('current', {
      'packages': ['bar']
   });

   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {


      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Postcode');
      data.addColumn('number', 'positive cases');

      data.addRows([

         <?php
         foreach ($postcodes as $key => $value) {
            echo "['" . $key . "'," . $value . "],";
         }

         ?>
      ]);


      var barchart_options = {
         title: 'Barchart: Total number of Positive cases by postcode',
         // width: 505,
         // height: 300,
      };
      var barchart_postcode = new google.charts.Bar(document.getElementById('POS_postcode'));
      barchart_postcode.draw(data, google.charts.Bar.convertOptions(barchart_options));
   }
</script>

<!-- INFECTION RATE BY AGE PIE CHART -->

<script type="text/javascript">
   google.charts.load('current', {
      'packages': ['corechart']
   });
   google.charts.setOnLoadCallback(drawChart);

   // Draw the chart and set the chart values
   function drawChart() {
      var data = google.visualization.arrayToDataTable([
         ['Task', 'Pie Chart: % of infection rate'],
         ['0-17 years old INFECTION RATE', <?php echo $infec_rate_age1 ?>],
         ['18-44 years old INFECTION RATE', <?php echo $infec_rate_age2 ?>],
         ['45-64 years old INFECTION RATE', <?php echo $infec_rate_age3 ?>],
         ['Over 65 years old INFECTION RATE', <?php echo $infec_rate_age4 ?>]
      ]);

      var options = {
         'title': 'Infection rate by age group',
         // 'width': 525,
         // 'height': 400
      };


      var chart = new google.visualization.PieChart(document.getElementById('infec_ageGroup'));
      chart.draw(data, options);
   }
</script>

<!-- INFECTION RATE BY POSTCODE PIE CHART -->

<script type="text/javascript">
   // Load Charts and the corechart and barchart packages.
   google.charts.load('current', {
      'packages': ['bar']
   });

   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Postcode');
      data.addColumn('number', '% of infection by postcode');

      data.addRows([

         <?php
         foreach ($outerArray as $number => $row) {
            foreach ($row as $k => $v) {
               echo "['" . $k . "'," . $v . "],";
            }
         }
         ?>

      ]);

      var barchart_options = {
         title: 'Barchart: Total number of Infections cases by postcode',
         // width: 530,
         // height: 300,
      };
      var barchart_postcode = new google.charts.Bar(document.getElementById('infec_postcode'));
      barchart_postcode.draw(data, google.charts.Bar.convertOptions(barchart_options));
   }
</script>

<header>
   <title>MyCoVTest Hub</title>

</header>

<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color: #2B7A78">

   <div class="container">

      <h1 id="title">MyCoVTest Hub</h1>

      <div class="navbar-nav-scroll">
         <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item ">
               <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="self-Reporting.php">Test Swap</a>
            </li>
            <li class="nav-item">
               <a class="nav-link " href="logout.php">Sign Out</a>
            </li>

         </ul>
      </div>

   </div>
   </div>

</header>

<div class="container">

   <body>
      <h3 class="text-center"> Dashboad - SARS-CoV-3 Statistics</h3>
      <div class="containerS mt-4 pr-5">
         <div class="row rowS">
            <div class="col col-sm">
               <div class="stats">
                  <div class="box-header">Totel number of tests reported</div>
                  <div class="box-content">
                     <div class="num"><?php echo $numOfusers_total; ?></div>
                  </div>
               </div>

               <div class="stats">
                  <div class="box-header">Positive cases reported</div>
                  <div class="box-content">
                     <div class="num"><?php echo $numOfusers_pos; ?></div>
                  </div>

               </div>

               <div class="stats">
                  <div class="box-header">Negative tests reported</div>
                  <div class="box-content">
                     <div class="num"><?php echo $numOfusers_neg; ?></div>
                  </div>
               </div>

               <div class="stats">
                  <div class="box-header">Inconclusive tests reported</div>
                  <div class="box-content">
                     <div class="num"><?php echo $numOfusers_Inc; ?></div>
                  </div>
               </div>
            </div>
         </div>

         <hr class="solid">

         <!-- POSTIVE CASES STATS -->

         <div class="row">
            <h3>Positive cases distribution by postcode/age group :</h3>
         </div>

         <div class="row mt-3">
            <div class="col-sm">
               <div id="POS_ageGroup" class="chartP"></div>
            </div>

            <div class="col-sm">
               <div id="POS_postcode" class="chartB"></div>
            </div>
         </div>

         <!-- INFECTION RATE STATS -->

         <div class="row">
            <hr class="solid " style="width: 100%;">
            <h3>Infection rate by postcode/age group :</h3>
         </div>
         <div class="row pb-5">
            <div class="col-sm">
               <div id="infec_ageGroup" class="chartP"></div>
            </div>

            <div class="col-sm">
               <div id="infec_postcode" class="chartB"></div>
            </div>
         </div>

      </div>
   </body>
</div>

<footer style="background-color: #2B7A78" class="fixed-bottom">
   <div class="row">
      <div class="col-md-12 copy">
         <p class="text-center" style="color: white">&copy; Copyright 2020 - MyCoVTest. All rights reserved.</p>
      </div>
   </div>
</footer>