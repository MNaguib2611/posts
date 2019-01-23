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
	if (isset($_POST['idpost']) && ($_POST['idpost'] !=="") ) {
		if (isset($_POST['title'], $_POST['user_id'] )){
			echo "using removePost......";
			$idpost = $_POST['idpost'];
			$title = $_POST['title'];
			$user_id = $_POST['user_id'];
			$queryremovepost="DELETE FROM posts where idpost ='$idpost' AND title='$title' AND user_id='$user_id' ";
			$resultremovepost = mysqli_query($connect,$queryremovepost);
			if ($resultremovepost) {
				echo "process success";
				header("refresh:3 ; url=manageposts.php");
			}else{
				echo "process fail";
				header("refresh:3 ; url=manageposts.php");
			}
		}elseif(isset($_POST['comment_id'], $_POST['user_id'] )){
			echo "using removeComment......";
			$idpost = $_POST['idpost'];
			$comment_id = $_POST['comment_id'];
			$user_id = $_POST['user_id'];
			$queryremovecomment="DELETE FROM comments where post_id ='$idpost' AND idcomment='$comment_id' AND user_id='$user_id' ";
			$resultremovecomment = mysqli_query($connect,$queryremovecomment);
			if ($resultremovecomment) {
				echo "process success";
				header("refresh:3 ; url=manageposts.php");
			}else{
				echo "process fail";
				header("refresh:3 ; url=manageposts.php");
			}

		}elseif(isset($_POST['title'], $_POST['post'] )){
			echo "using editPost......";
			$idpost = $_POST['idpost'];
			$title = $_POST['title'];
			$post = $_POST['post'];
			$queryeditpost="UPDATE posts SET post = '$post' WHERE idpost ='$idpost' AND title ='$title' ";
			$resulteditpost = mysqli_query($connect,$queryeditpost);
			if ($resulteditpost) {
				echo "process success";
				header("refresh:3 ; url=manageposts.php");
			}else{
				echo "process fail";
				header("refresh:3 ; url=manageposts.php");
			}
		}	
	}

}else{
	header("location: logout.php");
}

 ?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
 
 <style type="text/css">
 	 .divinside{
 	 	margin:30px;
 	 	box-shadow: 0px 0px 30px black;

 	 }
 </style>
 <div class="container">
 	<div class="  divinside col-lg-5 bg-danger">
 		<h2>Remove Post</h2>
 		<form method="post">
 			<table cellspacing="2" cellpadding="2">
 				<tr><th>IDpost</th><td>&nbsp;&nbsp;<input type="number" name="idpost"></td></tr>
 				<tr><th>Title</th><td>&nbsp;&nbsp;<input type="text" name="title"></td></tr>
 				<tr><th>User_id</th><td>&nbsp;&nbsp;<input type="number" name="user_id"></td></tr>
 				<tr><th>&nbsp;</th><td>&nbsp;&nbsp;<input type="submit" class="btn-danger" value="Remove Post"></td></tr>
 			</table>
 		</form>
 	</div>
 	<div class="  divinside col-lg-5 col-lg-offset-1  bg-info">
 		<h2>Remove Comment</h2>
 		<form method="post">
 			<table>
 				<tr><th>Comment_id</th><td>&nbsp;&nbsp;<input type="number" name="comment_id"></td></tr>
 				<tr><th>IDpost</th><td>&nbsp;&nbsp;<input  type="number" name="idpost" ></td></tr>
 				<tr><th>User_id</th><td>&nbsp;&nbsp;<input type="number" name="user_id"></td></tr>
 				<tr><th>&nbsp;</th><td>&nbsp;&nbsp;<input id="button2" type="submit" class=" btn-danger" value="Remove Comment"></td></tr>
 			</table>
 		</form>
 	</div>
 	<div class="  divinside col-lg-10 col-lg-offset-1 bg-success">
 		<h2>Edit Post</h2>
 		<form method="post">
 			<table cellspacing="2" cellpadding="2">
 				<tr><th>IDpost</th><td>&nbsp;&nbsp;<input type="number" name="idpost"></td></tr>
 				<tr><th>Title</th><td>&nbsp;&nbsp;<input type="text" name="title"></td></tr>
 				<tr><th>Post</th><td>&nbsp;&nbsp;<textarea cols="22" rows="4" name="post"></textarea></td></tr>
 				<tr><th>&nbsp;</th><td>&nbsp;&nbsp;<input type="submit" class="btn-Primary" value="Edit Post"></td></tr>
 			</table>
 		</form>
 	</div>
 	
 </div>



<div>
 <a href="logout.php" target="_top">Logout</a>&nbsp; &nbsp; &nbsp;<a href="../profileadmin.php">profile</a>	
</div>
