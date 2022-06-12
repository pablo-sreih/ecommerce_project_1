let categories = document.getElementById("categories");
let items_container = document.getElementById("items_container");


// Fetching All Categories
axios({
    method: 'GET',
    url: "http://127.0.0.1:8000/api/get-all-categories",
})
.then(function (response){
    // console.log(response.data["category"]);
    for (var i=0; i < response.data["category"].length; i++){
        var z = document.createElement('option');
        z.setAttribute("value", response.data["category"][i]["id"]);
        z.id = "abc";
        z.innerHTML = response.data["category"][i]["name"];
        categories.appendChild(z);
    }
})

//Fetching All Items
axios({
    method: 'GET',
    url: "http://127.0.0.1:8000/api/items"
})
.then(function(response){
    var all_items = response.data["items"];
    console.log(all_items);
    items_container.innerHTML = "";
    for (var i=0; i < all_items.length; i++){
        var item_card = document.createElement("div");
        item_card.id = "item-container";
        item_card.innerHTML = `<div id="item">
                                    <img src="data:image/png;base64,${all_items[i]["image"]}" alt="">
                                    <button>❤</button>
                                    <label id="item-title">${all_items[i]["name"]}</label>
                                    <label id="price">${all_items[i]["price"]}$</label>
                                </div>`;
        items_container.appendChild(item_card);
    }
})



//Fetching Items by Category
let abc = document.getElementById("abc");
categories.addEventListener('change', () => {
    if (categories.value == 0){
        items_container.innerHTML = "";
        
        axios({
            method: 'GET',
            url: "http://127.0.0.1:8000/api/items"
        })
        .then(function(response){
            var all_items = response.data["items"];
            console.log(all_items);
            items_container.innerHTML = "";
            for (var i=0; i < all_items.length; i++){
                var item_card = document.createElement("div");
                item_card.id = "item-container";
                item_card.innerHTML = `<div id="item">
                                            <img src="data:image/png;base64,${all_items[i]["image"]}" alt="">
                                            <button>❤</button>
                                            <label id="item-title">${all_items[i]["name"]}</label>
                                            <label id="price">${all_items[i]["price"]}$</label>
                                        </div>`;
                items_container.appendChild(item_card);
            }
        })

    } else {

    let data = new FormData;
    data.append('category_id', categories.value)
    axios({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/getItemByCategoryId',
        data:data,
    })
    .then(function(response){
        console.log(response.data["items"]);
        var cat_items = response.data["items"];
        items_container.innerHTML = "";
        for (var i=0; i < cat_items.length; i++){
            var item_card = document.createElement("div");
            item_card.id = "item-container";
            item_card.innerHTML = `<div id="item">
                                        <img src="data:image/png;base64,${cat_items[i]["image"]}" alt="">
                                        <button>❤</button>
                                        <label id="item-title">${cat_items[i]["name"]}</label>
                                        <label id="price">${cat_items[i]["price"]}$</label>
                                    </div>`;
            items_container.appendChild(item_card);
        }
    })
    }
})


