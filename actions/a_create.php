<?php
require_once 'db_connect.php';// we need from db
require_once 'file_upload.php';// we need upload

// Fatal error: Uncaught mysqli_sql_exception: Column count doesn't match value count at row 1 in /Applications/XAMPP/xamppfiles/htdocs/BE15_CR10_Vladimir/actions/a_create.php:26 Stack trace: #0 /Applications/XAMPP/xamppfiles/htdocs/BE15_CR10_Vladimir/actions/a_create.php(26): mysqli_query(Object(mysqli), 'INSERT INTO pro...') #1 {main} thrown in /Applications/XAMPP/xamppfiles/htdocs/BE15_CR10_Vladimir/actions/a_create.php on line 26


if ($_POST) {  // we need check if there is any post method  if yes then 

    $name = $_POST['name']; 
    $price = $_POST['price'];
    $description= $_POST['description'];
    $latitude = $_POST ['latitude'];
    $longitude = $_POST ['longitude'];

    $uploadError = '';
    
    //this function exists in the service file upload. it accept there a paramter
    $picture = file_upload($_FILES['picture']);  
   
    $sql = "INSERT INTO destinations (name,price,description,latitude,longitude,picture) 
    VALUES ('$name',$price,'$description',$latitude,$longitude, '$picture->fileName')";
// picture-> file name odkazuje na file_upload
    if (mysqli_query($connect, $sql) === true) {// to check if there is everythin inserted correct
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $description </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else { // this is second possibilyi if there is no $Post
    header("location: ../error.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
        <h3></h3>
        <h3>TEST </h3>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>