<?php

  include('student.php');
  
  if(!$_SESSION["name"]){
  
    header('Location:login.php');
  
  }
  
  if(isset($_POST['xlogout'])){
    
    $facultylogout=new faculty;
    $facultylogout->logout();
  
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
<body onload="myFunction()" style="margin:0;background-image:url('images/background.png');background-size: cover;">

<div id="loader"></div>
<div style="display:none;" id="mainbody" class="animate-bottom">
  <div class="row"style="background:#607d8b;">
    <!--div class="col s6 l8 m8"></div-->
    <div class="col s2 l2 m2">
      <a class='dropdown-button btn center'  style="margin-top:5px;" href='#' data-activates='dropdown1'><i class="material-icons">perm_contact_calendar

</i></a>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a class="center" href="#!"><img src="images/profile.jpg"></img></li>
        <li><p  class="center"><?php echo $_SESSION["name"];?></p></li>
        <li class="divider"></li>
        <li class='center' style='font-weight:bold;text-align:center;'><?php echo $_SESSION["type"] ?></li>
      </ul>


    </div>
	<div class="col s6 l8 m8"></div>
    <form method="POST"class="col s12 l2 m2 center"><button class="waves-effect waves-light btn"  style="margin-top:5px;" name="xlogout" type="submit" >Logout</button></form>
  </a>
  </div>
  <div class="row container">
	<br><br>
    <div class="col s12 m2 l2"></div>
	
  <div class="col s12 m4 l4 hoverable">
   <div class="card">
        <div class="card-image">
          <img src="images/room.jpg"style="height:250px;">
          <!-- <span class="card-title" style="color:black;">Book Room</span> -->
          <a href="bookingroomfaculty.php"class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p style="background:#607d8b;font-size:125%;padding:2%;">BOOK ROOM</p>
        </div>
    </div>
  </div>
  <div class="panel col s12 m4 l4 hoverable">
    <div class="card">
        <div class="card-image">
          <img src="images/cancel.jpg"style="height:250px;">
          <!-- <span class="card-title" style="color:black;">Book Room</span> -->
          <a href="facultybookedroom.php"class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content"style="">
          <p style="background:#607d8b;font-size:125%;padding:2%;">BOOKING HISTORY</p>
        </div>
    </div>
  </div>
  <div class="col s12 m2 l2"></div>
  
  

  </div>  

  <footer class="page-footer" style="background:#607d8b;bottom:0%;position:fixed;width:100% !important;">
          
    <div class="footer-copyright">
      <div class="container">
      © 2017 Copyright Text <a href="#webdteam" style="color:black">developed and designed by</a>
      
      </div>
    </div>
  
  </footer>


            


</div>
<!----modal---->
      <div id="webdteam" class="modal">
        <div class="modal-content">
          <h4 class="center" style="color:#000000;">Web App Developing Team </h4>
          <div class="row">
            <div class="col s12 m12 l6">
              <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s7">
                  <img src="images/akash.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s5">
                  <span class="black-text">
                    <p style="color:#000000;font-size:20px;">Akash Gupta</p>

                    </span>
                  </div>
                </div>
              </div>
            </div>
            
      
       
            <div class="col s12 m12 l6">
              <div class="card-panel grey lighten-5 z-depth-1">
              <div class="row valign-wrapper">
                <div class="col s7">
                  <img src="images/amitansh.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                </div>
                <div class="col s5">
                  <span class="black-text">
                    <p style="color:#000000;font-size:20px;">Amitansh Gangwar</p>

                    </span>
                  </div>
                </div>
              </div>

            </div>  

          </div>
          <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
      </div>
        </div>
        
      </div>
      <!-- modal finishes here-->
</body>
</html>