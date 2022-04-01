window.addEventListener("load", showData);

function showData() {
    let url = "http://localhost/BE15-CR12-Vladimir/BE15_CR12_Vladimir/display/displayAll.php";

    const request = new XMLHttpRequest();
    request.open("GET", url);
    request.onload = function() {
        let result = JSON.parse(request.responseText).data;
        for (val of result) {
            document.getElementById("result").innerHTML += `<div class="card m-2" style="width: 18rem;">
            <img src="/BE15-CR12-Vladimir/BE15_CR12_Vladimir/pictures//${val.picture}" class="card-img-top boximage" alt="${val.name}" width="90px" height="200px">
            <div class="card-footer">Destination:${val.name}</div>
            <div class="card-text p-2">Price: ${val.price} €</div>
            </div>`
        }

    }
    request.send();
}