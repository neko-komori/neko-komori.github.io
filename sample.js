function load(){
document.getElementById("demo").style.color = "red";
var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function (){
document.getElementById("demo").innerHTML = this.readyState+" masih ambil data "+this.status;
}
ajax.open("GET", "http://scr-cdn.000webhostapp.com/encodedecodejsjson.php", true);
ajax.send();
}
