<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X_UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial=scale=1">
	<link href="login.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	<?php session_start();?>
	<?php
	include('connection.php');
	if(isset($_SESSION['use'])){
	header("location:index.php");
	}

	if(isset($_POST['login'])){
		$name=$_POST['username'];
		$password=$_POST['password'];
		$query="SELECT * FROM users WHERE username='$name' AND password='$password'";
		$result=mysqli_query($conn,$query);
		if(!$result){
			die("query failed");
		}
		if(mysqli_num_rows($result)>0){
		$rig=mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['use']=$name;
		header("location:index.php");
		}
		else{
		echo "<script>window.alert('invalid username or password');</script>";
		}
	}
	?>
	<div class="form">
		<img src="login_back.jpg" id="loim"><br/><br/>
		<form  action="" method="post">
		<label for="username">USERNAME</label>
		<input type="text" name="username"><br/><br/>
		<label for="password">PASSWORD</label>
		<input type="password" name="password"><br/><br/>
		<input type="submit" name="login" value="Login"><br/><br/>
		<a href="#forgetusername" id="forget">Forget Username | Password ?</a>
		<a href="signup.php" id="sign">Signup</a>
		</form>
	</div>
</body>
</html>
