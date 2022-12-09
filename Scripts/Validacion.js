let UsuarioLog = document.getElementById("Usuario");
let ContraseñaLog = document.getElementById("Password");


function ValidacionLogin() {
    console.log("Enviando Formulario...");
    if (UsuarioLog.length == 0 || UsuarioLog == null || /^\s+$/.test(UsuarioLog)) {
        alert('Introduzca un nombre de usuario existente')
    }

    if (ContraseñaLog.length == 0 || ContraseñaLog == null || /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(ContraseñaLog)) {
        alert('Contraseña Incorrecta')
    }

    return false;
}

let NombresReg = document.getElementById("Nombres").value;
let ApellidosReg = document.getElementById("Apellidos").value;
let CorreoReg = document.getElementById("Correo").value;
let UsuarioReg = document.getElementById("NomUsuario").value;
let ContraseñaReg = document.getElementById("Contraseña").value;
let TelefonoReg = document.getElementById("Tel").value;

function ValidacionRegistro() {
    console.log("Enviando Formulario...");
    if (NombresReg == null || NombresReg.length == 0 || /^[a-zA-ZÀ-ÿ\s]{1,40}$/.test(NombresReg)) {
        alert("Nombre no valido...");
    }

    if (ApellidosReg == null || ApellidosReg.length == 0 || /^[a-zA-ZÀ-ÿ\s]{1,40}$/.test(ApellidosReg)) {
        alert("No se reconoce su Apellido...");
    }

    if (CorreoReg == null || CorreoReg.length == 0 || /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(CorreoReg)) {
        alert("Utilize una direccion de correo valida...");
    }

    if (UsuarioReg == null || UsuarioReg.length == 0 || /^[a-zA-Z0-9\_\-]{4,16}$/.test(UsuarioReg)) {
        alert("Nombre de usurio invalido...");
    }

    if (ContraseñaReg == null || ContraseñaReg.length == 0 || /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(ContraseñaReg)) {
        alert("La contraseña debe contener de 8 a 16 caracteres...");
    }

    if (TelefonoReg == null || TelefonoReg.length == 0 || /^[55,33,81|0-9]{2}[0-9]{8}$/.test(TelefonoReg)) {
        alert("Introduzca un numero de telefono valido...");
    }

    return false
}

var ran
ran = Math.round(Math.random() * 50000)
document.write("Usted es el visitante " + ran + " de esta página.")

window.setInterval(BlinkIt, 400);
var color = "red";

function BlinkIt() {
    var blink = document.getElementById("blink");
    color = (color == "#ffffff") ? "red" : "#ffffff";
    blink.style.color = color;
    blink.style.fontSize = '36px';
}



var timerID = null;

var timerRunning = false;

function stopclock() {

    if (timerRunning)

        clearTimeout(timerID);

    timerRunning = false;

}

function startclock() {

    // Make sure the clock is stopped

    stopclock();
    showtime();

}



function showtime() {

    var now = new Date();

    var hours = now.getHours();

    var minutes = now.getMinutes();

    var seconds = now.getSeconds()

    var timeValue = "" + ((hours > 12) ? hours - 12 : hours)

    timeValue += ((minutes < 10) ? ":0" : ":") + minutes

    timeValue += ((seconds < 10) ? ":0" : ":") + seconds

    timeValue += (hours >= 12) ? " P.M." : " A.M."

    document.clock.face.value = timeValue;

    timerID = setTimeout("showtime()", 1000);

    timerRunning = true;

}