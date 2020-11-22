<?php
$itemNo=1
$itemId = $_POST['Product_Id'];
$query1 = "SELECT * from cart WHERE mail=?";
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

?>
 <table class="userTables">
    <tr>
        <th>Sr. No.</th>
        <th>Id.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Description</th>
        <th>Quantity</th>
    </tr>

    <tr>
        <td class="srNo"><?php echo $itemNo; ?></td>
        <td class="id"><?php echo $itemId; ?></td>
        <td class="name"><?php echo $itemName; ?></td>
        <td class="id"><?php echo "".$itemCategory; ?></td>
        <td><img src="<?php echo $itemImageURL; ?>" alt="<?php echo $itemImage; ?>" class="itemImage"></td>
        <td class="itemDescription"><?php echo $itemDescription; ?></td>
        <td><?php echo '1'; ?></td>
    </tr>