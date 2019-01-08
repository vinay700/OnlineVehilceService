<?php

$host_username="root";
$host_password="123456";
$database="vkv_db";
		
				
				$username=$_POST["username"];
				
				$password=$_POST["password"];
				$bikes=$_POST["bikes"];
				$date=$_POST["date"];
				$time=$_POST["time"];
				$con=mysql_connect("localhost",$host_username,$host_password);
				mysql_select_db("vkv_db",$con);			
				$isUserExists=false;
				session_start();
				$r=mysql_query("select uname,pass from user_register_tb where uname='".$username."'");
				if(gettype($r)=='resource'){
					while($row=mysql_fetch_array($r)){
						if($row[0]==$username){
							if($row[1]==$password){
								$isUserExists=true;
							}
							else
							{
								$isUserExists=false;
							}
						}
						else{
							$isUserExists=false;
						}
					}
				}
				if($isUserExists){
					//echo "user exists, Inserting data.";
					$resp=mysql_query("insert into register_tb values('$username','$password','$bikes','$date','$time')") or die(mysql_error());
					if($resp)
					{
					if(session_id()==''){
						session_start();
					}
						
						$_SESSION['reference']=$username;
						//echo "Inserted :)";	
						echo "Click <a href='acknowledgement.php'>here</a> to get acknowledgement. ";
					}
					else
					{
						//echo "Error in inserting :(";	
					}
				}
				else
				{
					//echo "User notexist";
					//echo "<br>Click <a href='atombook.html'>here</a> to go back ";
				}
				








$isBikeExists=false;
				
				$result=mysql_query("select vehicle_name from vehicle where vehicle_name='".$bikes."'");
				if(gettype($result)=='resource'){
					while($row1=mysql_fetch_array($result)){
						if($row1[0]==$bikes){
								$isBikeExists=true;
							}
						
						else{
							$isBikeExists=false;
						}
					
				}
}
				if($isBikeExists){
					//echo "user exists, Inserting data.";
					
						
						$_SESSION['reference1']=$bikes;
						//echo "Inserted :)";	
						//echo "Click <a href='acknowledgement.php'>here</a> to get acknowledgement. ";
					}
					else
					{
						//echo "Error in inserting :(";	
					}
				
				mysql_close();
		
	
		
	
	
	


?>