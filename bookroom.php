<?php

	include('student.php');
	
	
	if($_SESSION["type"]=="faculty"){
		$roomtobebookedfor=$_REQUEST["room"];
		$shifttobebookedfor=$_REQUEST["usershift"];
		$datetobebookedon_format=$_REQUEST["date"];
		$datetobebookedon= date("Y-m-d", strtotime($datetobebookedon_format));
		
		
		$facultybookingroom=new faculty;
		//echo"<script>alert('ndhhc')</script>";
		$facultybookingroom->bookRoom($roomtobebookedfor,$shifttobebookedfor,$datetobebookedon);

	}
	else{
		$roomtobebookedfor=$_REQUEST["room"];
		$reasontobebookedfor=$_REQUEST["reason"];
		$datetobebookedon_format=$_REQUEST["date"];
		$datetobebookedon= date("Y-m-d", strtotime($datetobebookedon_format));

		$studentsendbookingrequest=new student;
		$studentsendbookingrequest->sendBookingRequest($roomtobebookedfor,$reasontobebookedfor,$datetobebookedon);	
		
		}
	
	
 ?>