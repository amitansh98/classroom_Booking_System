<?php
  include("student.php");
  $studentObject=new student;

  $studentObject=new student;
	
  if(!$_SESSION["name"]){
		header('Location:login.php');
	}
	if(isset($_POST['xlogout'])){
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy(); 
		header('Location:login.php');
	}


?>
<html>
<head>
 
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

<style>
  #requestarea{


    padding:5%;
    height:450px;
    overflow-y: scroll;
    overflow-x: hidden; 

  }
  .panel{
   // height:30% !important;
    //background: none;
   
  }
  #loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 10px solid #ffffff;
  border-radius: 50%;
  border-top: 10px solid #ee6e73;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-20px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-20px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#mainbody {
  display: none;
  text-align: center;
}
.dropdown-content{
  width:auto !important;
  
}
</style>
	
<script>

var myVar;
function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mainbody").style.display = "block";
}
$(document).ready(function() {
      $('select').material_select();
      $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
      });

       // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();

      if($('#roomarea').height()<1)
        $('#roomarea').append("<div id='emojibody'class='row center'><img id='theImg'  src='images/emoji.png' /><br><p style='font-weight:light;font-size:20px;'> Kindly enter the requirements, so that we can show you rooms. </p></div>");
      
      

    });

</script>		
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
<div class="row " style="background:#607d8b;height:auto;">
        <p class="center col l12 s12 m12" style="padding:0%;color:white;font-size:200%;font-family:Rockwell;">Classroom Booking System</p>
    	<a class="waves-effect waves-light btn" href="studenthome.php" style="float:right;margin-right:5px;margin-bottom:5px;">Home</a>
    </div>
<div style="display:none;" id="mainbody" class="animate-bottom">
  

    <div id="requestarea" class="row center hoverable">
      <div class="row left"><p class="chip"style="">Booking History</p></div>
      <?php

          echo "<script>document.getElementById('requestarea').innerHTML = ".$studentObject->getBookedRooms()."</script>;";

      ?>
      <!--script>
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("txtHint").innerHTML = this.responseText;
               document.getElementById("requestarea").innerHTML =this.responseText;

            }
        };
        xmlhttp.open("GET","admin.php?q="+getrequests,true);
        xmlhttp.send(); 
        </script-->
    </div>





</div>

</body>
</html>