var neko = {
	posisi : "",
	melacakPosisi : function (callback){
		navigator.geolocation.getCurrentPosition(function (position){
			this.posisi = position.coords.latitude+" "+position.coords.longitude;
			callback();
		});
	}
}