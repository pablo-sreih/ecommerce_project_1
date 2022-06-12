let item_name = document.getElementById("item_name");
let item_price = document.getElementById("item_price");
let categories = document.getElementById("categories");
let image = document.getElementById("item_image");
let description = document.getElementById("description");

// categories.innerHTML = "";

axios({
    method: 'GET',
    url: "http://127.0.0.1:8000/api/get-all-categories",
})
.then(function (response){
    console.log(response.data["category"]);
    for (var i=0; i < response.data["category"].length; i++){
        var z = document.createElement('option');
        z.setAttribute("value", response.data["category"][i]["id"]);
        z.innerHTML = response.data["category"][i]["name"];
        categories.appendChild(z);
    }
})



document.getElementById("submit-btn").addEventListener("click", send);
function send(){
    let data = new FormData;
    data.append('name', item_name.value);
    data.append('price', item_price.value);
    data.append('category_id', categories.value);
    data.append('description', description.value);

    var b64 = "";
                const selectedFile = image.files[0];
                var reader = new FileReader();


                reader.onload = function () {
                    b64 = reader.result.replace("data:", "").replace(/^.+,/, "");
                    data.append('image', b64);
                    axios({
                        method: 'POST',
                        url: "http://127.0.0.1:8000/api/add-item",
                        data: data,
                    })
                    .then(function(response) {
                        console.log(response)
                    })
                    .catch(function(error){
                        console.log(error)
                    })
                }
                    
                reader.readAsDataURL(selectedFile);
}