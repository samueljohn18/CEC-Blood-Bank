<?php
session_start();
if (@$_SESSION['loggedin'])
{
  header("Location: user_home.php");
}

?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body >
<div class= "background-image">
</div>
<style>


body {
  position: relative;
}

.background-image {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url("image/pic1-01-scaled.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  opacity: 0.5; /* Adjust the opacity value as needed */
  z-index: -1;
}
</style>
<?php 
$active ='login';
include('head.php');

include 'conn.php';

if(isset($_POST["login"]))
{
  $name = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $sql = "SELECT * from user where name='$name' and password='$password'";
  

  $result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

  if(mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $_SESSION['loggedin'] = true;
      $_SESSION["username"] = $name;
      header("Location: user_home.php");
    }
  }
  else
  {
    echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
  }
}
?>

<style>
    html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(white);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.85);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: white;
  font-size: 12px;
}

.login-box .mm input {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: red;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box .mm input:hover {
  background: red;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px red,
              0 0 25px red,
              0 0 50px red,
              0 0 100px red;
}

.login-box .mm input span {
  position: absolute;
  display: block;
}

.login-box .mm input span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box .mm input span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box .mm input span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box .mm input span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
    </style>


<div class="login-box">
  <h2>Login</h2>

  <form method="POST" action="userlogin.php">
    <div class="user-box">
      <input type="text" name="username" class="form-control" value="" style="padding: 10px;" required autocomplete="off">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" class="form-control" value="" style="padding: 10px;" required>
      <label>Password</label>
    </div>
    <div class="mm">
      <input type="submit" name="login" value="LOGIN" style="cursor:pointer">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <a href="signup.php">
    <input type="button" value="SIGNUP" style="cursor:pointer">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
</a>
    </div>
  </form>
</div>

<?php include('footer.php');?>
</body>
</html>
