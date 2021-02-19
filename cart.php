<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>IPL Bash Cart</title>
		<link rel="stylesheet" type="text/css" href="storePage.css">
    </head>
    <body>
        <?php 
				include 'navBar.html';
        ?>
        <div class="itemContainer">
            <?php
                include 'Datasource.php';
                $mail=$_SESSION['mail'];
                $query1 = "SELECT * from cart WHERE mail=?";
                $stmt = $conn->prepare($query1); 
                $stmt->bind_param("s", $mail);
                $stmt->execute();
                $result1 = $stmt->get_result();
                $totalProduct = mysqli_num_rows($result1);
                if($totalProduct > 0)
                {
                    while($row = $result1->fetch_assoc()){
                        $Product_Id = $row['Product_Id'];
                        $productName = $row['Product_Name'];
                        $Category_Id = $row['Category_Id'];
                        $productImage = $row['Image_Url'];
                        $productImageURL = "../image/shop/".$row['Image_Url'];
                        $productDescription = $row['Product_Description'];
                        $quantity = $row['Quantity'];;
                        $productPrice = $row['Product_Price'];
            ?>
                <div class="itemCard">
                    <div class="itemImageDiv">
                        <img class="itemImage" src="<?php echo $productImageURL; ?>" alt="<?php echo $productImage; ?>">
                    </div>
                        <span class="wishList tooltip">
                            <a href="addtowishlist.php?id=<?php echo $productId; ?>">
                                <span class="fas fa-heart heart" onmouseover="solidHeart(this)" onmouseout="borderHeart(this)" onclick="addWishList(this)">
                                    <span class="tooltipText">Add to Wish-List</span>
                                </span>
                            </a>
                        </span>
                    <div class="itemDescription">
                        <div class="itemName"><?php echo $productName; ?></div>
                        <div class="itemPrice">&#8377 <?php echo $productPrice; ?>/-</div>
                        <div class="itemName desc2"><?php echo $productDescription; ?></div>
                        <div class="cart fa fa-shopping-cart" onmouseover="cartPlus(this)" onmouseout="normalCart(this)">
                            <a href="addtocart.php?id=<?php echo $productId; ?>">
                                <span class="cartText">Added To Cart</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                    }
                }
                else{
            ?>
                <div class="itemCard noItemCard">
                    <div class="noItem">No Items in Cart</div>
                </div>
            <?php
                }
            ?>
        </div>
        <footer class="footer">
            <?php
                include 'Footer.html';
            ?>
        </footer>	
</body>
</html>
