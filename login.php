<?php
session_start();

if (isset( $_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $connect = mysqli_connect("localhost","root","","social-media");
    $query   = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
    $result = mysqli_query($connect,$query);
    if (mysqli_num_rows($result)>0){
        $_SESSION['username'] = $_POST['username'];
        $query2   = "SELECT * FROM users WHERE username='$username' AND is_admin = 1";
        $result2 = mysqli_query($connect,$query2);
        if (mysqli_num_rows($result2)>0) {
            header("refresh:1; url=profileadmin.php");
        }else{
            header("refresh:1; url=profileenduser.php");
        }
    }else{
      echo "<h1 style='color:red;'>Wrong username or password</h1>";
    }
}


?>
<head>
	<title></title>


 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 <style type="text/css">
    #sub {
    	margin:5px;
        padding: 2px 5px;
    }
    #div1{
        border: 2px solid black;
        margin-top: 50px;
        box-shadow: 0px 0px 20px black;
    }
 </style>
</head>
<body class="container">
  <div id="div1" class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
	<h3>Login</h3>
    <form method="post">
      <table class="table">
 	  <tr>
	 	<th>Username</th>
	 	<td><input  id="username" type="text" name="username"></td>	
	 	</tr>
	     <th>Password</th>
	     <td><input id="password" type="password" name="password"></td>
	 	<tr>
	 		<tr>
	 			<th>&nbsp;</th>
	 			<td><input id="sub" type="submit" name="submit" value="login" class="btn-success"></td>
	 		</tr>
	 		
	 	</tr>
	 </table>
	</form>
  </div>
</body>






