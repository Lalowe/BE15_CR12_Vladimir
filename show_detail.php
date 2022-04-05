   <?php

require_once 'actions/db_connect.php';


if(isset($_GET['id'])){ 

    
  
    $sql = "SELECT * FROM destinations WHERE id = {$_GET['id']}" ;// klasicka podmienka z sql / we created
    // query a ulozili do $query a pouzijeme $_Get metodu ze ktore id sa ma zobrazit
    // $lat = mysqli_query($connect, "SELECT latitude FROM destinations WHERE id = {$_GET['id']}");
    // $latitude = mysqli_fetch_array($lat, MYSQLI_ASSOC);

    // $lon = mysqli_query($connect, "SELECT longitude FROM destinations WHERE id = {$_GET['id']}");
    // $longitude = mysqli_fetch_array($lon, MYSQLI_ASSOC);

    // $latitude = ("SELECT latitude FROM destinations WHERE id = {$_GET['id']}");
    // $longitude = ("SELECT longitude FROM destinations WHERE id = {$_GET['id']}");
    // $lat = mysql_fetch_array($latitude);
    // $lgt =mysql_fetch_array($longitude);
    // $longitude = $GET['longitude'];
//    $latitude= 'latitude'; 
//    $longitude= 'longitude' ; 

    
     $result = mysqli_query($connect, $sql );
    // $data = mysqli_fetch_assoc($result);
    // $latitude = $row ['latitude'];
    // $longitude = $row ['longitude'];



    // TO SHOW LAT AND LOG IN JS
    // $data = mysqli_fetch_assoc($result);
    //  $latitude = $data['latitude']; 
    // $longitude = $data['longitude'];

    $body = "";
    if($row = mysqli_fetch_array($result)){
         $latitude = $row ['latitude']; // namiesto  $latitude = $data['latitude'];  len prepisat data  
         // save it like variable and display in javascript
         // write a script for the Map api and echo that
         // values in the lang and lat inside the script
         $longitude = $row ['longitude']; //
        $body=
         "

        <div class='row row-cols-1 row-cols-md-2 g-4 mt-2'>
        <div class='col'>
        <div class='card-group shadow p-3 mb-5 bg-light rounded '>
        <div class='card '>
        <h2> Detail Info </h2>
        <img src='pictures/".$row['picture']."' class='card-img-top'  width= 100px ; height = 250px ; alt='...'>
          <div class='card-body'>
            <h5 class='card-title'>Name of destinations : ".$row['name']. "</h5>
            <hr>
            <p class='card-text'>Description :".$row['description']."</p>
            <hr>
            <p class='card-text'>Price : ".$row['price']."</p>
            <hr>
            <p class='card-text'>Latitude :  ".$row['latitude']."</p>
            <p class='card-text'>Longitude : ".$row['longitude']."</p>
          </div>
        </div>
        </div>
        </div>
        :
      </div>
      <div id=map> </div>" ;
    }
} 

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Detail</title>
    
</head>
<style>

#map {

height: 90%;

}

html, body {
    background-color: antiquewhite;
height: 100%;

margin: 0;

padding: 0;

}
</style>

<body>
    
    <div class="container">
    <a href="index.php"><button class="btn btn-outline-primary display 1 ml-5 mt-3  ">Back to home</button></a>
        <div class="row">
    <div><?php echo $body ?></div>
    </div>
    <div id=map> </div>
    </div>
    
    <script>

var map;

function initMap() {

var vienna = {

    lat: <?php echo $latitude?>,

    lng: <?php echo $longitude?>

};

map = new google.maps.Map(document.getElementById('map'), {

    center: vienna,

    zoom: 8

});

var pinpoint = new google.maps.Marker({

    position: vienna,

    map: map

});

}

    </script>
   </body> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
