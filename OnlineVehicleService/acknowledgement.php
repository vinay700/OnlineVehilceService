<?php
if(session_id()=='')
{
	session_start();

}
if(session_id()=='')
{
	session_start();

}
if(isset($_SESSION['reference']))
{
	$getReferenceName=$_SESSION['reference'];
	$getReferenceName1=$_SESSION['reference1'];	
	$host_username="root";
	$host_password="123456";
	$database="vkv_db";
	$con=mysql_connect("localhost",$host_username,$host_password);
	mysql_select_db("vkv_db",$con);
	$result=mysql_query("select * from register_tb where uname='$getReferenceName' order by date desc") or die(mysql_error());
	$result2=mysql_query("select finame,lname from user_register_tb where uname='$getReferenceName'") or die(mysql_error());
        $result3=mysql_query("select * from vehicle where vehicle_name='$getReferenceName1'") or die(mysql_error());       

?>
<!doctype html>
<html>
<head>
</head>
<body bgcolor= lightblue>


<b><u><center><h1>Acknowledgement Letter</h1></center></u></b>
	<?php		
			$exit_counter=0;
			while($row=mysql_fetch_array($result))
			{
				$exit_counter++;
				if($exit_counter>2)
				{
					break;
				}
				else
				{
					while($row2=mysql_fetch_array($result2)){
						while($row3=mysql_fetch_array($result3))
							{
						echo "<center><h1><br>Thank you for booking  ".$row2[0]." ".$row2[1].
						"&nbsp;&nbsp;&nbsp;:&nbsp;)!!!!<br> Your  UserName is ".$row[0]." <br> Your servicing vehicle info is as follows <br> 
						
						 Vehicle to be serviced : ".$row['bikes']."</br>
						
						 Reciving Date : ".$row['date']."</br>
						 Reciving Time: ".$row['time']."</br>
						cost price: ".$row3['cost']."=00</br>
						(inclusive of all taxes)
						 <br>T and C apply*
						 </h1></center>";
 						}



					} 
			
				}
			}
		
	?><br><br><br><br><br><br><br>
	<center> Note:Payment to be done directly to the deliver boy .<br>
	Please show a printout of this acknowledgement for further reference.<br>
<b>**  EXTRA Minimum cost for door step service Rs:200 sholud be paid while giving your vehicle for service **</b> </center>
	
</body>
</html>

<?php
}
else
{
	echo "No data";
}
?>