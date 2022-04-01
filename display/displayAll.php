 <?php
 require_once "conn.php";
 require_once "convertJSON.php";

//checks if you are comming from a GET Method (var_dump $_SERVER to see which properties could be accessed!)
 if($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM destinations";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_close($conn);

    if (count($row) == 0) {
        response(200, "No Data found", $row);
    } else {
        response(200, "Data Found", $row);
    }

 } else {
     response(400, "Invalid Request", null);
 }
 
 ?>