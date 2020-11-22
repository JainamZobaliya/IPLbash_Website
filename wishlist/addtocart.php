<?php
$mail=$_SESSION['mail'];
$itemId = $_POST['Product_Id'];
$query1 = "SELECT * from wishlist WHERE mail=?";
    $stmt = $conn->prepare($query1); 
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result1 = $stmt->get_result();
    while($row = $result1->fetch_assoc()){
        $itemId = $_POST['Product_Id'];
        $itemName = $_POST['Product_Name'];
        $itemCategory = $_POST['Category_Id'];
        $itemImageURL = $_POST['Image_URL']
        $itemDescription = $_POST['Product_Description'];
        $quantity = $_POST['quantity'];
    }


$query1 = "INSERT INTO cart VALUES (?,?,?,?,?,?,?)";
$result1 = mysqli_prepare($conn,$query1);
mysqli_stmt_bind_param($result1,"siissss",$mail,$itemId,$itemName,$itemCategory,$itemImageURL,$itemDescription,1);
if(mysqli_stmt_execute($result1)){
    header('Location:storage.php');
}
mysqli_stmt_close($result1);

?>