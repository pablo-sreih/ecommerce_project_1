let category = document.getElementById("category");
let submit = document.getElementById("submit");

submit.addEventListener('click', send);
function send(){
    let data = new FormData;
    data.append('name', category.value);

    axios({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/add-category',
        data: data,
    })
    .then(function(response){
        console.log(response)
    })
}