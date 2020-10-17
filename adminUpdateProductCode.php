<?php
    session_start();
    include("Datasource.php");
    $_POST = $_SESSION['item'];
    //Process the image that is uploaded by the user
    $itemImageName = $_POST['imageName'];
    $itemName = $_POST["ProductName"];
    $itemDescription = $_POST["description"];
    $itemQuantity = $_POST["quantity"];
    $currentUser = $_SESSION['emailId'];
    $currentTimeStamp = date("Y-m-d H:i:s");
    if($itemImageName=="")
    {
        $query= "UPDATE product SET Product_Name=?, Product_Description=?, Quantity=?, Updated_By=?, Updated_At=? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssiss", $itemName, $itemDescription, $itemQuantity, $currentUser, $currentTimeStamp);
    }
    else{
        $query= "UPDATE product SET Product_Name=?, Product_Description=?, Quantity=?, Image_URL=?, Updated_By=?, Updated_At=? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssisss", $itemName, $itemDescription, $itemQuantity, $itemImageName, $currentUser, $currentTimeStamp);
    }
    $stmt->execute();
    $stmt->close();
    //storing the data in your database
    echo "Details are Updated, you will be redirected to your account page in 3 seconds....";
    unset ($_SESSION["item"]);
    header( "Refresh:3; url=adminProductPage.php",true,303);
?>