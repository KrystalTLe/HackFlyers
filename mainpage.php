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
    <div id="bottom">
        <a href="add.html"><button id="add">Add</button></a>
        <a href="history.html"><button id="view_places">View Travel History</button></a>
    </div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKQEpOI3qtOsSAAmNlAc_Ere7rD-oV1cs&callback=initMap"
    async defer></script>
    <script type="text/javascript" src="js/mainpage.js"></script>

  </body>
</html>