<?php
	class system{
		public function checkValidityFaculty($var1,$var2,$var3,$var4){
			
			
			$date1 = new DateTime();
			$date2 = new DateTime($var2);
			

			if ( $date1 > $date2) {

				echo"<script>alert('Wrong Date Selection.Date Selected Is Expired.')</script>";
				return false;
			}

			if(!is_numeric ($var1)){
				echo"<script>alert('Wrong capacity input,Capacity must be numeric.')</script>";
				return false;
			
			}

		
			if($var3==1 or $var3==2 or $var3==3 or $var3==4 or $var3==5 or $var3==6 or $var3==7 or $var3==8){
				
				
			}
			else{
				echo"<script>alert('Wrong shift input.')</script>";
				return false;
			}


			return true;
		}

		public function checkValidityStudent($var1,$var2,$var3){	
			
			
			$date1 = new DateTime();
			$date2 = new DateTime($var2);
			

			if ( $date1 > $date2) {

				echo"<script>alert('Wrong Date Selection.Date Selected Is Expired.')</script>";
				return false;
			}

			if(!is_numeric ($var1)){
				echo"<script>alert('Wrong capacity input,Capacity must be numeric.')</script>";
				return false;
			
			}

	
			return true;
		}
	}
?>