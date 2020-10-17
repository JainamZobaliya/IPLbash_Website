<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $itemId = $_GET['id'];
        //Refer: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
        $ciphering = "AES-128-CTR"; // Store the cipher method             
        $iv_length = openssl_cipher_iv_length($ciphering); // Use OpenSSl Encryption method 
        $options = 0; 
        $decryption_iv = '1234567891011121';    // Non-NULL Initialization Vector for decryption  
        $decryption_key = "iplBASH";    // Store the decryption key 
        // Use openssl_decrypt() function to decrypt the data 
        $itemId = openssl_decrypt ($itemId, $ciphering, $decryption_key, $options, $decryption_iv);
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" type="text/css" href="footer.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="adminProductPage.js"></script>
		<script src="modal.js"></script>
		<link rel="stylesheet" type="text/css" href="adminModalcss">
		<link rel="stylesheet" type="text/css" href="adminTable.css">
		<link rel="stylesheet" type="text/css" href="adminUserPage.css">
		<link rel="stylesheet" type="text/css" href="adminUpdateProductPage.css">
		<title>IPLBash HomePage</title>
    </head>
	<body>      
        <div class="navBarr">
            <?php
                include 'adminSideBar.php';
                include 'Datasource.php'
            ?>
        </div>
        <?php
            include("Datasource.php");
            $flag = false;
            $productNameErr = $descriptionErr = $imageErr = $quantityErr = "";
            if($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                $itemId = $_POST['id'];
                $flag = true;
                if(empty($_POST["ProductName"]))
                {
                    echo "Error:Please Enter Product Name";
                    $flag = false;
                }
                else
                {
                    $itemName = $_POST['ProductName'];
                    $productNameErr = "";
                    $flag = true;
                }

                if(empty($_POST["description"]))
                {
                    echo "Error:Please Enter Description";
                    $flag = false;
                }
                else
                {
                    $itemDescription = $_POST['description'];
                    $descriptionErr = "";
                    $flag = true;
                }

                if(empty($_POST["quantity"]) || $_POST["quantity"]<1)
                {
                    echo "Error: Please Enter Correct Quantity";
                    $flag = false;
                }
                else
                {
                    $itemQuantity = $_POST['quantity'];
                    $quantityErr = "";
                    $flag = true;
                }
                if(!empty($_FILES['image']['name']))
                {
                    $imageName = $_FILES['image']['name'];
                    $imageErr = "";
                    $imageType = $_FILES['image']['type'];
                    $imageSize = $_FILES['image']['size'];
                    $image_tmp_loc = $_FILES['image']['tmp_name'];
                    $imageTargetDirectory = "../image/shop/".$imageName;
                    if(move_uploaded_file($image_tmp_loc,$imageTargetDirectory))
                    {
                        $flag = true;
                        $_POST['imageName'] = $imageName;
                    }
                    else{
                        $flag = false;
                        $imageErr = "Error in Uploading Image";
                    }
                }
                else{
                    $_POST['imageName'] = $itemImage;
                }

                if($flag){
                    $_SESSION['item'] = $_POST; 
                    header("Location: adminUpdateProductCode.php");
                }
            }
        ?>
        <?php
            // This is to fetch user details from DataBase 
            $sql = "SELECT * FROM product WHERE Product_Id='$itemId'";
            $result = mysqli_query($conn, $sql);
            $totalItem = mysqli_num_rows($result);
            $var = 0;
            if($totalItem > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $itemNo = ++$var;
                    $itemId = $row['Product_Id'];
                    $itemName = $row['Product_Name'] ;
                    $itemCategory = $row['Category_Id'] ;
                    $itemImage = $row['Image_URL'];
                    $itemImageURL = "../image/shop/".$row['Image_URL'];
                    $itemDescription = $row['Product_Description'] ;
                    $itemQuantity = $row['Quantity'];
                    $itemInsertedBy = $row['Inserted_By'];
                    $itemInsertedAt = $row['Inserted_At'];
                    $itemUpdatedBy = $row['Updated_By'];
                    $itemUpdatedAt = $row['Updated_At'];
                }
            }
        ?>

        <div class="mainContainer">
            <div class="pageHeader"> Edit Product: <?php echo $itemId; ?> </div>
            <div class="productContainer">
                <div class="productMainContainer">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                        <label for="id">Product Id: </label>
                        <input name="id" type="number" value="<?php echo $itemId?>"> <br/><br/>
                        <label for="category">Product Category Id: </label>
                        <input name="category" disabled type="number" value="<?php echo $itemCategory?>"> <br/><br/>
                        <label for="ProductName">Product Name: </label>
                        <input name="ProductName" type="text" value="<?php echo $itemName?>"> 
                            <span class="error"><?php echo $productNameErr;?></span> <br/><br/>
                        <label for="description">Product Description: </label>
                        <textarea name="description" type="text" rows="1" cols="50"><?php echo $itemDescription?></textarea> 
                            <span class="error"><?php echo $descriptionErr;?></span> <br/><br/>
                        <label for="quantity">Product Quantity: </label>
                        <input name="quantity" type="number" value="<?php echo $itemQuantity?>"> 
                            <span class="error"><?php echo $quantityErr;?></span> <br/><br/>
                        <label for="image">Product Image: <small>(If any new Image)</small> </label>
                        <input type="file" name="image"> <br/><br/>
                        <input type="submit" value="UPDATE" name="update" class="button"> <br/><br/>
                    </form>
                </div>

                <?php 
                    mysqli_close($conn);
                ?>
            </div>
        </div>
	</body>
</html>