window.onLoad = function() {
	var canvas = document.getElementById('main');
	var canvasCtx = canvas.getContext('2d');
	var start = document.getElementById('start');

	function resize(inner, w=null, h=null) {
		if (inner) {
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;
		}
		else {
			canvas.width = w;
			canvas.height =  h;
		}
	}

	function fullscreen() {
		if (canvas.webkitRequestFullScreen) {
			resize(true);
			canvas.webkitRequestFullScreen();
		}
		else {
			resize(true);
			canvas.mozRequestFullScreen();
		}
	}

	start.addEventListener('click', fullscreen);
	window.addEventListener('resize', function(){
		var w = window.innerWidth/2>600?600:window.innerWidth/2;
		var h = window.innerWidth/3>400?400:window.innerWidth/3;
		resize(false,w,h);
	});
}