<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinatins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    body {
        text-align: center;
        background-color: antiquewhite;
    }
</style>

<body>
    <div class="container">
        <h2>All  our travel destinations</h2>
        <button type="button" id="btn" class="btn btn-outline-primary">Load destinations</button>
        <a href="index.php"><button class="btn btn-outline-primary display 1 ml-5  ">Back to home</button></a>
        <hr>
        <div id="content" class="row">
        </div>
    </div>

    <script>
        
        document.getElementById('btn').addEventListener('click', loadApiContent);
        let content = document.getElementById('content');
        function loadApiContent() {
            let ajReq = new XMLHttpRequest();
            ajReq.open("GET", "http://localhost/BE15-CR12-Vladimir/display/displayAll.php");
            ajReq.onload = function() {
                if (ajReq.status == 200) {                  
                    const destinations = JSON.parse(ajReq.responseText).data;
                    for (destination of destinations) {
                        content.innerHTML += `       
                   <div class="card m-2" style="width: 18rem;">
            <img src="pictures//${destination.picture}" class="card-img-top boximage" alt="${destination.name}" width="90px" height="200px">
            <p>Destination:${destination.name}</p>
            <div class="card-text p-2">Price: ${destination.price} €</div>
            </div> 
                   `
                    }
                }
            };
            ajReq.send();
        }
    </script>
</body>

</html>