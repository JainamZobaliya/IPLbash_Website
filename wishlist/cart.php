<!DOCTYPE html>
<html>
    <head>
        <title>IPL Bash Cart</title>
    </head>
    <body>
<?php
include 'Datasource.php'

$mail=$_SESSION['mail'];
$query1 = "SELECT * from cart WHERE mail=?";
    $stmt = $conn->prepare($query1); 
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $totalProduct = mysqli_num_rows($result)
    if($totalProduct > 0)
	    {
        while($row = $result1->fetch_assoc()){
            $Product_Id = $row['Product_Id'];
            $productName = $row['Product_Name'];
            $Category_Id = $row['Category_Id'];
            $productImageURL = $row['Image_URL']
            $Product_Description = $row['Product_Description'];
            $quantity = 1;
            $product_Price = $row['Product_Price']

?>
<div class="productCard">
    <div class="productDescriptionDiv">
        <img class="productImage" src="<?php echo $productImageURL; ?>" alt="<?php echo $productImage; ?>">
    </div>
    <span class="wishList tooltip">
        <span class="far fa-heart" onmouseover="solidHeart(this)" onmouseout="borderHeart(this)" onclick="addWishList(this)"></span>
    </span>
    <div class="productName"><?php echo $productName; ?></div>
    <div class="productPrice">&#8377 <?php echo $productPrice; ?> /-</div>
    <div class="productDescription"><?php echo $Product_Description; ?></div>
   
    <?php 
            }
        }
    ?>

    <footer class="footer">
        <?php
            include 'Footer.html';
        ?>
    </footer>	
</body>
</html>