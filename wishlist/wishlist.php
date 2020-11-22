<!DOCTYPE html>
<html>
    <head>
        <title>IPL Bash Wishlist</title>
    </head>
    <body>
<?php
include 'Datasource.php'

$mail=$_SESSION['mail'];
$query1 = "SELECT * from wishlist WHERE mail=?";
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

?>
<div class="productCard">
    <div class="productDescriptionDiv">
        <img class="productImage" src="<?php echo $productImageURL; ?>" alt="<?php echo $productImage; ?>">
    </div>
    <span class="wishList tooltip">
        <span class="far fa-heart" onmouseover="solidHeart(this)" onmouseout="borderHeart(this)" onclick="addWishList(this)">
            <span class="tooltipText">Add to Wish-List</span>
        </span>
    </span>
    <div class="productName"><?php echo $productName; ?></div>
    <div class="productPrice">&#8377 <?php echo $productPrice; ?> /-</div>
    <div class="productButton">
        <div class="cart fa fa-shopping-cart" onmouseover="cartPlus(this)" onmouseout="normalCart(this)">
            <span class="cartText">Add To Cart</span>
        </div>
        <div class="buyNow fa fa-shopping-bag">
            <span class="buyText ">Buy Now</span>
        </div>
    </div>
</div>

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