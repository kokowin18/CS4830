<?php
redirectToHTTPS();
session_start(); 
?>
<html>
<head>
<title>Registration</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/signin.css" rel="stylesheet">
</head>
<body>



<div class="container">
	<form class="form-signin" method='POST' action='registration.php'>
			<h2 class="form-signin-heading">Registration</h2>
         <input type='text' name='username' class="form-control" placeholder="Username" value=''></input>
         <input type='password' name='password' class="form-control" placeholder="password" value=''></input>
		 <input type='password' name='confirm' class="form-control" placeholder="confirm-password" value=''></input>      
		  <button class="btn btn-lg btn-primary" name="Register" value="Register">Submit</button>

        </form>
</div>


<?php
	function redirectToHTTPS()
	{
	  if($_SERVER['HTTPS']!="on")
	  {
		 $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		 header("Location:$redirect");
	  }
	}
	
	if(isset($_POST['Register']))//when register is clicked
	{
	if($_POST['password'] == $_POST['confirm'])//if the passwords match
	{

		$user = $_POST['username'];
		$pass = $_POST['password'];

		$salt = uniqid();//create uniq salt based upon time

		$hashedPass = sha1($salt.$pass);//hash the password concat'd with the salt

		$connString = "host=dbhost-pgsql.cs.missouri.edu user=kkwp4b dbname=kkwp4b password=bumPX4xf";
		$conn = pg_connect($connString);//connects to host

	
			if (!$conn) {
	                	echo "Unable to connect to database.";
	       	         	exit;//else will go here if fail
	        	}
			else
			{
				pg_prepare($conn, "query2", 'INSERT INTO lab8.user_info (username, description) VALUES ($1, $2);');
		                pg_prepare($conn, "query", 'INSERT INTO lab8.authentication (username, password_hash, salt) VALUES ($1, $2, $3);');

				pg_execute($conn, "query2", array($user, ''));//query to insert into user_info
				pg_execute($conn, "query",  array($user, $hashedPass, $salt));//query to insert into authentication


				pg_prepare($conn, "query3", 'INSERT INTO lab8.log (username, ip_address, action) VALUES ($1, $2, $3);');
				pg_execute($conn, "query3", array($_POST['username'], $_SERVER['REMOTE_ADDR'], 'Registered'));//lastly, a query to enter into log of registration
	                        $_SESSION['user'] = $user;

				pg_prepare($conn, "query4", 'INSERT INTO lab8.log (username, ip_address, action) VALUES ($1, $2, $3);');
				pg_execute($conn, "query4", array($_POST['username'], $_SERVER['REMOTE_ADDR'], 'Logged In'));//and another log to say they logged in

				header('Location: home.php');//shoots them to home
			}
		}
	else
	{
		echo"Passwords did not match.<br />";//passwords did not match
	}

	}

?>


Click to <a href="index.php">Return to Log In</a>

</body>
</html>

