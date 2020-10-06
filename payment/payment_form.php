<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment Gateway</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
<style>
label {
  color: black;
  margin-bottom: 10px;
  display: block;
}

*{
	 box-sizing: border-box;
}

body {
	background-color: grey;
  font-family: Times new roman;
  color: white;
  font-size: 17px;
}

.column1 {
    float: left;
    width: 30%;
    padding: 0 10px;
   
   
}
.column2 {
    float: left;
    width: 70%;
    padding: 0 30px;
}

input {
  width: 25%;
  margin-right: 20px;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.card {
  border-top: 1px solid white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 white;
  padding: 30px;
  text-align: left;
  background-color: transparent;
  height:1000px;
}

@media screen and (max-width: 600px) {
.column1 .column2 {
    width: 95%;
    display: block;
    margin-bottom: 20px;
  }
}

.column2 hr{
    border: 1px dashed silver;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.container {
  padding: 5px 20px 15px 20px;
  border-radius: 3px;
}

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

	</style>
</head>

<body>
<div class="navBar">
      <div class="navBarLogo"><a class="logo" href="https://www.iplt20.com/"></a></div>
      <?php
        include 'home_nav.html';
        
      ?>
        <br>
	<div class="row">
  <div class="column2">
    <div class="card">
    <br>
    <button class="accordion">Payment Details </button>
    <div class="panel"><br><br>
         <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="***">
              </div>
              <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
            </div>
            <br>
            <p style="padding-right:30px;"><button style="padding:15px;" type="button" href="confirm_payment.php">Confirm Payment!</button></p>
          </div>
      

        <button class="accordion">Shipping Details</button>
        <div class="panel">
        <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">
            <label for="state"><i class="fa fa-map-marker"></i>State</label>
            <input type="text" id="state" name="state" placeholder="NY">
            <label for="zip">Zip</label>
            <input type="text" id="zip" name="zip" placeholder="10001">
            </div>
        </div>
        </div>







  </div>
</div>
    
  
  <div class="column1">
    <div class="card">
      <div class="black">
        <?php echo"<h2> Please Checkout :</h2><h3><i><u>".$_SESSION['fname']." ".$_SESSION['lname']."</i></u></h3>"; ?>
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>

    
      </div>
    </div>   
  </div>
  <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>



</body>
</html>