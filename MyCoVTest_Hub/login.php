<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["user_id"])) {
   header("location: admin_home.php");
}
?>

<!DOCTYPE html>
<html>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">


<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
   <link rel="stylesheet" href="index.css">
   <link rel="stylesheet" href="login.css">
   <script src="login.js"></script>
   <title>MyCoVTest Hub</title>
</head>



<header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color: #2B7A78">
   <div class="container">
      <h1 id="title">MyCoVTest Hub</h1>
   </div>
</header>

<body>
   <div class="login-page">
      <div class="form" style="background: #35a19c">
         <form class="login-form" method="post">
            <div class="imgcontainer">
               <img src="icon1.png" alt="Avatar" class="avatar" style="width: 150px;">
            </div>
            <br>
            <div class="form-row" id="username-group">
               <label style="color: white;"><b>User Name: </b></label>
               <!-- input the last admin's username -->
               <input type="text" placeholder="username" name="username" id="username" value='<?php if (isset($_COOKIE['user'])) {
                                                                                                   echo $_COOKIE['user'];
                                                                                                } else {
                                                                                                   echo "";
                                                                                                } ?>' />
            </div>
            <div class="form-row" id="password-group">
               <label style="color: white;"><b>Password: </b></label>
               <input type="password" placeholder="password" name="password" id="password" />
            </div>

            <div class="container pt-4">
               <button id="login" type=" submit" name="submit" class="btn btn-light form-group">Login</button>
            </div>

            <hr style="border-color: white;" noshade="noshade">
            <a type="button" id="public" href="self-reporting.php" class="btn btn-outline-light">Report Your Test</a>

         </form>
      </div>
   </div>
</body>

</div>

</main>

<footer style="background-color: #2B7A78" class="fixed-bottom">

   <div class="row">
      <div class="col-md-12 copy">
         <p class="text-center" style="color: white">&copy; Copyright 2020 - MyCoVTest. All rights reserved.</p>
      </div>
   </div>
</footer>

</html>