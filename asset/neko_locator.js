function getLocation() {
	navigator.geolocation.getCurrentPosition(function (position){
		var location = position.coords.latitude+" "+position.coords.longitude;
		document.getElementById("lokasi").innerHTML = location;
	});
}

var i = setInterval(function (){
	if (document.getElementById("lokasi").innerHTML == "") {
		getLocation();
	}
	else{
		clearInterval(i);
	}
}, 500);