<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="STYLE2.css">
	<title>REGISTER</title>
</head>
<body style="color:#FFF307;">

<?php
    $fnameErr = $lnameErr = $emailErr = $dayErr = $passErr = $modeErr = $numberErr = $addressErr = $usernameErr = $agreeErr ="";
    $fname = $lname = $email = $day = $mode = $number = $pass = $password = $address = $username = $agree = "";
    
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

      if (empty($_POST["day"])) {
        $bdayErr = "* Date is required";
      } else {
        $day = $_POST['day'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($day), date_create($today));
        if($diff->format('%y%') >0){
          $bdayErr = "* Date is Invalid<br>";
        }
      }
      
      if (empty($_POST["mail"])) {
        $emailErr = "<br>* Email is required<br>";
      } else {
        $email = $_POST["mail"];
      }
      
      if (empty ($_POST["mode"])) {  
        $modeErr = "<br>* Payment Mode is required";  
      } else {  
          $mode = $_POST["mode"];  
      } 

      if (empty($_POST["number"])) {  
        $numbererErr = "<br>* Contact Number is required";  
      } else {  
        $year = $_POST["number"];    
        if (!preg_match ("/^[0-9]*$/", $number) ) {  
        $numberErr = "* Only numeric value is allowed.";  
        }    
      if (strlen ($number) != 10) {  
        $numberErr = "<br>* Mobile No. must contain 10 digits.";  
        }  
      }  
	  
	    if (empty($_POST["address"])) {
        $addressErr = "<br>* Address is required";
      }
      else {
        $address = $_POST["address"];
      }

      if (empty($_POST["username"])) {
        $usernameErr = "<br>* username is required";
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

      if (empty($_POST['agree'])){  
        $agreeErr = "<br>* Accept terms of services before submit.";  
      } else {  
        $agree =$_POST["agree"];  
      } 

      // if(empty($fnameErr && $lnameErr && $emailErr && $addressErr && $passErr && $modeErr && $agreeErr && $dayErr && $numberErr && $usernameErr)){
      //   header('Location: details.php?fname='.$fname.'&lname='.$lname.'&day='.$day.'&mail='.$email.'&mode='.$mode.'&address='.$address.'&number='.$number.'&username='.$username);
      //  exit();
      //  }



    }

    


        
    ?>

	<center>
	<h1>IPL LIVE</h1>
	<h2>Account Details</h2>
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
	<strong>Date Of Delivery:&nbsp&nbsp</strong> <input type="date" name="day" id="day" required></input><br><br>
	<span class="error"> <?php echo $dayErr;?></span>
	<strong>Payment Mode:&nbsp&nbsp</strong> <input type="radio" id="mode" name="mode" value="netbanking">Net banking</input>
  <input type="radio" name="mode" id="mode" value="creditcard">Credit Card</input><br>
  <input type="radio" name="mode" id="mode" value="debitcard">Debit Card</input>
  <input type="radio" name="mode" id="mode" value="cod">COD</input>
	<span class="error"> <?php echo $modeErr;?></span><br><br>
	<strong>Contact:&nbsp&nbsp</strong>
 <input type="tel" required style="border-radius: 5px" id="number" name="number" value="">
 <span class="error"> <?php echo $numberErr;?></span>
 <br><br>
 <strong>Email-Id:&nbsp&nbsp</strong>
 <input type="email" required style="border-radius: 5px" placeholder="Example@xyz.com" id="mail" name="mail" value="">
 <span class="error"> <?php echo $emailErr;?></span>
 <br><br>
 <strong>Address:</strong><br><br>
 <textarea name="Text1" cols="30" rows="5" required name="address" placeholder="Enter Your Address Here..." style="border-radius: 5px"></textarea>
 <span class="error"> <?php echo $addressErr;?></span>
 <br><br>
 <h1> Confirm Account Details:</h1>
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
 <label >Agree to Terms of Service:  </label><br><br>
 <input type="checkbox" name="agree">  
 <span class="error"> <?php echo $agreeErr; ?> </span>  
 <br><br>  
 <center><input type="submit" value="Register"></center>
	</fieldset><br>
 <a style="color: #F0FF00;" href="Signin.html"><big>Already a User??</big></a><br><br><br>
	</form><br>
	</center>
	</div>
</body>
</html>