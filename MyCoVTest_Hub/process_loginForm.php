<?php

session_start();

include 'db_connection.php';
$conn = OpenCon();
$db = "CO3102_CW2_2020";

$errors = array();      // array to hold validation errors
$data = array();      // array to pass back data

$Username = $_POST['username'];
$Password = $_POST['password'];

// username validation
//check if inputs are empty or not
if (empty($_POST['username']) || empty($_POST['password'])) {
    $errors['username'] = 'Please enter both username and password';
} else {
    // check if username is valid
    $stmt = mysqli_prepare($conn, "SELECT Username FROM admin WHERE Username =  ?");
    mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $numOfusers = mysqli_stmt_num_rows($stmt);

    if ($numOfusers == 0) {
        $errors['username'] = 'This Username is not valid.';
    }

    // check if password is correct with the username
    $stmt = mysqli_prepare($conn, "SELECT PasswordHash FROM admin WHERE Username =  ?");
    mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashedPassword);
    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        $data['password'] = $hashedPassword;
    }

    if (password_verify($Password, $hashedPassword)) {
        $_SESSION['user_id'] = $Username;

        setcookie('user', $_POST['username'], time() + (86400 * 80));
    } else {
        $errors['password'] = 'Password incorrect.';
    }
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);
