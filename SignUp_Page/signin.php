<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="STYLE2.css">
	<title>REGISTER</title>
</head>
<body style="color:#FFF307;">

<?php
    $fnameErr = $lnameErr = $emailErr = $bdayErr = $passErr = $genderErr = $numberErr = $usernameErr = "";
    $fname = $lname = $email = $bday = $gender = $number = $pass = $password = $username ="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {  
      if (empty($_POST["first_name"])) {
        $fnameErr = "<br>* First Name is required";
      } else {
        $fname = $_POST["first_name"];
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $fnameErr = "<br>* Invalid Format";
        }
      }

      if (empty($_POST["last_name"])) {
        $lnameErr = "* Last Name is required    ";
      } else {
        $lname = $_POST["last_name"];
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
          $lnameErr = "* Invalid Format";
        }
      }

      if (empty($_POST["bday"])) {
        $bdayErr = "* DOB is required";
      } else {
        $bday = $_POST['bday'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bday), date_create($today));
        if($diff->format('%y%') < 10){
          $bdayErr = "* You are too young to register<br>";
        }
      }
      
      if (empty($_POST["mail"])) {
        $emailErr = "<br>* Email is required<br>";
      } else {
        $email = $_POST["mail"];
      }
      
      if (empty ($_POST["gender"])) {  
        $genderErr = "<br>* Gender is required";  
      } else {  
          $gender = $_POST["gender"];  
      } 

      if (empty($_POST["number"])) {  
        $numbererErr = "<br>* Contact Number is required";  
      } else {  
        $year = $_POST["number"];    
        if (!preg_match ("/^[0-9]*$/", $number) ) {  
        $numberErr = "* Only numeric value is allowed.";  
        }    
      if (strlen ($number) != 10) {  
        $numberErr = "<br>* Year must contain 10 digits.";  
        }  
      }  
	  
	    if (empty($_POST["username"])) {
        $usernameErr = "<br>* Username is required";
      }
      else {
        $username = $_POST["username"];
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
          $usernameErr = "<br>* Invalid Format";
        }
      }

	    if (empty($_POST["password"] || $_POST["pass"])) {
        $passErr = "<br>* Password is required";
      }
      else 
      {
        $password = $_POST["password"];
        $pass = $_POST["pass"];
        if($pass != $password)
        {
          $passErr="<br>* Passwords do not match!!";
        }
      }
    }
        
    ?>

	<center>
	<h1>IPL LIVE</h1><br>
	<h2>Sign-up</h2>
	<div class="center">
	<form class="loginform1" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<fieldset style="width: 500px; border-radius: 15px">
	<br>
	<strong>Name:</strong>&nbsp&nbsp
 <input type="text" required style="border-radius: 5px" name="first_name" id="first_name" placeholder="First Name" value="">&nbsp&nbsp
 <input type="text" required style="border-radius: 5px" name="last_name" id="last_name" placeholder="Last Name" value="">
 <span class="error"> <?php echo $fnameErr;?></span>
 <span class="error"> <?php echo $lnameErr;?></span>
 <br>
 <br><br>
	<strong>Date Of Birth:&nbsp&nbsp</strong> <input type="date" name="bday" id="bday" required></input><br><br>
	<span class="error"> <?php echo $bdayErr;?></span>
	<strong>Gender:&nbsp&nbsp</strong> <input type="radio" id="gender" name="gender" value="Male">Male</input>
	<input type="radio" name="gender" id="gender" value="Female">Female</input>
	<span class="error"> <?php echo $genderErr;?></span><br><br>
	<strong>Contact:&nbsp&nbsp</strong>
 <input type="tel" required style="border-radius: 5px" id="number" name="number" value="">
 <span class="error"> <?php echo $numberErr;?></span>
 <br><br>
 <strong>Email-Id:&nbsp&nbsp</strong>
 <input type="email" required style="border-radius: 5px" placeholder="Example@xyz.com" id="mail" name="mail" value="">
 <span class="error"> <?php echo $emailErr;?></span>
 <br><br>
 <strong>Address:</strong><br><br>
 <textarea name="Text1" cols="30" rows="5" required name="ADDRESS" placeholder="Enter Your Address Here..." style="border-radius: 5px"></textarea>
 <br><br>
 <strong>Username:&nbsp&nbsp</strong>
 <input type="text" required style="border-radius: 5px" id="username" name="username" value="">
 <span class="error"> <?php echo $usernameErr;?></span>
 <br><br>
 <strong>Password:&nbsp&nbsp</strong>
 <input type="Password" required name="password" id="password" style="border-radius: 5px; " value="">
 <br><br>
 <strong>Confirm Password:&nbsp&nbsp</strong>
 <input type="Password" required name="pass" id="pass" style="border-radius: 5px; " value="">
 <span class="error"> <?php echo $passErr;?></span>
 <br><br>
 <center><input type="submit" value="Register"></center>
	</fieldset><br>
 <a style="color: #F0FF00;" href="Signin.html"><big>Already a User??</big></a><br><br><br>
	</form><br>
	</center>
	</div>
</body>
</html>