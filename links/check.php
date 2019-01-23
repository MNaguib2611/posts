<?php 




$connect = mysqli_connect("localhost","root","","social-media");
$query   = "SELECT * FROM posts where idpost='5' ";
$result = mysqli_query($connect,$query);
$data[]=mysqli_fetch_assoc($result);
$post=$data[0]["post"];
echo "<script type='text/javascript'>document.getElementById('editpost').value = $post ;</script>";
 ?>






<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 <script type="text/javascript" src="../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>

 <textarea id="editpost">
 	
 </textarea>