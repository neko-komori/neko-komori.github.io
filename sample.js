function load(){

document.getElementById("demo").style.color = "red";

var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function (){

if(this.readyState == "4" && thi.status == "200"){

document.getElementById("demo").innerHTML = this.responseText;

}

else{

document.getElementById("demo").innerHTML = this.readyState+" masih ambil data "+this.status;

}

}

ajax.open("GET", "https://scr-cdn.000webhostapp.com/encodedecodejsjson.php", true);

ajax.send();

}
