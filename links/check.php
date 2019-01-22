<?php 




$connect = mysqli_connect("localhost","root","","social-media");
		$username = "mg1993";
		$admin = 1 ;
$queryadmin="UPDATE users SET is_admin = '$admin' WHERE username ='$username'";
		$resultadmin = mysqli_query($connect,$queryadmin);
		if ($resultadmin) {
			echo "process success";
			// header("refresh:3 ; url=manageusers.php");
		}else{
			echo "process fail";
			// header("refresh:3 ; url=manageusers.php");
		}



 ?>