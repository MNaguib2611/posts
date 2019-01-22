<?php 
session_start();
$username1=$_SESSION['username'];
$connect = mysqli_connect("localhost","root","","social-media");
$query   = "SELECT * FROM users where username='$username1' ";
$result = mysqli_query($connect,$query);
$data[]=mysqli_fetch_assoc($result);
$_SESSION['fullname'] = $data[0]['fullname'];
$_SESSION['iduser'] =  $data[0]['iduser'];
$_SESSION['is_admin'] =  $data[0]['is_admin'];
$fullname = $_SESSION['fullname'];
$is_admin =$_SESSION['is_admin'];
$iduser = $_SESSION['iduser'];
if ($is_admin == 1) {
	header("location:profileadmin.php");
}else{
	echo "<h1>Hello , $fullname <h1>";
}


?>








 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <style type="text/css">
 	a {
 		font-size: 26px;
 		font-weight: bold;
 	}
 </style>
 <body class="container">
 <h1>Userrs Profile will be here</h1><br>
 <a href="links/posts.php">Post Something</a><br>
 <a href="links/comments.php">View Posts</a><br><br>
 <a href="links/logout.php">Logout</a>
 </body>