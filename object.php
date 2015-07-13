<?php

	$id = $_REQUEST['id'];

	$object = array(
		'principle' => '',
		'title' => '',
		'description' => '',
		'image' => '',
		'url' => '',
		'submitted_on' => ''
	);

	// Database connection credentials
	$servername = 'localhost';
	$username = 'homestead';
	$password = 'secret';

	// Create connection
	$connection = new mysqli($servername, $username, $password);

	// Check for an error
	if ($connection->connect_error) {
		echo 'Connection failed: ' . $connection->connect_error;
		exit;
	}

	// otherwise connected successfully
	echo 'Connected successfully';

	// Connect to the 'fitl' db
	$connection->select_db('fitl');

	// Query to select the rows
	$sql = 'SELECT * FROM posts WHERE id = ' . $id;

	// Execute the query
	$result = $connection->query($sql);

	//Check for and retrieve the object
	if ($result->num_rows > 0) {
		$object = $result->fetch_assoc();
		echo '<pre>';
		print_r($object);
		echo '</pre>';
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<title><?php echo $object['principle']; ?></title>
	</head>

	<body>
		<h2><?php echo $object['title']; ?></h2>
		<p>Description: <?php echo $object['description']; ?></p>
		<img src="">
		<p>URL: <?php echo $object['url']; ?></p>
	</body>

</html>