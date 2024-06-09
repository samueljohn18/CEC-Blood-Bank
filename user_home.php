<?php global $message; ?>
<html>
<bodys background>
<div class= "background-image">
</div>
<style>


.bodys {
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
  opacity: 0.5; 
  z-index: -1;
}
</style>
<?php
        include 'conn.php';
        session_start();
        if (isset($_SESSION['username'])) {
          
        $fullname=$_SESSION['username'];
        $sql="select * from user where name='$fullname'";
        $result=mysqli_query($conn,$sql) or die("query failed.");
        $row=mysqli_fetch_assoc($result);
        echo '<h1>Hello, ' . $row['fullname'] . '</h1>'; ?>
        <nav>
  <ul>
    <li><a href="donate_blood.php">Donate Blood</a></li>
    <li><a href="need_blood.php">Need Blood</a></li>
    <li><a href="user_logout.php">Logout</a></li>
  </ul>
</nav><?php
       } 
       else {
        // Handle the case when the username is not set in the session
        echo '<h1>Error: User not logged in</h1>';
      }
// else {
//         // echo '<div class="alert alert-danger"><b> Please Login First To Access User Portal.</b></div>';
        
//         <form method="post" name="" action="userlogin.php" class="form-horizontal">
//           <div class="form-group">
//             <div class="col-sm-8 col-sm-offset-4" style="float:left">

//               <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
//             </div>
//           </div>
//         </form>
//      }

      ?>

  <style>
    body{
  margin: 0px;
  padding: 0px;
  background: #D7AAAA;
  font-family: 'Lato', sans-serif;
}

h1 {
      font-size: 50px; /* Adjust the font size as needed */
      font-weight: bold;
      color: #040404; /* Adjust the color as needed */
      text-align: center; /* Center the text horizontally */
      margin-top: 60px; /* Add spacing from the top */
    }

nav{
  float: none; 
  clear: both;
  width: 30%; 
  margin: 10% auto;
  background: #eee;
}

nav ul {
  list-style: none;
  margin: 0px;
  padding: 0px;
}

nav li{
	float: none; 
  width: 100%;
}

nav li a{
  display: block; 
  width: 100%; 
  padding: 20px; 
  border-left: 5px solid; 
  position: relative; 
  z-index: 2;
  text-decoration: none;
  color: #444;
  box-sizing: border-box;  
  -moz-box-sizing: border-box;  
  -webkit-box-sizing: border-box; 
}
	
nav li a:hover{ border-bottom: 0px; color: #fff;}
nav li:first-child a{ border-left: 10px solid #3498db; }
nav li:nth-child(2) a{ border-left: 10px solid #ffd071; }
nav li:nth-child(3) a{ border-left: 10px solid #f0776c; }
nav li:last-child a{ border-left: 10px solid #1abc9c; }

nav li a:after { 
  content: "";
  height: 100%; 
  left: 0; 
  top: 0; 
  width: 0px;  
  position: absolute; 
  transition: all 0.3s ease 0s; 
  -webkit-transition: all 0.3s ease 0s; 
  z-index: -1;
}

nav li a:hover:after{ width: 100%; }
nav li:first-child a:after{ background: #3498db; }
nav li:nth-child(2) a:after{ background: #ffd071; }
nav li:nth-child(3) a:after{ background: #f0776c; }
nav li:last-child a:after{ background: #1abc9c; }



@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 100;
  src: local('Lato Hairline'), local('Lato-Hairline'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/boeCNmOCCh-EWFLSfVffDg.woff) format('woff');
}
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 300;
  src: local('Lato Light'), local('Lato-Light'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/KT3KS9Aol4WfR6Vas8kNcg.woff) format('woff');
}
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: local('Lato Regular'), local('Lato-Regular'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/9k-RPmcnxYEPm8CNFsH2gg.woff) format('woff');
}
@font-face {
  font-family: 'Lato';
  font-style: normal;
  font-weight: 700;
  src: local('Lato Bold'), local('Lato-Bold'), url(http://themes.googleusercontent.com/static/fonts/lato/v6/wkfQbvfT_02e2IWO3yYueQ.woff) format('woff');
}
</style>
<?php include('footer.php') ?>



<script>
      // Display the message as an alert after a delay of 1 second
      window.addEventListener("load", function(e) {
        <?php if (isset($message)): ?>
          setTimeout(function() {
            alert('<?php echo $message; ?>');
          }, 400);
        <?php endif; ?>
      });
    </script>
</body>
</html>
