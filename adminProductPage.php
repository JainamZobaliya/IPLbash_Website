<?php
    session_start();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" type="text/css" href="footer.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="adminProductPage.js"></script>
        <script src="adminUserPage.js"></script>
		<script src="modal.js"></script>
		<link rel="stylesheet" type="text/css" href="adminModalcss">
		<link rel="stylesheet" type="text/css" href="adminTable.css">
		<link rel="stylesheet" type="text/css" href="adminUserPage.css">
		<link rel="stylesheet" type="text/css" href="adminProductPage.css">
		<title>IPLBash HomePage</title>
    </head>
	<body onload="openDefaultTab()">

        <?php
            //Refer: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
            $ciphering = "AES-128-CTR"; // Store the cipher method             
            $iv_length = openssl_cipher_iv_length($ciphering); // Use OpenSSl Encryption method 
            $options = 0; 
            $encryption_iv = '1234567891011121'; // Non-NULL Initialization Vector for encryption 
            $encryption_key = "iplBASH"; // Store the encryption key 
        ?>
        
        <div class="navBarr">
            <?php
                include 'adminSideBar.php';
            ?>
        </div>

        <div class="mainContainer">
            <div class="pageHeader"> Product </div>

            <?php 
            // This is to access DataBase 
                include("Datasource.php");
            ?>

            <div class="productContainer">
                <button class="tabLink tabLink2" onclick="openPage('addNewCategoryTab', this)">Add New Category</button>
                <button class="tabLink tabLink2" onclick="openPage('addNewProductTab', this)">Add New Product</button>
                <button class="tabLink tabLink2" onclick="openPage('updateCategoryTab', this)">Update or View A Category</button>
                <button class="tabLink tabLink2" onclick="openPage('updateProductTab', this)" id="defaultOpen">Update or View A Product</button>
                
                <div class="productMainContainer">
                    <div id="updateCategoryTab" class="tabContent activeTabContent"> 
                        <table class="userTables">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Id.</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Inserted By</th>
                                <th>Inserted At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>

                            <?php 
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);
                                $totalItem = mysqli_num_rows($result);
                                $var = 0;
                                if($totalItem > 0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $categoryNo = ++$var;
                                        $categoryId = $row['Id'];
                                        $categoryName = $row['Name'] ;
                                        $categoryQuantity = $row['Quantity'];
                                        $categoryInsertedBy = $row['Inserted_By'];
                                        $categoryInsertedAt = $row['Inserted_At'];
                                        $categoryUpdatedBy = $row['Updated_By'];
                                        $categoryUpdatedAt = $row['Updated_At'];
                                        //Refer: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
                                        $encryptedId = openssl_encrypt($categoryId, $ciphering, $encryption_key, $options, $encryption_iv);
                            ?>
                            <tr>
                                <td><?php echo $categoryNo; ?></td>
                                <td><?php echo $categoryId; ?></td>
                                <td><?php echo $categoryName; ?></td>
                                <td><?php echo $categoryQuantity; ?></td>
                                <td class="userId"><?php echo $categoryInsertedBy; ?></td>
                                <td class="timeStamp"><?php echo $categoryInsertedAt; ?></td>
                                <td class="userId"><?php echo $categoryUpdatedBy; ?></td>
                                <td class="timeStamp"><?php echo $categoryUpdatedAt; ?></td>
                                <td>
                                    <div class="editBtn" id="openModal">
                                        <a href="adminUpdateCategory.php?id=<?php echo $encryptedId; ?>">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </div>
                                    <div class="deleteBtn" id="openModal">
                                        <a href="adminDeleteCategory.php?id=<?php echo $encryptedId; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <?php 
                                    }
                                }
                            ?>

                        </table>
                    </div>


                    <div id="updateProductTab" class="tabContent activeTabContent">
                        <!-- <div class="content">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <label>Select the Category: </label> 
                                <select class="category" name="searchCategoryOption" id="categoryOption">
                                    <option value="all">All</option>
                                    <?php 
                                        // This is to fetch Product and Category Count from DataBase
                                        $sql = "SELECT * FROM Category";
                                        $result = mysqli_query($conn, $sql);
                                        $countCategory = mysqli_num_rows($result);
                                        $totalProducts = 0;
                                        if($countCategory > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $categoryId = $row['Id'];
                                                $categoryName = $row['Name'];
                                                $countProductOfCategoryId = $row['Quantity'];
                                                $totalProducts += $countProductOfCategoryId;
                                    ?>
                                    <option value="<?php echo $countProductOfCategoryId ?>"><?php echo $categoryName ?></option>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </select>
                                <input type="submit" value="SEARCH" name="search" class="button">
                            </form>
                        </div> 
                        <?php
                            if(isset($_POST['searchCategoryOption'])){
                                $currentCategory=$favteam=$_POST['searchCategoryOption'];
                                echo "Current Category is: ".$currentCategory;
                            }
                        ?> -->
                    
                        <table class="userTables">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Id.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th class="description">Description</th>
                                <th>Quantity</th>
                                <th>Inserted By</th>
                                <th>Inserted At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>

                            <?php 
                            // This is to fetch user details from DataBase 
                                // if($currentCategory!="")
                                //     $sql = "SELECT * FROM product WHERE Category_Id='$currentCategory'";
                                // else
                                    $sql = "SELECT * FROM product";
                                //echo "Category: ".$currentCategory;
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
                                        //Refer: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
                                        $encryptedId = openssl_encrypt($itemId, $ciphering, $encryption_key, $options, $encryption_iv);
                            ?>
                            <tr>
                                <td><?php echo $itemNo; ?></td>
                                <td><?php echo $itemId; ?></td>
                                <td><?php echo $itemName; ?></td>
                                <td><?php echo "".$itemCategory; ?></td>
                                <td><img src="<?php echo $itemImageURL; ?>" alt="<?php echo $itemImage; ?>" class="itemImage"></td>
                                <td class="itemDescription"><?php echo $itemDescription; ?></td>
                                <td><?php echo $itemQuantity; ?></td>
                                <td class="userId"><?php echo $itemInsertedBy; ?></td>
                                <td class="timeStamp"><?php echo $itemInsertedAt; ?></td>
                                <td class="userId"><?php echo $itemUpdatedBy; ?></td>
                                <td class="timeStamp"><?php echo $itemUpdatedAt; ?></td>
                                <td>
                                    <div class="editBtn" id="openModal">
                                        <a href="adminUpdateProduct.php?id=<?php echo $encryptedId; ?>">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </div>
                                    <div class="deleteBtn" id="openModal">
                                        <a href="adminDeleteProduct.php?id=<?php echo $encryptedId; ?>">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <?php 
                                    }
                                }
                            ?>

                        </table>
                    </div>

                </div>

                <?php 
                    mysqli_close($conn);
                ?>
            </div>

	</body>
</html>