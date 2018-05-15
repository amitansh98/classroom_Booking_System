<?php

	include('database.php');
	session_start();
	
	class user{

		var $username;
		var $userid;
		var $password;
		var $type;
		public function login($userid,$password){
			$db=new database();
   			$valid=$db->validateCredentials($userid,$password);
	   		
   			if($valid){
  
   				$row=mysqli_fetch_row($valid);
   				echo $row;
                $_SESSION["name"] = $row[3];
	            $_SESSION["userid"] = $row[0];
	            $_SESSION["password"] = $row[1];
	            $_SESSION["type"] = $row[2];
	            if($_SESSION["type"]=="student"){
	              
	              header('Location:studenthome.php');
	              
	            }
	            if($_SESSION["type"]=="admin"){

	              header('Location:adminhome.php');
	              
	            }
	            
	            if($_SESSION["type"]=="faculty"){
	              
	              header('Location:facultyhome.php');
	            
	            }
	            
	          }
      
   			
   			else{
   				
   				echo"<script>alert('invalid userid or password')</script>";
   				//header('Location:login.php');
   				return;
   			
   			}

		}
		function logout (){
      		
			session_unset(); 
			session_destroy(); 
			header('Location:login.php');
	         
      	}
      	function getLoginId(){
      		 return $this->userid;
      	}

      	function getUserName(){
	  		return $this->username;
	    }
      	function setUserName($name){
      		
      		$this->username=$name;

      	}
      	function setLoginId($id){
      		$this->userid=$id;

      	}
      		

	}


?>