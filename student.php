<?php
	
	include('user.php');
	
   	class student extends user{
         
  
      function cancelBooking($roomnumber,$reason,$date){

      		$db=new database();
			$sql1="Delete from adminrequests WHERE roomnumber='".$roomnumber."' and reason='".$reason."' and date='".$date."';";
			$sql2="update booking set eventbooking ='NA' where roomnumber='".$roomnumber."' and date='".$date."'; ";
			//echo $sql2;
			$result1 = $db->fireQuery($sql1);
			$result2 = $db->fireQuery($sql2);
      		
      }
      function getBookedRooms(){

      		$db=new database();
			$curdate=new DateTime();
      		$sql="SELECT * FROM adminrequests WHERE userid='".$_SESSION['userid']."' order by date DESC;" ;
      		//echo $sql;
			$result = $db->fireQuery($sql);
			if(mysqli_affected_rows($db->connect)>0){
				echo "<table style=''>
				<tr>
				<th>Room Number</th>
				<th>Reason</th>
				<th>Date</th>
				<th style='padding:1%;'>Status</th>
				<th></th>
				</tr>";
				
				while($row = mysqli_fetch_array($result)) {
				    if($curdate<= new DateTime($row['date'])) {
				    echo "<form method='POST' action=''><tr>";
				    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
				    echo "<td><input type='hidden'name='xreason' value='".$row['reason']."'>" . $row['reason'] . "</td>";

				    	echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
				    if($row['bookingstatus']!='decline'){
				    	echo "<td><input type='hidden'name='xbookingstatus' value='".$row['bookingstatus']."'>" . $row['bookingstatus'] . "</td>";
				    	 echo "<td style='padding:5%;'><button class='btn' type='submit' name='xcancel'>cancel</button></td>";
				    	}
				    else{
				    	echo "<td class='center'style='background:red;color:white;'><input type='hidden' name='xbookingstatus' value='".$row['bookingstatus']."'\>" . $row['bookingstatus'] . "</td>";
				    	echo"<td></td>";
				    }
				}
				else{

				}
				   
				    echo "</tr></form>";
				}
				echo "</table>";
			}
			else{
				echo"<table style='border:1px solid black;'class='center'>
				<tr class='center'>
				<td class='center'> you have no room booked till now.</td>
				</tr>
				</table>";
				
			}


      }
      function sendBookingRequest($roomtobebookedfor,$reasontobebookedfor,$datetobebookedon){

      		$db=new database();
      		$qry="insert into adminrequests (roomnumber,studentname,reason,date,userid) values('".$roomtobebookedfor."','".$_SESSION["name"]."','".$reasontobebookedfor."','".$datetobebookedon."','".$_SESSION['userid']."');";
      		//echo $qry;
			$r=$db->fireQuery($qry);
			if(!$r){
				echo "Process Failure.";
			}
			else{
				echo "Successfully ! Room Booking Request has been sent to the admin .";
			}
			return;



      }
      
  
   }
   if(isset($_POST['xcancel'])){

		$studentcancel=new student;
		$studentcancel->cancelBooking($_POST['xnumber'],$_POST['xreason'],$_POST['xdate']);
		
	}


	class faculty extends user{
         
  
	      function cancelBooking($roomnumber,$shift,$date){

      		$db=new database();
			$sql="update booking set ".$shift."='NA' where roomnumber='".$roomnumber."' and date='".$date."' ; ";
			echo"<script>alert('$sql')</script>";
			$result = $db->fireQuery($sql);
			
      }

      function getBookedRooms(){

      		$db=new database();	
      		$curdate=new DateTime();	
      		$sql="SELECT * FROM booking WHERE usershift1='".$_SESSION['userid']."' OR usershift2='".$_SESSION['userid']."' OR usershift3='".$_SESSION['userid']."' OR usershift4='".$_SESSION['userid']."' OR usershift5='".$_SESSION['userid']."' OR usershift6='".$_SESSION['userid']."' OR usershift7='".$_SESSION['userid']."' Or usershift8='".$_SESSION['userid']."';" ;
			$result = $db->fireQuery($sql);
			if(mysqli_affected_rows($db->connect)>0){
				echo "<table style=''>
				<tr>
				<th>Room Number</th>
				<th>shift/Time</th>
				<th>Date</th>
				
				<th></th>
				</tr>";
				
				while($row = mysqli_fetch_array($result)) {
				    
				    if($row['usershift1']==$_SESSION['userid'] and $curdate<=new DateTime($row['date'])){
					    

					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift1'>1 / 8:00AM-9:00AM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift2']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift2'>2 / 9:00AM-10:00AM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift3']==$_SESSION['userid'] and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift3'>3 / 10:00AM-11:00AM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift4']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift4'>4 / 11:00AM-12:00AM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift5']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift5'>5 / 01:00PM-02:00PM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift6']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift6'>6 / 02:00PM-03:00PM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift7']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift7'>7 / 03:00PM-04:00PM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}
					if($row['usershift8']==$_SESSION['userid']and $curdate<=new DateTime($row['date'])){
					    echo "<form method='POST' action=''><tr>";
					    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
					    echo "<td><input type='hidden'name='xshift' value='usershift8'>8 / 04:00PM-05:00PM</td>";
					    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
					    
					    echo "<td style='padding:5%;'><button class='btn' type='submit' name='xfacultycancel'>cancel</button></td>";
					    
					   
					    echo "</tr></form>";
					}

				}
				echo "</table>";
			}
			else{
				echo"<table style='border:1px solid black;'class='center'>
				<tr class='center'>
				<td class='center'> you have no room booked till now.</td>
				</tr>
				</table>";
				
			}


      }
	      function bookRoom($roomtobebookedfor,$shifttobebookedfor,$datetobebookedon){

	      		$db=new database();
	      		$qry="select * from booking where roomnumber='".$roomtobebookedfor."' and date='".$datetobebookedon."';";
	      	 	$q=$db->fireQuery($qry);
				//echo"<script>alert('$qry')</script>";
				if(mysqli_affected_rows($db->connect)>0){

				 	$qry3="update booking set ".$shifttobebookedfor."='".$_SESSION["userid"]."' where roomnumber='".$roomtobebookedfor."';" ;
					$r=$db->fireQuery($qry3);
					if(!$r){
						echo "Process Failure.";
					}
					else{
						echo "Successfully ! Room has been booked.";
					}
				

	      		}
	     		else{

	     			$qry3="insert into booking (roomnumber,date,".$shifttobebookedfor.") values('".$roomtobebookedfor."','".$datetobebookedon."','".$_SESSION["userid"]."');";
					//echo $qry3;
					$r=$db->fireQuery($qry3);
					if(!$r){
						echo "Process Failure.";
					}
					else{
						echo "Successfully ! Room has been booked.";
					}

	     		}
	   	}
	}
   if(isset($_POST['xfacultycancel'])){

		$facultycancel=new faculty;
		$facultycancel->cancelBooking($_POST['xnumber'],$_POST['xshift'],$_POST['xdate']);
		
	}

?>
