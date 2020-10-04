<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <link rel="stylesheet" type="text/css" href="footer.css"> -->
		<link rel="stylesheet" type="text/css" href="navBar.css">
		<link rel="stylesheet" type="text/css" href="teamPage.css">
		<link rel="stylesheet" type="text/css" href="homePage.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>

		<title>IPL-2020</title>
		<style>
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden; 
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
.navright {
    float:right;
}
div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding-left: 100px;
    padding:20px;
    padding-right: 100px;
    align-content:center;
  }
</style>
	</head>
	<body onload="currentSlide(1)">
	<?php
    echo"<a><h2>WELCOME ".$_SESSION['fname']." ".$_SESSION['lname']." ;</h2></a>";
?>
		<script src="slideShow.js"></script>
		<div class="navBar">
			<div class="navBarLogo"><a class="logo" href="https://www.iplt20.com/"></a></div>
			<ul class="navLink">
				<li><a class="activeSite" href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
				<li><a href="#"><i class="fas fa-tshirt"></i> Teams</a></li>
				<li><a href="#"><i class="fa fa-calendar"></i> Schedule</a></li>
				<li><a href="#"><i class="fa fa-image"></i> Gallery</a></li>
				<li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
				<li><a href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a></li>
				<li style="float: right;"><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
				<li style="float: right;"><a id="storeBtn" href="#"><i class="fas fa-store"></i> Store</a></li>
			</ul>
		</div>
        <br>
        
		<table class="teamsTable" cellspacing="20">
			<tr>
				<td class="teamCard teamCSK">
					<a href="HomePage_CSK.html" target="_self">
                        <img class="teamCardImg" src="image/Team1_CSK/1_0_CSK.jpg">
                        <h1><br>Chennai Super<br>Kings</h1>
                        <h4>M.A. Chidambaram Stadium</h4>
                        <span class="teamCardAward teamCardAwardCSK">
                            <img src="image/0_0_Trophy.jpg" height="18" width="25">2010, 2011, 2018
                        </span>
                        <br><br>
                        <h3>TEAM HOME</h3> <br>
					</a>
				</td>
			
				<td class="teamCard teamDC">
					<a href="HomePage_DC.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/Team2_DC/2_0_DC.jpg">
							<h1><br>Delhi<br>Capitals</h1>
                            <h4> Feroz Shah Kotla Ground</h4>
                            <!-- <span class="teamCardAward teamCardAwardDC">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">
                            </span> -->
                            <br><br>
							<h3>TEAM HOME</h3><br><br>
						</center>
					</a>
				</td>

				<td class="teamCard teamKXIP">
					<a href="HomePage_KXIP.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/Team3_KXIP/3_0_KXIP.jpg">
							<h1><br>Kings XI<br>Punjab</h1>
                            <h4> IS Bindra Stadium </h4>
                            <!-- <span class="teamCardAward teamCardAwardKXIP">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">
                            </span> -->
                            <br><br>
							<h3>TEAM HOME</h3> <br><br>
						</center>
					</a>
				</td>

				<td class="teamCard teamKKR">
					<a href="HomePage_KKR.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/Team4_KKR/4_0_KKR.jpg">
							<h1><br>Kolkata Knight<br>Riders</h1>
							<h4>Eden Garden</h4>
                            <span class="teamCardAward teamCardAwardKKR">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">2012, 2014
                            </span>
                            <br><br>
							<h3>TEAM HOME</h3><br>
						</center>
					</a>
                </td>

			</tr>
            <tr>
				<td class="teamCard teamMI">
					<a href="HomePage_MI.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/team5_MI/5_0_MI.png">
							<h1><br>Mumbai<br>Indians</h1>
							<h4>Wankhede Stadium</h4>
                            <span class="teamCardAward teamCardAwardMI">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">2013, 2015, 2017, 2019
                            </span>
                            <br><br>
							<h3>TEAM HOME</h3><br>
						</center>
					</a>
                </td>
                
				<td class="teamCard teamRR">
					<a href="HomePage_RR.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/Team6_RR/6_0_RR.png">
							<h1><br>Rajasthan<br>Royals</h1>
							<h4>Sawai Mansingh Stadium</h4>
                            <span class="teamCardAward teamCardAwardMI">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">2008
                            </span>
                            <br><br>
							<h3>TEAM HOME</h3><br>
						</center>
					</a>
				</td>
                
				<td class="teamCard teamRCB">
					<a href="HomePage_RCB.html" target="_self">
						<center>
							<img class="teamCardImg" src="image/Team7_RCB/7_0_RCB.png">
							<h1><br>Royal Challengers<br>Bangalore</h1>
							<h4>M. Chinnaswamy Stadium</h4>
                            <!-- <span class="teamCardAward teamCardAwardRCB">
								<img src="image/0_0_Trophy.jpg" height="18" width="25">
                            </span> -->
                            <br><br>
							<h3>TEAM HOME</h3><br>
						</center>
					</a>
				</td>
                
                <td class="teamCard teamSH">
                    <a href="HomePage_SH.html" target="_self">
                        <center>
                            <img class="teamCardImg" src="image/Team8_SH/8_0_SH.png">
                            <h1><br>Sunrisers<br>Hyderabad</h1>
                            <h4>Rajiv Gandhi Intl. Cricket Stadium</h4>
                            <span class="teamCardAward teamCardAwardSH">
                                <img src="image/0_0_Trophy.jpg" height="18" width="25">2016
                            </span>
                            <br><br>
                            <h3>TEAM HOME</h3><br>
                        </center>
                    </a>
                </td>
            </tr>
        </table>
        
    </body>
</html>