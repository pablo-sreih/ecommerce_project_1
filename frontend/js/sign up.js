let name = document.getElementById("name");
let email = document.getElementById("email");
let password = document.getElementById("password");

document.getElementById("signup-btn").addEventListener('click', send);
function send(){
    let data = new FormData;
    data.append('name', name.value);
    data.append('email', email.value);
    data.append('password', password);

    axios({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/register',
        data: data,
    })
    .then(function (response){
        if (response.data["status"] === "success"){
            location.href = "./main.html"
        } else {
            alert('Credentials Already Taken');
        }
    })
}