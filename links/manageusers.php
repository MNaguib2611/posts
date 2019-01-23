<?php 
session_start();
if (isset($_SESSION['username'])) {
	$connect = mysqli_connect("localhost","root","","social-media");
	$fullname = $_SESSION['fullname'];
	$is_admin =$_SESSION['is_admin'];
	if ($is_admin == 0) {
		echo "<h1>YOU DON'T HAVE AUTHORIZATION TO VIEW THIS PAGE,REDIRECTING..........</h1> ";
		echo "<style>div{display:none;}</style>";
		header("refresh:3 ; url=../profileenduser.php");
	}else{
		echo "<h1>Hello , $fullname <h1>";
		echo "<style>*{margin-left:20px;}</style>";
	}

	if (isset($_POST['username']) && ($_POST['username'] !=="") ) {
		if (isset($_POST['fullname'],$_POST['password'],$_POST['is_admin'])) {
			echo "using adduser.......";
			$fullname1 = $_POST['fullname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$admin = $_POST['is_admin'];
			$image_profile = $username.'.jpg' ;
			$destination =  dirname(__file__).'/../images/'.$username.'.jpg' ;
			move_uploaded_file($_FILES['image']['tmp_name'],$destination);
			$queryadd = "INSERT INTO users (fullname,username,password,profile_pic,is_admin) VALUES('$fullname1','$username','$password','$image_profile','$admin')";
			$resultadd = mysqli_query($connect,$queryadd);
			if ($resultadd) {
				echo "process success";
				// header("refresh:3 ; url=manageusers.php");
			}else{
				echo "process fail";
				// header("refresh:3 ; url=manageusers.php");
			}
		}elseif (isset($_POST['fullname'])) {
			echo "using removeuser......";
			$username = $_POST['username'];
			$fullname1 = $_POST['fullname'];
			$queryremove="DELETE FROM users where username ='$username' AND fullname='$fullname1' ";
			$resultremove = mysqli_query($connect,$queryremove);
			if ($resultremove) {
				echo "process success";
				header("refresh:3 ; url=manageusers.php");
			}else{
				echo "process fail";
				header("refresh:3 ; url=manageusers.php");
			}
			header("refresh:3 ; url=manageusers.php");
		}elseif (isset($_POST['is_admin'])) {
			echo "using controlluser.........";
			$username = $_POST['username'];
			$admin = $_POST['is_admin'];
			$queryadmin="UPDATE users SET is_admin = '$admin' WHERE username ='$username'";
			$resultadmin = mysqli_query($connect,$queryadmin);
			if ($resultadmin) {
				echo "process success";
				header("refresh:3 ; url=manageusers.php");
			}else{
				echo "process fail";
				header("refresh:3 ; url=manageusers.php");
			}
		}
		
	}

}else{
	header("location: logout.php");
}




 ?>
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
 <style type="text/css">
 	 .divinside{
 	 	margin-bottom: 20px;
 	 	box-shadow: 0px 0px 10px black;

 	 }
 </style>
 <div class="container">
 	<div class=" divinside col-lg-6 col-lg-offset-3">
 		<h2>Add user</h2>
 		<form method="post" enctype="multipart/form-data">
 			<table class="table">
 				<tr><th>fullname</th><td><input type="text" name="fullname"></td></tr>
 				<tr><th>username</th><td><input type="text" name="username"></td></tr>
 				<tr><th>password</th><td><input type="text" name="password"></td></tr>
 				<tr><th>profile pic</th><td><input type="file" name="image"></td></tr>
 				<tr><th>is_admin</th><td><input id="num1" type="number" name="is_admin" placeholder="0:enduser / 1:admin"></td></tr>
 				<tr><th>&nbsp;</th><td><input id="button1" type="submit" class="btn-success" value="Add User"></td></tr>
 			</table>
 		</form>
 	</div>
 	<div class="  divinside col-lg-5 ">
 		<h2>Remove User</h2>
 		<form method="post">
 			<table>
 				<tr><th>username</th><td><input type="text" name="username"></td></tr>
 				<tr><th>fullname</th><td><input type="text" name="fullname"></td></tr>
 				<tr><th>&nbsp;</th><td><input type="submit" class="btn-danger" value="Remove User"></td></tr>
 			</table>
 		</form>
 	</div>
 	<div class="  divinside col-lg-5 col-lg-offset-1">
 		<h2>Control User</h2>
 		<form method="post">
 			<table>
 				<tr><th>username</th><td><input type="text" name="username"></td></tr>
 				<tr><th>is_admin</th><td><input id="num2" type="number" name="is_admin" placeholder="0:enduser / 1:admin"></td></tr>
 				<tr><th>&nbsp;</th><td><input id="button2" type="submit" class=" btn-info" value="Control User"></td></tr>
 			</table>
 		</form>
 	</div>
 	
 </div>

<div>
 <a href="logout.php"">Logout</a>&nbsp; &nbsp; &nbsp;<a href="../profileadmin.php">profile</a>
</div>
<script type="text/javascript">

	$("#button1").click(function(e) {
      y = parseInt($("#num1").val());
      if (y > 1 || y < 0) {
         e.preventDefault();
         $('#num1').css("border","2px solid red"); 
      }
    });
    $("#button2").click(function(e) {
      y = parseInt($("#num2").val());
      if (y > 1 || y < 0) {
         e.preventDefault();
         $('#num2').css("border","2px solid red"); 
      }
    });
</script>




















