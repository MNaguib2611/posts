<?php 
session_start();
if (isset($_SESSION['username'])) {
	$fullname = $_SESSION['fullname'];
	echo "<h1>Hello , $fullname <h1>";
	$username=$_SESSION['username'];
	$iduser = $_SESSION['iduser'];
	if (isset($_SESSION['username']) && isset($_SESSION['iduser'])) {
		if (isset( $_POST['title'])) {
		$title = $_POST['title'];
	    $post = $_POST['post'];
		$connect = mysqli_connect("localhost","root","","social-media");
		$query   = "INSERT INTO posts (title,post,user_id) VALUES('$title','$post','$iduser')";
		$querypreventerror   = "SELECT * FROM posts WHERE title='$title'";
		$result = mysqli_query($connect, $query);
			if ($result) {
				echo "post added successfully";
				$resultpreventerror =mysqli_query($connect, $querypreventerror);
				$data1[]=mysqli_fetch_assoc($resultpreventerror);
				$preventerrorr =  $data1[0]['idpost'];
				$queryerrorcomment   = "INSERT INTO comments (comment,user_id,post_id) VALUES('this comment is to prevent error','$iduser','$preventerrorr')";
				$resulterrorcomment =mysqli_query($connect, $queryerrorcomment );
				if ($resulterrorcomment ) {
					echo " comment success";
				}else{
					echo "comment fail";
				}
				header("refresh:3 ; url=posts.php");
			}else{
				echo "Error ,Try again later";
			}
		}
	}
}else{
	header("location: logout.php");
}
 ?>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    
   <body>
    	<div class="bg-info" style="padding: 20px 20px;">
    		<h1>Enter your post below</h1>
    	</div><br><br>
    	<form method="post">
    		<div class="col-lg-6 col-lg-offset-3">
    			<table align="center" class="table ">	
			 		<tr><th>Title</th><td><input type="text" name="title"></td></tr>
			        <tr><th>Body</th><td><textarea cols="60" rows="8" name="post" ></textarea></td></tr>
			        <tr><th>&nbsp;</th><td><input type="submit" value=" Post  " class="btn-success "></td></tr>
			 	</table>
    		</div>
	    </form>
	    <div class="col-lg-10 col-lg-offset-1">
	    	<a href="logout.php">Logout</a>&nbsp; &nbsp; &nbsp;<a href="../profileadmin.php">profile</a>
	    </div>
	    
    </body>
 	
