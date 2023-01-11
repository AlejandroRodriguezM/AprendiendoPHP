/*jshint -W033 */
var sesion = localStorage.getItem('UserName');
var image;

const closeSesion = () => {
    localStorage.clear();
    //window location in php/user
    window.location.href = "logOut.php";
}


const login_user = async () => {
    var acceso = document.querySelector("#nombre").value;
    var password = document.querySelector('#password').value;
    // var repassword = document.querySelector('#repassword_user').value;
    if (acceso.trim() === '') {
        Swal.fire({
            icon: "error",
            title: "ERROR.",
            text: "El nombre de usuario esta vacio",
            footer: "Tarea 5"
        })
        document.querySelector("#acceso").style.border = "1px solid red";
        document.querySelector("#correo").value = acceso;
        return;
    }

    if (password.trim() === '') {
        Swal.fire({
            icon: "error",
            title: "ERROR.",
            text: "Tienes que rellenar la password",
            footer: "Tarea 5"
        })
        document.querySelector("#password_user").style.border = "1px solid red";
        document.querySelector("#password_user").value = "";
        return;
    }

    //insert to data base in case of everything go correct.
    const data = new FormData();
    data.append('acceso', acceso);
    data.append('pass', password);

    //pass data to php file
    var respond = await fetch("php/user/login_user.php", {
        method: 'POST',
        body: data
    });

    var result = await respond.json();

    if (result.success == true) {
        Swal.fire({
            icon: "success",
            title: "GREAT",
            text: result.message,
            footer: "Tarea 5"
        })
        document.querySelector('#formIniciar').reset();
        localStorage.setItem('UserName', result.userName);

        setTimeout(() => {
            window.location.href = "inicio.php";
        }, 2000);
    } else {
        Swal.fire({
            icon: "error",
            title: "ERROR.",
            text: result.message,
            footer: "Tarea 5"
        })
        document.querySelector("#acceso").value = "";
        document.querySelector("#password_user").value = "";
        document.querySelector("#acceso").style.border = "1px solid red";
    }
}