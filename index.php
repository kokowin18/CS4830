<?php 
redirectToHTTPS();
session_start();

	if($_SESSION['user'] != "")
		header('Location: home.php');
?>
<html>
<head>
<title>Log In</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/signin.css" rel="stylesheet">
</head>
<body>

 <div class="container">

      <form class="form-signin" method="POST" action='index.php' role="form">
        <h2 class="form-signin-heading">Log in</h2>
        <input type='text' value='' name='username' class="form-control" placeholder="Username"></input>
        <input type='password' value='' name='password' class="form-control" placeholder="Password"></input>
        <button class="btn btn-lg btn-primary" name="submit" value="submit">Sign in</button>
		<a class="btn btn-lg btn-primary" href="registration.php" role="button"> Register</a>
      </form>

    </div>


<?php
	if(isset($_POST['submit']))//when button is pressed
	{
	if(empty($_POST['password']))
	{
		echo "<br />No password entered. <br />";
		
	}
	else
	{
		

		$user = $_POST['username'];
		$pass = $_POST['password'];

		$query = "SELECT * FROM lab8.authentication;";

		$connString = "host=dbhost-pgsql.cs.missouri.edu user=kkwp4b dbname=kkwp4b password=";
        	$conn = pg_connect($connString);//connects to host

	        if (!$conn) {
        	        echo "Unable to connect to database.";
	                exit;//fail to connect
	        }

		$result = pg_query($conn, $query);//get result of all users

		while($row = pg_fetch_assoc($result))//while there still are rows
		{
			if($user == $row['username'])//if the username matches a row,
			{
				echo $user . " " . $row['username'];
				$salt = $row['salt'];//get salt
				$salt = trim($salt);
				$checkPass = sha1($salt.$pass);//concat and hash

				pg_prepare($conn, "query", 'INSERT INTO lab8.log (username, ip_address, action) VALUES ($1, $2, $3);');

				if($row['password_hash'] == $checkPass)//check if ==
				{
                                        $_SESSION['user'] = $user;

					pg_execute($conn, "query", array($_SESSION['user'], $_SERVER['REMOTE_ADDR'], 'Logged In'));//if so, log the log in in log..

					header('Location: home.php');//send them to home
				}
			}
		}
		echo "Invalid password or username.";//else something is wrong.
		
	}
	}

	function redirectToHTTPS()
	{
	if($_SERVER['HTTPS']!="on")
		{
			$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			header("Location:$redirect");
		}
	}
?>



</body>
</html>
