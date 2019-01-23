<?php 
session_start();
if (isset($_SESSION['username'])) {
	$username1=$_SESSION['username'];
	$connect = mysqli_connect("localhost","root","","social-media");
	$query   = "SELECT * FROM users where username='$username1' ";
	$result = mysqli_query($connect,$query);
	$data[]=mysqli_fetch_assoc($result);
	$_SESSION['fullname'] = $data[0]['fullname'];
	$_SESSION['iduser'] =  $data[0]['iduser'];
	$_SESSION['is_admin'] =  $data[0]['is_admin'];
	$_SESSION['profile_pic'] =  $data[0]['profile_pic'];
	$fullname = $_SESSION['fullname'];
	$is_admin =$_SESSION['is_admin'];
	$iduser = $_SESSION['iduser'];
	$picprofile = $_SESSION['profile_pic'];
  	echo "<img id='profilepic' src='images/$picprofile'>";
	if ($is_admin == 1) {
		header("location:profileadmin.php");
	}else{
		echo "<h1>Hello , $fullname <h1>";
	}
}else{
	header("location: links/logout.php");
}

?>



 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <style type="text/css">
 	a {
 		font-size: 26px;
 		font-weight: bold;
 	}
 	img {
 		height: 200px;
 		float: right;
 		border-radius: 50%;
 	}
 </style>
 <body class="container">
 <h1>Userrs Profile will be here</h1><br>
 <a href="links/posts.php">Post Something</a><br>
 <a href="links/myposts.php">My Posts</a><br>
 <a href="links/comments.php">View All Posts</a><br><br>
 <a href="links/logout.php">Logout</a>
 </body>