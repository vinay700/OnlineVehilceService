<?php

$username="root";
$password="123456";
$database="vkv_db";
$finame=$_POST["finame"];
$lname=$_POST["lname"];
$dob=$_POST["dob"];
$gen=$_POST["gen"];
$uname=$_POST["uname"];
$pass=$_POST["pass"];
$phone=$_POST["phone"];
$addr=$_POST["addr"];
$mailid=$_POST["mailid"];
$city=$_POST["city"];
$state=$_POST["state"];
$pin=$_POST["pin"];
$con=mysql_connect("localhost",$username,$password);
mysql_select_db("vkv_db",$con);
$query="INSERT INTO user_register_tb VALUES('$finame','$lname','$dob','$gen','$uname','$pass','$phone','$addr','$mailid','$city','$state','$pin')";
$res=mysql_query($query) or die(mysql_error());
if($res)
{
		header("location:success.html");
}

else {echo "not inserted"; }
mysql_close();
?>

