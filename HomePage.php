<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" type="text/css" href="footer.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
		<script src="slideShow.js"></script>
		<script src="storePage.js"></script>
		<link rel="stylesheet" type="text/css" href="slideShow.css">
		<link rel="stylesheet" type="text/css" href="homePage.css">
		<title>IPLBash HomePage</title>
	</head>
	<body onload="currentSlide(1)">

		<div class="navBarr" onload="activePage('fa-home')">
			<?php
				include 'navBar.html';
			?>
		</div>
		
		<div class="slideShowContainer">
			<div class="slides fade">
				<img class="imgSlide" src="../image/0_All_8_Teams.jpg" alt="img1" style="width: 100%;">
				<div class="imgCaption"></div>
			</div>
			<div class="slides fade">
				<img class="imgSlide" src="../image/0_2_img.jpg" alt="img2" style="width: 100%;">
				<div class="imgCaption"></div>
			</div>
			<div class="slides fade">
				<img class="imgSlide" src="../image/0_All_8_Teams_2.jpg" alt="img3" style="width: 100%;">
				<div class="imgCaption"></div>
			</div>
			<div class="slides fade">
				<img class="imgSlide" src="../image/0_1_Trophy.jpg" alt="img4" style="width: 100%;">
				<div class="imgCaption"></div>
			</div>
			<div class="slides fade">
				<img class="imgSlide" src="../image/0_All_8_Teams_3.jpg" alt="img5" style="width: 100%;">
				<div class="imgCaption"></div>
			</div>
			<!-- <div> Next and Previous Button </div> -->
			<a onclick="pushSlides(-1)" class="prev">&#10094;</a>
			<a onclick="pushSlides(1)" class="next">&#10095;</a>
			<div class="slideShowDot">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
				<span class="dot" onclick="currentSlide(4)"></span>
				<span class="dot" onclick="currentSlide(5)"></span>
			</div>
		</div>
		
		<div class="mainContainer">
			<div class="matchHistory">
				<div class="matchHistoryHeading">Match History</div>
				<div class="match js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "autoPlay": true }'>
					<div class="prevMatch">
						<div class="teamNo">T20 1 of 56</div>
						<div class="matchDate">Sat, 19/09</div>
						<div class="teamDetails">
							<div class="team1">
								<div class="teamLogo"><img src="../image/Team5_MI/5_0_MI.png" height="100px" width="100px" alt="team1"></div>
								<div class="teamName">MI</div>
								<div class="score">162/9 (20)</div>
							</div>
							<div class="vs">vs</div>
							<div class="team2">
								<div class="teamLogo"><img src="../image/Team1_CSK/1_0_CSK.jpg" height="100px" width="100px" alt="team2"></div>
								<div class="teamName">CSK</div>
								<div class="score">166/5 (19.2)</div>
							</div>
						</div>
						<div class="winDetails">CSK Won by 5 wickets (4 balls left).</div>
					</div>

					<div class="prevMatch">
						<div class="teamNo">T20 2 of 56</div>
						<div class="matchDate">Sun, 20/09</div>
						<div class="teamDetails">
							<div class="team1">
								<div class="teamLogo"><img src="../image/Team2_DC/2_0_DC.jpg" height="100px" width="100px" alt="team1"></div>
								<div class="teamName">DC</div>
								<div class="score">157/8 & 3/0 Target 3</div>
							</div>
							<div class="vs">vs</div>
							<div class="team2">
								<div class="teamLogo"><img src="../image/Team3_KXIP/3_0_KXIP.jpg" height="100px" width="100px" alt="team2"></div>
								<div class="teamName">KXIP</div>
								<div class="score">157/8 & 2/2</div>
							</div>
						</div>
						<div class="winDetails">DC Won the Super Over (4 balls left).</div>
					</div>

					<div class="prevMatch">
						<div class="teamNo">T20 3 of 56</div>
						<div class="matchDate">Mon, 21/09</div>
						<div class="teamDetails">
							<div class="team1">
								<div class="teamLogo"><img src="../image/Team7_RCB/7_0_RCB.png" height="100px" width="100px" alt="team1"></div>
								<div class="teamName">RCB</div>
								<div class="score">163/5 (20)</div>
							</div>
							<div class="vs">vs</div>
							<div class="team2">
								<div class="teamLogo"><img src="../image/Team8_SH/8_0_SH.png" height="100px" width="100px" alt="team2"></div>
								<div class="teamName">SRH</div>
								<div class="score">153 (19.4)</div>
							</div>
						</div>
						<div class="winDetails">RCB Won by 10 runs.</div>
					</div>

					<div class="prevMatch">
						<div class="teamNo">T20 4 of 56</div>
						<div class="matchDate">Tue, 22/09</div>
						<div class="teamDetails">
							<div class="team1">
								<div class="teamLogo"><img src="../image/Team6_RR/6_0_RR.png" height="100px" width="100px" alt="team1"></div>
								<div class="teamName">RR</div>
								<div class="score">216/7 (20)</div>
							</div>
							<div class="vs">vs</div>
							<div class="team2">
								<div class="teamLogo"><img src="../image/Team1_CSK/1_0_CSK.jpg" height="100px" width="100px" alt="team2"></div>
								<div class="teamName">CSK</div>
								<div class="score">200/6 (20)</div>
							</div>
						</div>
						<div class="winDetails">RR Won by 16 runs.</div>
					</div>
				</div>
			</div>

			<div class="productList">
				<div class="productListHeading">Shop Gears and Jerseys</div>
				<div class="productContainer  js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "autoPlay": true }'>
					
					<?php 
						// This is to fetch user details from DataBase 
						// if($currentCategory!="")
						//     $sql = "SELECT * FROM product WHERE Category_Id='$currentCategory'";
						// else
						include('Datasource.php');
						$sql = "SELECT * FROM product";
						//echo "Category: ".$currentCategory;
						$result = mysqli_query($conn, $sql);
						$totalProduct = mysqli_num_rows($result);
						$var = 0;
						if($totalProduct > 0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								$productNo = ++$var;
								$productId = $row['Product_Id'];
								$productName = $row['Product_Name'] ;
								$productCategory = $row['Category_Id'] ;
								$productImage = $row['Image_URL'];
								$productImageURL = "../image/shop/".$row['Image_URL'];
								$productDescription = $row['Product_Description'];
								$productQuantity = $row['Quantity'];
								$productPrice = $row['Product_Price'];
								$productInsertedBy = $row['Inserted_By'];
								$productInsertedAt = $row['Inserted_At'];
								$productUpdatedBy = $row['Updated_By'];
								$productUpdatedAt = $row['Updated_At'];
								//Refer: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
								// $encryptedId = openssl_encrypt($productId, $ciphering, $encryption_key, $options, $encryption_iv);
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
					
				</div>
			</div>

			<div class="latestNews">
				<div class="latestNewsHeading">Latest News</div>
				<div class="newsContainer js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "autoPlay": true }'>
					
					<?php 
						$sql = "SELECT * FROM news";
						$result = mysqli_query($conn, $sql);
						$totalItem = mysqli_num_rows($result);
						$var = 0;
						if($totalItem > 0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								$newsNo = ++$var;
								$newsId = $row['Id'];
								$newsHeadLine = $row['Headline'] ;
								$newsContent = $row['NewsContent'];
								$newsAuthor = $row['Author'];
								$newsInsertedBy = $row['Inserted_By'];
								$newsInsertedAt = $row['Inserted_At'];
								$newsUpdatedBy = $row['Updated_By'];
								$newsUpdatedAt = $row['Updated_At'];
					?>
						<div class="news">
							<div class="newsHeadline"><?php echo $newsHeadLine; ?></div>
							<div class="newsAuthor"><?php echo $newsAuthor; ?></div>
							<div class="newsContent">
								<?php echo $newsContent; ?>
							</div>
						</div>
					<?php 
							}
						}
					?>
			</div>
		</div>

		<footer class="footer">
			<?php
				include('Footer.html');
			?>
		</footer>

	</body>
</html>