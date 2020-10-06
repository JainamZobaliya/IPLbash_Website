<!DOCTYPE html>
<head>
<style>
div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding-left: 100px;
    padding:20px;
    padding-right: 100px;
    align-content:center;
  }
</style>
</head>
<body>
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body bgcolor="navy">
<?php
    include("Datasource.php");

    $mail=$_POST['mail'];
    $password=$_POST['password'];

    $query1 = "SELECT mail,pass from signup WHERE mail='$mail'";
    $result1 = mysqli_query($conn,$query1);
    $pass="";
    $count = mysqli_num_rows($result1);
    if($count>0){
       while($row=mysqli_fetch_assoc($result1)){
            $email=$row['mail'];
            $pass=$row['pass'];
        
       }
    
    if($password == $pass){
        $query2 = "SELECT * from signup WHERE mail='$mail'";
        $result2 = mysqli_query($conn,$query2);
        $count = mysqli_num_rows($result2);
        if($count>=0){
            while($row=mysqli_fetch_assoc($result2)){
                $mail=$row['mail'];
                $pass1=$row['pass'];
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
  
        
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['gender']=$gender;
        $_SESSION['dob']=$dob;
        $_SESSION['mobile']=$mobile;
        $_SESSION['mail']=$mail;
        $_SESSION['address']=$address;
        $_SESSION['favteam']=$favteam;

    if($usertype="User"){
        mysqli_close($conn);
        header('Location: teamPage.php');
    }elseif($usertype=="admin"){
        mysqli_close($conn);
        header('Location: payment.php');
    }   
}else{
    echo"INCORRECT PASSWORD";
    echo"<br><br><a href='login2.php'>GO BACK</a>";
}
}else{
    echo"<div><h2> Account doesnot exist </h2><h3> Please Sign Up to continue...!</h3>";
    echo"<br><a href='login2.php'>GO BACK</a><a style='padding-left:30px;' href='signin.php'> Sign Up</a><br><br><br></div>";
}

?>  
</body>
</html>