let email = document.getElementById("email");
let password = document.getElementById("password");

document.getElementById("login-btn").addEventListener('click', send);

function send(){
    let data = new FormData;
    data.append('email', email.value);
    data.append('password', password.value);

    axios({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/login',
        data: data,
    })
    .then(function (response) {
        if(response.data["user"]["is_admin"] === 1){
            localStorage.setItem("token", response.data["authorisation"]["token"]),
            location.href = "./html/upload_item.html"
        };
        console.log(response.data);
    })
    .catch(function(error){
        alert("Incorrect Credentials!")
      });
}