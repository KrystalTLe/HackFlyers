<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Travel History</title>
	</head>
<body>

<?php
	
@$db=new mysqli('localhost','lewishthon10', 'hack121','hackdb10');

	if($db->connect_error){
		die('Connect Error' . $db->connect_errno . ': ' .$db->connect_error);
	}
	$email= $_POST['email'];

	$query = "select location,date,description,rating,email from 
destinations where email='$email' order by rating desc";

	$result=$db->query($query);
	$num_results = $result->num_rows;
	echo "<p>$num_results destinations found!</p>";
	echo "<table><tr>";
	echo "<th>Location</th>";
	echo "<th>Date</th>";
	echo "<th>Description</th>";
	echo "<th>Rating</th>";
	//echo "<th>Email</th>";
	echo "</tr>";
	
	
	for($i=0; $i<$num_results;$i++){
		echo "<tr>";
		$row=$result->fetch_assoc();
		echo "<td>".htmlspecialchars(stripslashes($row['location']))."</td>";
		echo "<td>".htmlspecialchars(stripslashes($row['date']))."</td>";
		echo "<td>".htmlspecialchars(stripslashes($row['description']))."</td>";
		echo "<td>".htmlspecialchars(stripslashes($row['rating']))."</td>";
		//echo "<td>".htmlspecialchars(stripslashes($row['email']))."</td>";
		echo"</tr>";
	}
	echo "</table>";
	
	
	$result->free();
	$db->close();

?>
<form action="mainpage.php" method="POST">
	<input type="hidden" name="email" id="email"/>
	<input type="Submit" value="Return to Home Page"/>
</form>
<script>	
document.getElementById('email').value=sessionStorage.getItem('email');
</script>
</body>
</html>
