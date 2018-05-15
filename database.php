<?php

	include('connection.php');
	
	class database{
		
		var $connect;
          var $server=SERVER;
          var $user=USER;
          var $password=PASS;
          var $db=DB;
		public function __construct(){

      		$this->connect=mysqli_connect(SERVER, USER, PASS, DB) or die("<script>alert('Problem Connecting Database.Please try after sometime.')</script>");
			if(!$this->connect){
			 	echo"<script>alert('Problem Connecting Database.Please try after sometime.')</script>";
			}	
			
     	 }
     	 public function fireQuery($query){

     	 	$r=mysqli_query($this->connect,$query);
     	 	if(!$r){
     	 		echo"<script>alert('Process Failure')</script>";
     	 	}
     	 	return $r;
     	 }

     	 public function validateCredentials($userid,$password){
     	 	
     	 	$qry="select * from users where userid= '".$userid."' and password= '".$password."';";
     	 	$result=$this->fireQuery($qry);
     	 	if(mysqli_affected_rows($this->connect)>=1){
     	 		return $result;
     	 	}
     	 	else{
     	 		return null;
     	 	}


     	 }




	}


?>