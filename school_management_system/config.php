<!--Enter your Host, username, password, database below.-->
<?php
$con = mysqli_connect("localhost","root","","school_mgnt");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
}
?>