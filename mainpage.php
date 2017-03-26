<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/mainpage.css">
    
    
  </head>
  <body>
    <?php
        $servername = "localhost";
        $username = "lewishthon10";
        $password = "hack121";
        $db='hackdb10';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            $result_array=Array();
            $query="SELECT `location` from `destinations`";
            $result=mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)){
                $result_array[]=$row['location'];
            }      
        }
        

    ?>
    <script type="text/javascript">
        var arrayObject =<?php echo json_encode($result_array); ?>;
    </script>
    

    <div id="map"></div>
    <div id="whitespace"></div>
    <div id="bottom">
        <form action="add.html" method="POST"><input type="submit" value="Add" id="add"></input></form>
        <form action="history.php" method="POST"><input type="submit" id="view_places" value="View Travel History"></input>
        <input id="email" type="hidden" name="email"></input>
    </form>
    </div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQEpOI3qtOsSAAmNlAc_Ere7rD-oV1cs&callback=initMap"
    async defer></script>
    <script type="text/javascript" src="js/mainpage.js"></script>
    <script>
    document.getElementById('email').value=sessionStorage.getItem('email');
    console.log(sessionStorage.getItem('email'));
    </script>
  </body>
</html>