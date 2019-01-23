<?php 
session_start();
if (isset($_SESSION['username'])) {
  $connect = mysqli_connect("localhost","root","","social-media");
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
  if ($is_admin == 0) {
    header("location:profileenduser.php");
  }else{
    echo "<h1>Hello , $fullname </h1>";
  }

  $queryusers   = "SELECT * FROM users";
  $resultusers  = mysqli_query($connect,$queryusers);
  for ($i = 0 ; $i<mysqli_num_rows($resultusers); $i++){
    $datausers[]=mysqli_fetch_assoc($resultusers);
  } 

  echo "<table>";
      echo '<tr>'.'<th>'.'user_id'.'</th>'.'<th>'.'fullname'.'</th>'.'<th>'.'username'.'</th>'.'<th>'.'is_admin'.'</th>'.'</tr>';
  foreach ($datausers as $valueusers) {
    echo '<tr>'.'<td>'.$valueusers['iduser'].'</td>'.'<td>'.$valueusers['fullname'].'</td>'.'<td>'.$valueusers['username'].'</td>'.'<td>'.$valueusers['is_admin'].'</tr>';
  }
  echo "</table>";
  echo "<br>";

}else{
  header("location: links/logout.php");
}
 ?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <style type="text/css">
 	a {
 		font-size: 26px;
 		font-weight: bolder;
 	}
 	td ,th { 
    padding: 4px;
    border: 1px solid black;
	}
 	table { 
    border-spacing: 0px !important;
    border-collapse: separate !important;
    margin-bottom: 5px !important;
	}
 </style>
 <body class="container">
  <h1>Admin Profile will be here</h1><br>
   <a href="links/posts.php">Post Something</a><br>
 <a href="links/comments.php">View Posts</a><br><br>
  <a href="links/manageusers.php">Manage Users</a><br>
  <a href="links/manageusers.php">Manage Posts</a><br><br> 

  <a href="links/logout.php">Logout</a>  

 </body>

