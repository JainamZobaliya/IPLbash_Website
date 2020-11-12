=<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    include("Datasource.php");
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $mobile=$_POST['mobile'];
    $mail=$_POST['mail'];
    $address=$_POST['address'];
    $password=$_POST['password1'];
    $favteam=$_POST['favteam'];
    $usertype="User";


    $query= "UPDATE signup SET fname=?,lname=?,gender=?,dob=?,mobile=?,addres=?,favteam=? WHERE mail=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssss", $fname,$lname,$gender,$dob,$mobile,$address,$favteam,$mail);
    	
    mysqli_close($conn);
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['gender']=$gender;
        $_SESSION['dob']=$dob;
        $_SESSION['mobile']=$mobile;
        $_SESSION['mail']=$mail;
        $_SESSION['address']=$address;
        $_SESSION['favteam']=$favteam;

    header('Location:profile.php');


?>
</body>
</html>