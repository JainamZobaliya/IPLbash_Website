<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="navBar.css">
    <link rel="stylesheet" type="text/css" href="teamPage.css">
    <link rel="stylesheet" type="text/css" href="homePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>

*{
	 box-sizing: border-box;
}

body {
	background-color: grey;
  font-family: Times new roman;
  color: white;
  font-family: sans-sarif;
}

.column1 {
    float: left;
    width: 28%;
    padding: 0 10px;
   
   
}
.column2 {
    float: left;
    width: 100%;
    padding: 0 30px;
}

input[type=text] {
  width: 25%;
  margin-right: 20px;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

 Clear floats after the columns 
.row:after {
  content: "";
  display: table;
  clear: both;
}

.card {
  border-top: 1px solid white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 white;
  padding: 30px;
  text-align: left;
  background-color: transparent;
  height:1000px;
}

@media screen and (max-width: 600px) {
  .column1 .column2 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.column2 hr{
    border: 1px dashed silver;
}

input {
  width: 300px;
  height: 3em;
}
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden; 
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
.navright {
    float:right;
}

	</style>
</head>

<body>
<div class="navBar">
			<div class="navBarLogo"><a class="logo" href="https://www.iplt20.com/"></a></div>
			<ul class="navLink">
				<li><a class="activeSite" href="teamPage.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
				<li><a href="#"><i class="fas fa-tshirt"></i> Teams</a></li>
				<li><a href="#"><i class="fa fa-calendar"></i> Schedule</a></li>
				<li><a href="#"><i class="fa fa-image"></i> Gallery</a></li>
				<li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
				<li><a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a></li>
				<li style="float: right;"><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
				<li style="float: right;"><a id="storeBtn" href="#"><i class="fas fa-store"></i> Store</a></li>
			</ul>
		</div>
        <br>


    <?php
    include 'Datasource.php';
      $query1 = "SELECT * from signup WHERE mail='$mail'";
      $result1 = mysqli_query($conn,$query1);
  
      $count = mysqli_num_rows($result1);
      if($count>=0){
         while($row=mysqli_fetch_assoc($result1)){
          $mail=$row['mail'];
          $pass=$row['pass'];
          $fname=$row['fname'];
          $lname=$row['lname'];
          $gender=$row['gender'];
          $dob=$row['dob'];
          $mobile=$row['mobile'];
          $address=$row['address'];
          $usertype=$row['user'];
          $favteam=$row['favteam'];
          
         }
      }

    ?>


  <div class="column2">
    <div class="card">
        <?php echo"<h2>WELCOME ".$_SESSION['fname']." ".$_SESSION['lname']." ;</h2>"; ?>
    	<p align="left" style="color: black;"><b><i><u>PERSONAL INFORMATION</u></i></b></p><br><br>
    	<label for="fname"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Full Name</label>
            <input type="text" id="fname" name="firstname" value='$fname'>
            <input type="text" id="lname" name="lastname" value='$lname'><br><hr><br>
        <label for="dob"><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;Date of Birth</label>
            <input type="text" id="dob" name="dob" value='$dob'>
            <br><hr><br>
            <label for="mail"><i class="fa fa-envelope"></i>&nbsp;&nbsp;EMAIL ID</label>
            <input type="text" id="mail" name="mail" value='$mail'><br><hr>
            <label for="mobile"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Mobile No.</label>
            <input type="text" id="mob" name="mob" value='mobile'><br><hr>
            <label for="gender"><i class="fa fa-user"></i>&nbsp;&nbsp;GENDER</label>
            <input type="text" id="gender" name="gender" value='$gender'><br><hr>
            <label for="address"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;ADDRESS</label>
            <input type="text" id="address" name="address" value='$address'><br><hr>
            <label for="favteam"><i class="fas fa-heart"></i>&nbsp;&nbsp;FAVOURITE TEAM</label>
            <input type="text" id="favteam" name="favteam" value='$favteam'><br><hr>

    </div>
    <<button type="button" data-toggle="modal" data-target="#editprofile">Open Modal</button>
  </div>


<!-- Modal -->
<div class="modal fade" id="editprofile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        <form action="dbsignup.php" method="POST">
                        <fieldset>
                            <input type="text" class="inpText" name="fname" id="fname" autocomplete="Off" placeholder="First Name">
                            <br><br>
                            <input type="text" class="inpText" name="lname" id="lname" autocomplete="Off" placeholder="Last Name">
                            <br><br>
                            Gender: 
                            <input class="inpText" type="radio" name="gender" id="gender" value="Male">
                            <label class="inpText" for="male">Male</label>
                            <input class="inpText" type="radio" name="gender" id="gender" value="Female">
                            <label class="inpText" for="female">Female</label>
                            <input class="inpText" type="radio" name="gender" id="gender" value="Other">
                            <label class="inpText" for="other">Other</label> 
                            <br><br>
                            <label class="inpText" for="dob">Birth Date: </label>
                            <input type="date" name="dob" id="dob" max="2010-12-31" min="1910-12-31">
                            <br><br>
                            <label class="inpText" for="Contact_Mobile">Mobile No.:</label>
                            <input class="inpText" type="tel" id="mobile" name="mobile" autocomplete="On" placeholder="54-454-68-452" pattern="[0-9]{10}"> 
                            <br><br>
                            <label class="inpText" for="mail">Email Id.: </label>
                            <input class="inpText" type="email" name="mail" id="mail" autocomplete="On" placeholder="Example@air.com">
                            <br><br>
                            <label class="inpText address" for="Address">Address: </label>
                            <textarea class="inpText" name="address" id="address" rows="3" cols="30" placeholder="Enter Your Address..." autocomplete="off"></textarea>
                            <br><br>
                            <label class="inpText" for="psd1">Password:</label>
                            <input class="inpText" type="Password" name="password1" id="password1" placeholder="********" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> 
                            <br><br>
                            <label class="inpText" for="psd2">Confirm Password:</label>
                            <input class="inpText" type="Password" name="password2" id="paassword2" placeholder="********" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <br><br>
                            <label>Your favorite Team:</label> 
                            <select class="team" name="favteam" id="favteam">
                                <option value="default" diabled></option>
                                <option value="Chennai Super Kings">Chennai Super Kings</option>
                                <option value="Mumbai Indians">Mumbai Indians</option>
                                <option value="Royal Challengers Bangalore">Royal Challengers Bangalore</option>
                                <option value="Kolakata Knight Riders">Kolakata Knight Riders</option>
                                <option value="Sunrises Hyderabad">Sunrises Hyderabad</option>
                                <option value="Kings XI Punjab">Kings XI Punjab</option>
                                <option value="Delhi Capitals">Delhi Capitals</option>
                                <option value="Rajasthan Royals">Rajasthan Royals</option>
                            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  



</body>
</html>