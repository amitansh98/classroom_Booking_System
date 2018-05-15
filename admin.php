<?php
	include('database.php');
	 
	session_start();

	if(isset($_POST['xaccept'])){

		$admintest=new admin;
		$admintest->givePermission($_POST['xnumber'],$_POST['xname'],$_POST['xdate']);
		
	}
	if(isset($_POST['xdecline'])){
		
		$admintest=new admin;
		$admintest->cancelBooking($_POST['xnumber'],$_POST['xname'],$_POST['xdate']);

	}
   	class admin {
       
       var $nameAdmin;
       var $idAdmin;
       var $passwordAdmin;
      
      
      function logout (){
      	session_unset(); 
		session_destroy(); 
		header('Location:login.php');
         
      }
      function getloginid(){
      	 return $this->idAdmin;
      }
      function givePermission($roomnumber,$name,$date){

      		$date__=date("Y-m-d", strtotime($date));
      		$db=new database();
      		$sql1="update adminrequests set bookingstatus='accept' WHERE roomnumber='".$roomnumber."' and studentname='".$name."' and date='".$date__."';";
			$result =$db->fireQuery($sql1);
			$sql2="update booking set eventbooking='".$name."' WHERE roomnumber='".$roomnumber."' and date='".$date__."';";

			$result =$db->fireQuery($sql2);
			if(mysqli_affected_rows($db->connect)<=0){
				$sql3="insert into booking (roomnumber,date,eventbooking) values('".$roomnumber."','".$date__."','".$name."');";

			$result =$db->fireQuery($sql3);
			}
      	
      }
      function cancelBooking($roomnumber,$name,$date){

      		$date__=date("Y-m-d", strtotime($date));
      		$db=new database();
      		$sql="update adminrequests set bookingstatus='decline' WHERE roomnumber='".$roomnumber."' and studentname='".$name."' and date='".$date__."';";
			$result =$db->fireQuery($sql);
      }
      function getRequests(){

      		$db=new database();
      		$sql="SELECT * FROM adminrequests WHERE bookingstatus = 'pending'";

			$result =$db->fireQuery($sql);

			echo "<table style='border:1px solid black;'>
			<tr>
			<th>Room Number</th>
			<th>student Name</th>
			<th>Reason</th>
			<th>Date</th>
			<th>Response</th>
			</tr>";
			while($row = mysqli_fetch_array($result)) {
			    echo "<form method='POST' action=''><tr>";
			    echo "<td><input type='hidden'name='xnumber' value='".$row['roomnumber']."'>" . $row['roomnumber'] . "</td>";
			    echo "<td><input type='hidden'name='xname' value='".$row['studentname']."'>" . $row['studentname'] . "</td>";
			    echo "<td><input type='hidden'name='xreason' value='".$row['reason']."'>" . $row['reason'] . "</td>";
			    echo "<td><input type='hidden'name='xdate' value='".$row['date']."'>" . $row['date'] . "</td>";
			    echo "<td><button class='btn' type='submit' name='xaccept'>Accept</button><br><br><button class='btn'type='submit' name='xdecline'>Decline</button></td>";
			    echo "</tr></form>";
			}
			echo "</table>";


      }
      function getnameAdmin(){
      		return $this->nameAdmin;
      }
      function setnameAdmin($name){
      	$this->nameAdmin=$name;

      }
      function getidAdmin(){
      		return $this->idAdmin;
      }
      function setidAdmin($id){
      	$this->idAdmin=$id;

      }

   }

?>