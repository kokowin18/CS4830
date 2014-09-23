<?php 
redirectToHTTPS();
session_start(); 
?>
<html>
<head>
<title>Home Page</title>

<style type="text/css">

table, td, th
{
padding: 3px 5px;
border:1px solid black;
border-collapse:collapse;
}

</style>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/signin.css" rel="stylesheet">
</head>
<body>

<div>
<table id="date">
<?php
        if($_SESSION['user'] == "")//if not logged in, shoot them to index page
        header('Location: index.php');

        $connString = "host=dbhost-pgsql.cs.missouri.edu user=kkwp4b dbname=kkwp4b password=";
        $conn = pg_connect($connString);//connects to host

        if (!$conn) {
                echo "Unable to connect to database.";
                exit;//fail to connect
        }

	pg_prepare($conn, "query", 'SELECT * FROM lab8.user_info WHERE username = $1;');

	$regdate = pg_execute($conn, "query", array($_SESSION['user']));//querys to get the info for the user

	pg_prepare($conn, "query2", 'SELECT ip_address FROM lab8.log WHERE username= $1 AND action = $2;');

	$regIp = pg_execute($conn, "query2", array($_SESSION['user'], "Registered"));//query to get the ip for when they registered

	$row = pg_fetch_assoc($regdate);//not sure if i need these steps and whether or not i can just do $regIp['ip_address'] 
	$row2 = pg_fetch_assoc($regIp);//not sure if i need this either, but it gets the ip n such

		echo "<tr><td>Username: </td><td> " . $_SESSION['user'] . "</td></tr>";
        echo "<tr><td>Registration Date:  </td><td> " . $row['registration_date'] . "</td></tr>";
        echo "<tr><td>Registration IP:  </td><td> " . $row2['ip_address'] . "</td></tr>";

//first table for reg date and ip

	echo "</table><br />Click to <a href='update.php'>Update Description</a><br ><table><br />";
//link to update desc.

	pg_prepare($conn, "query1", 'SELECT * FROM lab8.log WHERE username = $1 AND action = $2;');
	$result = pg_execute($conn, "query1", array($_SESSION['user'], "Logged In"));//gets the log results

	echo "<table><tr><td>Date</td><td>IP</td></tr>";

	while( $row = pg_fetch_assoc($result))//prints results
	{
		echo "<tr>";
		echo "<td>" . $row['log_date'] . "</td><td>" . $row['ip_address'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";


	pg_prepare($conn, "query3", 'SELECT description FROM lab8.user_info WHERE username = $1;');

	$result = pg_execute($conn, "query3", array($_SESSION['user']));

	$row = pg_fetch_assoc($result);

	if($row['description'] != '')
	{
		echo "<br /><table><tr><th>Description: </th></tr><tr><td>" . $row['description'] . "</td></tr></table><br />";
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
	Click here to <a href="logout.php">Log Out</a>

</div>
</body>
</html>

