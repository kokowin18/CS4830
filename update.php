<?php 
redirectToHTTPS();
session_start(); 
?>
<html>
<head>
<title>Update Description</title>
</head>
<body>

<form method='POST' action='update.php'>
	<textarea id='descriptio' name='description' rows='20' cols='60' style='margin: 2px; height: 324px; width: 501px; '>Enter Description here</textarea>
	<input type='submit' name='submit' value='Submit'>

</form>

<?php
	if($_SESSION['user'] == "")
		header('Location: index.php');//checks to see if a user is logged in, if not shoot them to index page


	if(isset($_POST['submit']))
	{
        	$connString = "host=dbhost-pgsql.cs.missouri.edu user=kkwp4b dbname=kkwp4b password=";
        	$conn = pg_connect($connString);//connects to host

        	if (!$conn) {
                	echo "Unable to connect to database.";
                	exit;//fail to connect
        	}
		else
		{
			pg_prepare($conn, "query", 'UPDATE lab8.user_info SET description = $1 WHERE username = $2;');
			pg_execute($conn, "query", array($_POST['description'], $_SESSION['user']));

			pg_prepare($conn, "query2", 'INSERT INTO lab8.log (username, ip_address, action) VALUES ($1, $2, $3);');
			pg_execute($conn, "query2", array($_SESSION['user'], $_SERVER['REMOTE_ADDR'], 'Update Description'));



			header('Location: home.php');//send them to home page
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

<a href="home.php">Return to Home</a>
</body>
</html>

