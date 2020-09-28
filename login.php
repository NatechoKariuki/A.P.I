<?php 
	
	require_once('dbconnect.php');

	if(isset($_POST['login_submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


		$sql = "select * from user where email='$email' and password='$password'";

		$user_login = GetData($sql);

		if(count($user_login)>0){
			$role_id = $user_login[0]['role_id'];

			//Switch Case
			switch ($role_id) {
				case 2: //Student
					header("Location:student.php");
					break;
				case 3:	//Lecturer
					header("Location:lecturer.php");
					break;
				default:
					
					break;
			}

		}else{
			echo "Invalid Username or Password";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>

	<h3>Login Form</h3>
	<form action="login.php" method="post">
		
		<label>Username</label>
		<input type="email" name="email" required="true">
		<br/>
		<br/>
		<label>Password</label>
		<input type="Password" name="password" required="true">

		<br/>
		<br/>
		<input type="submit" name="login_submit" value="Login">
		<input type="reset"  value="Clear">


	</form>
</body>
</html>