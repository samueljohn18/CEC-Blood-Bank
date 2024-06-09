
<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$date = date('Y-m-d', strtotime($_POST['date']));
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address,donor_date) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}','{$date}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
include ("add_donor.php");

mysqli_close($conn);
 ?>
