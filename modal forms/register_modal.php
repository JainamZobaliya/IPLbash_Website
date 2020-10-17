<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script  type="text/javascript">
        var total_seconds = 15;
        var shown=false;
        var c_minutes=parseInt(total_seconds/60);
        var c_seconds=parseInt(total_seconds%60);
       // var hours=parseInt(total_seconds/3600);
        function CheckTime(){
        document.getElementById('time-left').innerHTML='Time Left: '+c_minutes+' min '+c_seconds+' sec';
        if(total_seconds<=0){
           // alert("oops no time left");
            //setTimeout('document.form.submit()',1);
        }else{
            //alert("start");
            total_seconds=total_seconds-1;
            c_minutes=parseInt(total_seconds/60);
            c_seconds=parseInt(total_seconds%60);
            //hours=parseInt(total_seconds/3600);
            //alert(total_seconds);
            document.getElementById('t_sec').value=total_seconds;
            var time_left = $('#t_sec').val();
            //alert(time_left);
            if(time_left<=10){
            //alert("hello "+time_left);
            if (shown==false){
                $('#myModal').modal('show');
                shown=true;
            }

            $('#m_sec').text(time_left);
            }
            console.log(total_seconds);         
            setTimeout("CheckTime()",1000);
        }
        }
        setTimeout("CheckTime()",1000);

        function save_data(){

        var sec=document.getElementById('t_sec').value;

        $.ajax({
            type:'post',
            url: 'save_time.php',
            data:{total_sec:sec},
            success:function(response){

            }
        });
        alert(sec);
        //setTimeout('document.form.submit()',1);
        }



    </script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.loginbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.btn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>

</head>
<body>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <h2>WELCOME</h2>
  <label for="email">Don't miss out on the latest updates!</label>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="loginbtn">Login</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="registerbtn">Register</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="guestbtn">Guest</button>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>






</body>
</html>