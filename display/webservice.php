<?php

/****************************************
*######## RESTful WEB SERVICE ##########*
*                                       *
* Client process the request VIA URL    *
* http://address.com/webservice.php?id=1*
* and gets the JSON result.             *
****************************************/
// Set Content-Type header to application/json
header("Content-Type:application/json");

// Check if the id has a value
if(!empty($_GET['id'])){
   // Get the id value in the variable
   $id=$_GET['id'];
   require_once("db_check.php");

     if(empty($name) && empty($price)){
       response(200, "not found", NULL, NULL);
   }  
   else{
       response(200, "destinations found" , $name, $price);
   }
}
else {
   response(400, "Invalid request", NULL, NULL);
}


// Function for delivering a JSON response
function response($status,$status_message,$destination_name,$data){
     
   // $response array
   $response['status']=$status;
   $response['status_message']=$status_message;
   $response['destination_name']=$destination_name;
   $response['price']=$data;

   //Generating JSON from the $response array
   $json_response=json_encode($response);

   // Outputting JSON to the client
   echo $json_response;
}

?>