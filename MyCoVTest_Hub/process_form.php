<?php
include 'db_connection.php';
$conn = OpenCon();
$db = "CO3102_CW2_2020";

$errors = array();      // array to hold validation errors
$data = array();      // array to pass back data

// Get all data from  form
$Email = $_POST['email'];
$Fullname = $_POST['fullname'];
$Age = $_POST['age'];
$Gender = $_POST['gender'];
$Address = $_POST['address'];
$Postcode = $_POST['postcode'];
$TTN = $_POST['TTN'];
$TestResult = $_POST['testresult'];


// full name validation
if (empty($Fullname)) {
    $errors['fullname'] = 'Name is required.';
} else {
    // check if first and second name has been inputted
    if (!preg_match("/(.+)( )(.+)/", $Fullname)) {
        $errors['fullname'] = 'Incorrect Name Format, please include your first and last name.';
    } else {
    }
}

// email validation
$stmt = mysqli_prepare($conn, "SELECT Email FROM testresult WHERE Email =  ?");
mysqli_stmt_bind_param($stmt, 's', $Email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$numOfEmails = mysqli_stmt_num_rows($stmt);

if (empty($Email)) {
    $errors['email'] = 'Email is required.';
} else {
    // validate if the email is in correct format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid Email Format.';
    } else if ($numOfEmails > 0) {
        $errors['email'] = 'This email has already been used.';
    }
}
// Age validation
if (empty($Age)) {
    $errors['age'] = 'Age is Required.';
}

// Gender validation
if (empty($Gender)) {
    $errors['gender'] = 'Please select a Gender.';
}


// Address validation
if (empty($Address)) {
    $errors['address'] = 'Address is required.';
}

// postcode validation
if (empty($Postcode)) {
    $errors['postcode'] = 'Postcode is required.';
}

// test validation
if (empty($TestResult)) {
    $errors['testresult'] = 'Please enter your test result.';
}

// TTN validation
// Check if TTN is a valid one

$stmt = mysqli_prepare($conn, "SELECT TNN_Code FROM hometestkit WHERE TNN_Code =  ?");
mysqli_stmt_bind_param($stmt, 's', $TTN);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$result_TTN = mysqli_stmt_num_rows($stmt);

//  Check if TTN code has already been used

$stmt = mysqli_prepare($conn, "SELECT used FROM hometestkit WHERE TNN_Code = ?");
mysqli_stmt_bind_param($stmt, 's', $TTN);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $row_used = $row['used'];
    $data['useddddd'] = $row['used'];
}

if (empty($TTN)) {
    $errors['TTN'] = 'TTN is required.';
} else {
    if ($result_TTN == 0) {
        $errors['TTN'] = 'This TTN code is not valid.';
    } else {
        if ($row_used == 1) {
            $errors['TTN'] = 'This TTN code Has already been used.';
        } else if ($row_used == 0) {
            // updated ttn to used so no other person can use it
            if (empty($errors)) {
                $stmt = mysqli_prepare($conn, "UPDATE hometestkit SET used = 1 WHERE TNN_Code =  ?");
                mysqli_stmt_bind_param($stmt, 's', $TTN);
                mysqli_stmt_execute($stmt);
            }
        }
    }
}




// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message

    // Using prepared statements to prevent from sql injections
    $stmt = mysqli_prepare($conn, "INSERT INTO testresult(Email, Fullname, Age, Gender, Address, Postcode, TTN, TestResult)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssisssss', $_POST['email'], $_POST['fullname'], $_POST['age'], $_POST['gender'], $_POST['address'], $_POST['postcode'], $_POST['TTN'], $_POST['testresult']);
    $stmt->execute();
    $stmt->close();

    mysqli_close($conn);

    $data['success'] = true;
    $data['message'] = 'You Have Successfully Submitted Your Test Report!';
}


echo json_encode($data);
