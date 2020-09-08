<!DOCTYPE html>
<html>
    <head>
        <title>IPL Registration Form</title>
	    <link rel="stylesheet" type="text/css" href="signUp.css">
    </head>
    <body>
        <!-- <script type='text/javascript'>
            function hideHTML() {
                console.log("In function Script");
                var x = document.getElementsByClassName("regForm");
                for(var i=0; i<=x.length;i++)
                {
                    console.log("In function for Script");
                    x[i].style.display = "none";
                }
                    console.log("In function outFor Script");
            }
        </script> -->
        <div class="container">
                <div class="img1"></div>
                <div class="img2"></div>
            <?php
                $flag = true;
                $fNameErr = $lNameErr = $genderErr = $mobileNoErr = $emailErr = $dobErr = $password1Err = $password2Err = $addressErr = $favTeamErr = "*";
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(empty($_POST["fName"]))
                    {
                        $fNameErr = "Error:Please Enter First Name";
                        $flag = false;
                    }
                    else
                    {
                        $fName = $_POST['fName'];
                        $fNameErr = "";
                    }

                    if(empty($_POST["lName"]))
                    {
                        $lNameErr = "Error:Please Enter Last Name";
                        $flag = false;
                    }
                    else
                    {
                        $lName = $_POST['lName'];
                        $lNameErr = "";
                    }

                    if(empty($_POST["gender"]))
                    {
                        $genderErr = "Error:Please Select Gender";
                        $flag = false;
                    }
                    else
                    {
                        $sex = $_POST['gender'];
                    }

                    if(empty($_POST["birthDate"]))
                    {
                        $dobErr = "Error:Please Birth Date";
                        $flag = false;
                    }
                    else
                    {
                        $dob = $_POST['birthDate'];
                        $dobErr = "";
                    }

                    if(empty($_POST["Mobile_No"]))
                    {
                        $mobileNoErr = "Error:Please Enter Mobile No";
                        $flag = false;
                    }
                    else
                    {
                        $mobileNo = $_POST['Mobile_No'];
                        $mobileNoErr = "";
                    }

                    if(empty($_POST["email"]))
                    {
                        $emailErr = "Error:Please Enter Email Id";
                        $flag = false;
                    }
                    else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                    {
                        $emailErr = "Invalid email format";
                        $flag = false;
                    }
                    else
                    {
                        $emailId = $_POST['email'];
                        $emailErr = "";
                        $userName = $emailId;
                    }

                    if(empty($_POST["Address"]))
                    {
                        $addressErr = "Error:Please Enter Address";
                        $flag = false;
                    }
                    else
                    {
                        $address = $_POST['Address'];
                        $addressErr = "";
                    }

                    if(empty($_POST["password1"]))
                    {
                        $password1Err = "Error:Please Enter Password";
                        $flag = false;
                    }
                    // else if(!preg_match("/^(?=.*\d)(?=.*?[a-zA-Z])(?=.*?[\W_]).{6,10}$",$_POST["password1"])) 
                    // {
                    //     $password1Err = "Please rewrite the password with required format.<small>(Hover to see the format)</small>".($_POST["password1"]);
                    //     $flag = false;
                    // }
                    else
                    {
                        $password1 = $_POST['password1'];
                        $password1Err = "";
                    }

                    if(empty($_POST["password2"]))
                    {
                        $password2Err = "Error:Please Enter Password";
                        $flag = false;
                    }
                    // else if(!preg_match("/^(?=.*\d)(?=.*?[a-zA-Z])(?=.*?[\W_]).{6,10}$",$_POST["password2"])) 
                    // {
                    //     $password2Err = "Please rewrite the password with required format.<small>(Hover to see the format)</small>".($_POST["password2"]);
                    //     $flag = false;
                    // }
                    else if($password1!=$_POST['password2']) 
                    {
                        $password2Err = "Both Passwords do <b>not</b> match";
                        $flag = false;
                    }
                    else
                    {
                        $password2 = $_POST['password2'];
                        $password1Err = "";
                    }

                    if(isset($_REQUEST['favTeam']) && $_REQUEST['favTeam'] == 'default') { 
                        $favTeamErr = "Please select your favourite Team"; 
                        $flag = false;
                    }
                    else
                    {
                        $favTeamErr = "";
                    }
                    if($flag)
                    {
                        echo "<div class='dispPhp'>Hello, <B>".$fName." ".$lName."</B>;";
                        echo "<br />You are <strong><em>Successfully</em> </strong>registered.";
                        echo "<br />Your Details are as following:<br />";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Name: <I>".$fName." ".$lName."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Gender: <I>".$sex."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; DOB: <I>".$dob."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Email Id.: <I>".$emailId."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Contact No.: <I>".$mobileNo."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Address: <I>".$address."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; User Name: <I>".$userName."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Password: <I>".$password1."</I>";
                        echo "<br />&nbsp;&nbsp;&nbsp;&nbsp; Your Favourite Team is: <I>".$_REQUEST['favTeam']."</I>";
                        echo "<h3>Now You can go back to XYZ.com and enjoy!!!</h3></div>";
                        // echo "<script type='text/javascript'>console.log('In Php Script');hideHTML();</script>";
                    }
                }
            ?>
            <div class="regForm">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <fieldset>
                            <input type="text" class="inpText" name="fName" autocomplete="Off" placeholder="First Name">
                            <span class="error"><?php echo $fNameErr;?></span> <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <br><br>
                            <input type="text" class="inpText" name="lName" autocomplete="Off" placeholder="Last Name">
                            <span class="error"><?php echo $lNameErr;?></span> <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <br><br>
                            Gender: 
                            <span class="error"><?php echo $genderErr;?></span>&nbsp;
                            <input class="inpText" type="radio" name="gender" id="male" value="male">
                            <label class="inpText" for="male">Male</label>
                            <input class="inpText" type="radio" name="gender" id="female" value="female">
                            <label class="inpText" for="female">Female</label>
                            <input class="inpText" type="radio" name="gender" id="other" value="other">
                            <label class="inpText" for="other">Other</label> <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <br><br>
                            <label class="inpText" for="dob">Birth Date: </label>
                            <span class="error"><?php echo $dobErr;?></span>&nbsp;
                            <input type="date" name="birthDate" id="dob" max="2010-12-31" min="1910-12-31">
                            <br><br>
                            <label class="inpText" for="Contact_Mobile">Mobile No.:</label>
                            <span class="error"><?php echo $mobileNoErr;?></span>&nbsp;
                            <input class="inpText" type="tel" id="Contact_Mobile" name="Mobile_No" autocomplete="Off" placeholder="54-454-68-452" pattern="[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{3}"> <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <br><br>
                            <label class="inpText" for="mail">Email Id.: </label>
                            <span class="error"><?php echo $emailErr;?></span>&nbsp;
                            <input class="inpText" type="email" name="email" id="mail" autocomplete="Off" placeholder="Example@air.com">
                            <br><br>
                            <label class="inpText address" for="Address">Address: </label>
                            <span class="error address"><?php echo $addressErr;?></span>&nbsp;
                            <textarea class="inpText" name="Address" rows="3" cols="30" placeholder="Enter Your Address..." autocomplete="off"></textarea>
                            <br><br>
                            <label class="inpText" for="psd1">Password:</label>
                            <span class="error"><?php echo $password1Err;?></span>&nbsp;
                            <input class="inpText" type="Password" name="password1" id="psd1" placeholder="********" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
                            <br><br>
                            <label class="inpText" for="psd2">Confirm Password:</label>
                            <span class="error"><?php echo $password2Err;?></span>&nbsp;
                            <input class="inpText" type="Password" name="password2" id="psd2" placeholder="********" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <br><br>
                            <label>Your favorite Team:</label> 
                            <span class="error"><?php echo $favTeamErr;?></span>&nbsp;
                            <select class="team" name="favTeam" id="favTeam">
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
                        </fieldset>
                        <input type="submit" value="REGISTER" class="button">
                    </form>
                </div>
        </div>
    </body>
</html>