<?php 

$hostname = "127.0.0.1"; // this is the hostname that you can find in the PhpMyAdmin and you can write "localhost" too
$username = "root"; // be default the userName for the databases is root
$password = ""; // by default there is no password in the databases
$dbname = "BE15_CR12_mount_everest_Vladimir"; // here we need to write the Database name
$latitude=@$row['latitude'] ?: null;
$longitude=@$row['longitude'] ?: null;
// create connection, you need to be aware of the order of the parameters
$connect = new mysqli($hostname, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
}else {

   

}
