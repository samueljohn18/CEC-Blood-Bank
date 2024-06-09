<?php
$fullname=$_POST['fullname'];
$name=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

$isValid = true;
$errorMsg = "";

// Check for capital letter
if (!preg_match('/[A-Z]/', $password)) {
    $isValid = false;
    $errorMsg .= "Password must contain at least one capital letter. ";
}

// Check for small letter
if (!preg_match('/[a-z]/', $password)) {
    $isValid = false;
    $errorMsg .= "Password must contain at least one small letter. ";
}

// Check for minimum 8 characters
if (strlen($password) < 8) {
    $isValid = false;
    $errorMsg .= "Password must be at least 8 characters long. ";
}

// Check for digits
if (!preg_match('/\d/', $password)) {
    $isValid = false;
    $errorMsg .= "Password must contain at least one digit. ";
}

// Check for special characters
if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
    $isValid = false;
    $errorMsg .= "Password must contain at least one special character. ";
}

if (!$isValid) {
    // Password does not meet the criteria
    include ("signup.php");
} else {
    // Password meets the criteria
    $conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
    $sql= "INSERT INTO user(fullname,name,password,email) values('{$fullname}','{$name}','{$password}','{$email}')";

    $result=mysqli_query($conn,$sql);

    if(!$result)
    {
        if(isset($errorMsg))
            unset($errorMsg);
        include('signup.php');
    }
    else
    {
        unset($_POST['login']);
        include ("userlogin.php");
    }
    

    mysqli_close($conn);
}
 ?>
