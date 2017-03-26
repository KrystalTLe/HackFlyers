<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Travel History</title>
	<link rel="stylesheet" type="text/css" href="css/history.css">
</head>
<body>

<?php
	
@$db=new mysqli('localhost','', '','');

	if($db->connect_error){
		die('Connect Error' . $db->connect_errno . ': ' .$db->connect_error);
	}
	$email= $_POST['email'];

	$query = "select location,date,description,rating,email from 
destinations where email='$email' order by rating desc";

	$result=$db->query($query);
	$num_results = $result->num_rows;
	for($i=0; $i<$num_results;$i++){
		// echo "<tr>";
		$row=$result->fetch_assoc();
		echo "<div class='box'>";
		echo "<h2>Destination: ".htmlspecialchars(stripslashes($row['location']))."</h2>";
		echo "<p>Date: ".htmlspecialchars(stripslashes($row['date']))."</p>";
		echo "<p>Memo: ".htmlspecialchars(stripslashes($row['description']))."</p>";
		echo "<p>Rating: ".htmlspecialchars(stripslashes($row['rating']))."</p>";
		echo "</div>";

	}	
	$result->free();
	$db->close();

?>
<form action="mainpage.php" method="POST">
	<input type="hidden" name="email" id="email"/>
	<input id ="return"  type="Submit" value="RETURN TO MAP"/>
</form>
<script>	
document.getElementById('email').value=sessionStorage.getItem('email');
</script>
</body>
</html>
