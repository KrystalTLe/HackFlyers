<?php
	$location = $_POST['location'];
	$originalDate =$_POST['text'];
	$rating = $_POST['rating'];
	$description = $_POST['memo'];
	$servername = "localhost";
	$username = "lewishthon10";
	$password = "hack121";
	$db='hackdb10';
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$newDate = date("Y-d-m", strtotime($originalDate));
	
	$query= "INSERT INTO `destinations` (`id`, `location`, `date`, `description`, `rating`) VALUES (NULL, '$location', '$newDate','$description',$rating);";
	//Attempt to insert data into data base. Output error if any
	//If Success
	if (mysqli_query($conn, $query)) {
	    echo "Location Added";
	    echo "<a href='mainpage.html'><button>Back to home page</button></a>";
	} else {
	    echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	mysqli_close();


?>
