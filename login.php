<?php

  include('user.php');
  $user=new user;

  if (isset($_POST['xsubmit'])){

    $userid=$_POST['xuserid'];  
    $password=$_POST['xpassword'];
    $user->login($userid,$password);
    
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
  .loginarea{
   
      background:none;
      color:black;
      padding:2%;

  }
</style>

<script>

</script>
</head>

<body style="background-image:url('images/background.png');background-size: cover;">

    <div class="row " style="background:none;height:auto;">
        <p class="center col l12 s12 m12" style="padding:0%;color:black;font-size:300%;font-family:Rockwell;">Classroom Booking System</p>
    </div>
    <form class="row" action="#" method="POST" style="margin-top:5%;">
      <div class="col s12 l2 m12"></div>
      <div class="col s12 l8 m12 loginarea z-depth-5 hoverable" style="">
        <div class="row">
          <div class="col s12 m12 l12">
             <p class="center"style="padding:1%;color:black;font-size:150%; font-family:Rockwell;">Login Here</p> 
          </div>  

        </div>  
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" name="xuserid" required="required">
            <label for="icon_prefix" style="font-family:Rockwell;">userid</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <i class="material-icons prefix">https</i>
            <input id="icon_telephone" type="password" required="required" name="xpassword">
            <label for="icon_telephone" style="font-family:Rockwell;">password</label>
          </div>
        </div>
        <div class="row center">
            <button class="waves-effect waves-light btn" name="xsubmit" type="submit" style="font-family:Rockwell;">login</<button>
        </div>  
      </div>
      <div class="col s12 l2 m12"></div>

    </form>
    
</body>
</html>