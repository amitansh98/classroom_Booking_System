<?php
	//include('connection.php');
	include('database.php');
	include('system.php');
	session_start();
	if(!$_SESSION['userid']){
		header('Location:login.php');
		//echo"<script>alert('".$_SESSION['name']."')</script>";

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

  
  </style>
  <script>
    	var roomtobebookedfor,shifttobebookedfor,datetobebookedon;
   		$(document).ready(function() {
	    $('select').material_select();
	    $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year
	    format: 'yyyy-mm-dd',
	  	});

   		 // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    	$('.modal').modal();

    	if($('#roomarea').height()<1)
 	    	$('#roomarea').append("<div id='emojibody'class='row center'><img id='theImg'  src='images/emoji.png' /><br><p style='font-weight:light;font-size:20px;'> Kindly enter the requirements, so that we can show you rooms. </p></div>");
 	    
 	  	

  	});

   function Book (argument1,argument2,argument3) {

    roomtobebookedfor=argument1;
    shifttobebookedfor="usershift"+argument2;
    datetobebookedon=argument3;

    var para=document.createElement('p');
	para.innerHTML='Do you want to confirm the booking of '+argument1;

    document.getElementById('modal-content_id').innerHTML='';
   	
   	document.getElementById('modal-content_id').appendChild(para);
   	
   }
   
   

  </script>
</head>
<body>
	<div class="row " style="background:#607d8b;height:auto;">
        <p class="center col l12 s12 m12" style="padding:0%;color:white;font-size:220%;font-family:Rockwell;">Classroom Booking System</p>
    	<a class="waves-effect waves-light btn" href="facultyhome.php" style="float:right;margin-right:5px;margin-bottom:5px;">Home</a>
    </div>
	<div class="row">

		<div class="col s12 m3 l3" style="background:none;">
			<div class="row">
				<form class="col s12" method="POST">
			      <div sclass="row">
			        <div class="input-field col s12">
			          <input required="required" id="capacity" type="tel" name="xcapacity" class="validate">
			          <label for="capacity" data-error="wrong" data-success="right" name="xcapacity">Capacity</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s12">
			          <input id="date"type="date" class="datepicker" name="xdate" required="required">
        			<label for="date" >Date</label>	
			        </div>
			      </div>
			      <div class="row">
			      	 <div class="input-field col s12">
					    <select name="xshift" required="required">
					      <option value="" disabled selected>Specify Shift</option>
					      <option value="1">8:00 AM - 9:00 AM </option>
					      <option value="2">9:00 AM - 10:00 AM</option>
					      <option value="3">10:00 AM - 11:00 AM</option>
					      <option value="4">11:00 AM - 12:00 AM</option>
					       <option value="break" disabled>BREAK</option>
					      <option value="5">01:00 AM - 02:00 AM</option>
					      <option value="6">02:00 AM - 03:00 AM</option>
					      <option value="7">03:00 AM - 04:00 AM</option>
					      <option value="8">04:00 AM - 05:00 AM</option>
					    </select>
					    <label>Shift Specification Required</label>
					  </div>
			      </div>
			      <div class="row">
			      	<div class="col s9 m9 l9">
			      		<p class="left">Projector Required</p>
			      	</div>
			      	<div class="col s3 m3 l3">
			      	 
					    <p class="right">
					    	<input type="radio" value="1" id="projector" name="xprojector" required="required" />
      						<label for="projector">Yes</label> 
      						<input type="radio" value="0" id="projector1" name="xprojector" required="required" />
      						<label for="projector1" >No</label>  
					    </p>
					  
					</div>

			      </div>
			      <div class="row">
			      	 <div class="center col s12 m12 l12">

			      	 	<button type="submit " class="waves-effect waves-light btn" name="xapply">Apply Filter</button>

			      	 </div> 
			      </div>
			    </form>

			</div>	


		</div>
		<div class="col s12 m9 l9  lime lighten-5 " id="roomarea" style="padding:5%;">
		</div>
		<?php
			$s=new system;
			if(isset($_POST['xapply'])){
		
			$capacity=$_POST['xcapacity'];
			$date=$_POST['xdate'];
			$shift=$_POST['xshift'];
			$Projector=$_POST['xprojector'];
			
			
			$result=$s->checkValidityFaculty($capacity,
			$date,
			$shift,
			$Projector);

		
			if ( $result==true) {

					$db=new database();	
								
					$qry="select * from  room WHERE projector =".$Projector." and capacity>=".$capacity.";";
				
					$fire=$db->fireQuery($qry);
					

					while($row=mysqli_fetch_row($fire)){
						
						$qry2='select * from booking where roomnumber="'.$row[0].'" and date="'.$date.'" and usershift'.$shift.'="NA";';
						
						$fire2=$db->fireQuery($qry2);
						
						if(mysqli_affected_rows($db->connect)>0){
							
							echo("<script>  
							var cards = document.createElement('div');
			             	cards.className = 'card col s12 m12 l3 hoverable center';
			             	cards.style.padding='5%';

			            	var cardcontents=document.createElement('div');
			            	cardcontents.className='card-content';

			            	var span1=document.createElement('span');
			            	span1.className='card-title activator grey-text text-darken-4 center';
			            	span1.style.padding='15% 0% 15% 0%';
			            	span1.innerHTML=".$row[0].";


			            	cardcontents.appendChild(span1);
			            	cards.appendChild(cardcontents);

			            	var btn=document.createElement('a');
			            	btn.className='waves-effect waves-light btn';
			            	btn.innerHTML='Book';
			            	cards.appendChild(btn);
			   				
							document.getElementById('roomarea').appendChild(cards);
							btn.addEventListener('click', function(){
								
								Book('".$row[0]."','".$shift."','".$date."');
							}, false);
							btn.setAttribute('href','#modal1');

							</script>
							");

						}
						else{
							
							$qry3='select * from booking where roomnumber= "'.$row[0].'" and date="'.$date.'";';
							//echo"<script>alert('$qry3')</script>";
							$fire3=$db->fireQuery($qry3);
							if(mysqli_affected_rows($db->connect)==0){
								
								echo("<script>  
							var cards = document.createElement('div');
			             	cards.className = 'card col s12 m12 l3 hoverable center';
			             	cards.style.padding='5%';

			            	var cardcontents=document.createElement('div');
			            	cardcontents.className='card-content';

			            	var span1=document.createElement('span');
			            	span1.className='card-title activator grey-text text-darken-4 center';
			            	span1.style.padding='15% 0% 15% 0%';
			            	span1.innerHTML=".$row[0].";


			            	cardcontents.appendChild(span1);
			            	cards.appendChild(cardcontents);

			            	var btn=document.createElement('a');
			            	btn.className='waves-effect waves-light btn';
			            	btn.innerHTML='Book';
			            	cards.appendChild(btn);
			   				
							document.getElementById('roomarea').appendChild(cards);
							btn.addEventListener('click', function(){
								
								Book('".$row[0]."','".$shift."','".$date."');
							}, false);
							btn.setAttribute('href','#modal1');

							</script>");
							}
							else{

							}
						}
  					}
  				}
			}	

		?>



	</div>
	<div id="modal1" class="modal">
    <div class="modal-content" id="modal-content_id">
      <!-- <h4>Classroom Booking System</h4> -->
      <!-- <p>Do you want to confirm the booking</p> -->
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" onclick="booknow()">yes</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
    </div>
  </div>
  <div class="row" id="txtHint"></div>
  <script>


  	function booknow(){

  		//alert(roomtobebookedfor+" "+shifttobebookedfor+" "+datetobebookedon);

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
            	alert(this.responseText);
            	document.location.href="facultyhome.php";

            }
        };
        xmlhttp.open("GET","bookroom.php?room="+roomtobebookedfor+"&usershift="+shifttobebookedfor+"&date="+datetobebookedon,true);
        xmlhttp.send();	

//+",usershift="+shifttobebookedfor+",date="+datetobebookedon

   }

  </script>
  
</body>  
</html>