<?php
session_start();
?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" href="form.css">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
   <title>MyCoVTest Hub</title>
   <link rel="stylesheet" href="index.css">
   <script src="self_reportingForm.js"></script>
</head>

<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color: #2B7A78">

   <div class="container">

      <h1 id="title">MyCoVTest Hub</h1>

      <div class="navbar-nav-scroll">
         <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item ">
               <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
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
   </div>

</header>


<body>
   <h2 class="text-center">Please enter your details and test reuslt below</h2>



   <hr class="solid " style="width: 60%;">

   <div class="container mt-4">
      <form style="text-align: center;" method="POST">

         <div class="card-header border-info " style="background-color: #2B7A78"><b style="color: white"> SARS-CoV-3 Test details:</b></div>
         <div class="card-body">

            <!-- LINE 1 -->
            <div class="form-row">

               <div class="col-sm-2 pt-1">
                  <label style="text-align: center;" for="Email"> Email <b style="color: red;">*</b>: </label>
               </div>
               <div class="col-sm-4" id="email-group">
                  <input id="email" type="text" class="form-control" placeholder="Enter your email..." name="email">
               </div>

               <div class="col-sm-2 pt-2">
                  <label style="text-align: center;" for="Fullname">Full name <b style="color: red;">*</b>:</label>
               </div>
               <div class="col-sm-4" id="fullname-group">
                  <input id="fullname" name="fullname" class="form-control" placeholder="Enter your full name...">
               </div>
            </div>

            <!-- LINE 2 -->

            <div class="form-row">

               <div class="col-sm-2 pt-3">
                  <label for="Gender">Gender <b style="color: red;">*</b>:</label>
               </div>
               <div class="col-sm-4 pt-2" id="gender-group">
                  <select class="form-control" id="gender" name="gender">
                     <option value="" selected>Select your gender</option>
                     <option value="M">Male</option>
                     <option value="F">Female</option>
                     <option value="Other">Other</option>

                  </select>
               </div>

               <div class="col-sm-2 pt-3 pb-1">
                  <label style="text-align: center;" for="Age">Age <b style="color: red;">*</b>:</label>
               </div>
               <div class="col-sm-4 pt-2" id="age-group">
                  <input class="form-control" type="number" id="age" name="age" min="1" max="150">
               </div>
            </div>
            <!-- LINE 3 -->


            <div class="form-row">
               <div class="col-sm-2 pt-3">
                  <label style="text-align: center;" for="Address">Address <b style="color: red;">*</b>:</label>
               </div>

               <div class="col-sm-4 pt-2 text-left" id="address-group">
                  <input id="address" class="form-control" name="address" placeholder="Enter your street name and street number">

               </div>

               <div class="col-sm-2 pt-3 pb-1">
                  <label style="text-align: center;" for="pcode">Post code <b style="color: red;">*</b>:</label>
               </div>

               <div class="col-sm-4 pt-2" id="postcode-group">
                  <input id="postcode" class="form-control" name="postcode" placeholder="Enter your post code">

               </div>
            </div>

            <!-- LINE 4 -->

            <div class="form-row">
               <div class="col-sm-2 pl-3 pt-3">
                  <label style="text-align: center;" for="TTN">TTN Code <b style="color: red;">*</b>:</label>
               </div>

               <div class="col-sm-4 pt-2 text-left" id="TTN-group">
                  <input id="TTN" class="form-control" name="TTN" placeholder="Enter your TTN code">
               </div>

               <div class="col-sm-2  pt-3 ">
                  <label style="text-align: center;" for="TestResult">Test result <b style="color: red;">*</b>:</label>
               </div>

               <div class="col-sm-4 pl-3 pt-2" id="testresult-group">
                  <select class="form-control  " id="testResult" name="TestResult">
                     <option value="" selected>Select the corresponding result</option>
                     <option value="Positive">Postive</option>
                     <option value="Negative">Negative</option>
                     <option value="Inconclusive">Inconclusive</option>

                  </select>

               </div>
            </div>

            <div class="row">

               <div class="container text-left pt-4 pl-4 pb-2 pr-4">
                  <a href="admin_home.php" class="btn btn-info" role="button" aria-pressed="true">Home</a>
                  <button class="btn btn-info" type="reset">Reset</button>
                  <button type="submit" name="submit" class="btn btn-success form-group" style="float: right">Submit</button>

               </div>
            </div>
      </form>
   </div>


   <footer style="background-color: #2B7A78" class="fixed-bottom">
      <div class="row">
         <div class="col-md-12 copy">
            <p class="text-center" style="color: white">&copy; Copyright 2020 - MyCoVTest. All rights reserved.</p>
         </div>
      </div>
   </footer>


   <script type="text/javascript">

   </script>
</body>

</html>