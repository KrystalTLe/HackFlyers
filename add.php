
<?php
	$location = $_POST['location'];
	$originalDate =$_POST['text'];
	$rating = $_POST['rating'];
	$description = $_POST['memo'];
	$servername = "localhost";
	$username = "";
	$password = "";
	$db='';
	$email=$_POST['email'];
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$newDate = date("Y-m-d", strtotime($originalDate));
	
	$query= "INSERT INTO `destinations` (`id`, `location`, `date`, 
`description`, `rating`,`email`) VALUES (NULL, '$location', 
'$newDate','$description',$rating,'$email');";
	//Attempt to insert data into data base. Output error if any
	//If Success
	if (mysqli_query($conn, $query)) {
		echo "<br/>";
		echo "<div style='font-size: 200%; text-align: center; color:#495C70'>";
	    echo "<p>Location Added Succesfully</p>";
	    echo "</div>";
	} else {
	    echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	mysqli_close();


?>
<form method="POST" action="mainpage.php">
	<input type="hidden" name="email" id="email"/>
	<input style="width: 200px;height: 80px;font-size: 80%;color: white;background-color: #495C70;margin: 0 45%;" type="Submit" value="BACK TO MAP"/>
</form>
<script>
	
document.getElementById("email").value=sessionStorage.getItem('email');
</script>
