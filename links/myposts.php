<?php 
session_start(); 
if (isset($_SESSION['username'])) {
    $connect = mysqli_connect("localhost","root","","social-media");

    $fullname = $_SESSION['fullname'];
    $user_id  = $_SESSION['iduser'];
    echo "<h1>Hello , $fullname <h1><br>";
    $queryusers   = "SELECT * FROM users";
    $resultusers  = mysqli_query($connect,$queryusers);
    for ($i = 0 ; $i<mysqli_num_rows($resultusers); $i++){
    	$datausers[]=mysqli_fetch_assoc($resultusers);
    } 

    echo "<table>";
        echo '<tr>'.'<th>'.'fullname'.'</th>'.'<th>'.'user_id'.'</th>'.'</tr>';
    foreach ($datausers as $valueusers) {
    	echo '<tr>'.'<td>'.$valueusers['fullname'].'</td>'.'<td>'.$valueusers['iduser'].'</td>'.'</tr>';
    }
    echo "</table> <br>";
    $query   = "SELECT * FROM posts WHERE user_id ='$user_id' ";
    $result = mysqli_query($connect,$query);
    if (mysqli_num_rows($result)>0) {  //using this for comments is also possible
    	 for ($i = 0 ; $i<mysqli_num_rows($result); $i++){
    	$data[]=mysqli_fetch_assoc($result);
	    }

	    echo "<body class='container'>";
	    foreach ($data as  $value1) {
	    	echo "<div class= 'col-md-9 high' >";
	    	echo "<form method='post'>";
	    	echo "<div>";
	    	echo "<h2>".$value1["title"]."</h2>";
	    	echo "<p style='font-size:18px;'>".$value1["post"]."</p>";
	    	echo "<h6>".$value1["posted"]."</h6>";
	        echo "<h6>"."Post_id : ".$value1["idpost"]."</h6>";
	        echo "<h6>"."User_id : ".$value1["user_id"]."</h6>";
	        echo "</div>";
	        $idpost = $value1['idpost'];
	        echo "<input type='text' name='idpost' style='display:none;' value='$idpost'>";
	        $user_id = $value1['user_id'];
	        echo "<input type='text' name='user_id' style='display:none;' value='$user_id'>";
	        echo "<input type='text' name='comment'>";
	        echo "<input type='submit' value='comment'>";
	        echo "</form>";
	        echo "</div>";
	    }
	    echo "</body>";
    }else{
    	echo "<body class='container'>";
    	echo "you have no posts";
    	echo "</body>";
    }
}else{
    header("location: logout.php");
}  





 ?>


<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 <style type="text/css">
 	input{
 		font-size: 14px !important; 
 	}
 	.high{
 		height: 220px !important;
 		margin: 5px 10px 0px 0px;
 		border-top: 3px solid black;
 		overflow: auto;
 		scroll-behavior: auto;
 		box-shadow: 0px 0px 20px black;



 	}
 	#comments{
 		padding: 5px 5px;
 		font-size: 12px;
 		box-shadow: 0px 0px 20px black; 
 	}
    
    td ,th { 
    padding: 4px;
    border: 1px solid black;
	}
    table { 
    border-spacing: 0px;
    border-collapse: separate;
    margin-bottom: 5px;
	}
 </style>

 <div class="col-lg-10 col-lg-offset-1">
<a href="logout.php">Logout</a>&nbsp; &nbsp; &nbsp;<a href="../profileadmin.php">profile</a>
</div>