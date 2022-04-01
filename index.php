<?php
require_once 'actions/db_connect.php';

$sql = "SELECT * FROM destinations";
$result = mysqli_query($connect,$sql);
$tbody = "";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tbody .= "<tr>
        <td><img class='img-thumbnail' width = 150px ; height = 50px ; src='pictures/" .$row['picture']."'</td>
            <td class=display 10  >".$row['name']."</td>
            <td class=display 10  >".$row['price']."</td>
            <td class=display 10  >".$row['description']."</td>
            <td><a href='update.php?id=" .$row['id']."'><button class='btn btn-outline-light btn-sm' type='button'>Edit </button></a>
           <a href='delete.php?id=" .$row['id']."'><button class='btn btn-outline-light btn-sm' type='button'>Delete</button></a></td>
           <td> <a  href='show_detail.php?id=" .$row['id']. $row['latitude'] .$row['longitude']."'><button class='btn btn-outline-info btn-sm' type='button'>Detail</button></a></td>
           <td> <a href='forecast.html?id=" .$row['id']."'><button class='btn btn-outline-info btn-sm' type='button'>Forecast</button></a></td>
       
        </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5' class='text-center'>Nothing here</td></tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Travel</title>
    
</head>
<style>
    .back {
  
  background-image: url("pictures/back.jpeg");
  background-size: cover;
  background-repeat: repeat;
     position: absolute;
     height: 110vh;
     width: 100vw;
     z-index: -1;
     opacity: 0.5;

}

</style>
<body>
    <div class="back"></div>
    <div class="container w-75 h-74 mt-4 mx-auto">
        <h2 class="text-center display 3 text m-3">Travelling is our passion</h2>
        <a href="create.php"><button class="btn btn-outline-primary display 1 mb-3  ">Add a new destination</button></a>
        <a href="/BE15-CR12-Vladimir/display/API/index.html"><button class="btn btn-outline-primary display 1 mb-3  ">Display all</button></a>
        <a href="show_all.php"><button class="btn btn-outline-primary display 1 mb-3  ">Show all</button></a>
        <table class=" table table-dark table-striped table-hover">
            <thead class="table-secondary table-dark  display-9 text">
                <!-- cize toto je vrch table to je to co je hore co sa nemeni co je stale -->
                <tr> 
                    <th >Destination</th>
                    <th >Name</th>
                    <th >Price</th>
                    <th >Description</th>
                    <th >Edit/Delete</th>
                    <th >Detail</th>
                    <th >Forecast</th>

                </tr>
            </thead>
            <!-- a tu vkladam svoj php table rovno pod ten horny table  -->
            <tbody>
                <?php echo $tbody ?>
            </tbody>
            
        </table>
       
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
