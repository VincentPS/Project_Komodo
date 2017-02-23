document.addEventListener('DOMContentLoaded', function() {
	var canvas = document.getElementById('main');
	var canvasCtx = canvas.getContext('2d');
	var start = document.getElementById('start');
	resize(false);

	function resize(inner) {
		if (inner) {
			canvas.width = window.innerWidth;
			canvas.height = window.innerHeight;
		}
		else {
			canvas.width = window.innerWidth/2;
			canvas.height = window.innerWidth/3;
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
		var fullscreen = document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement;
		if(!fullscreen) {
			resize(false);
		}
	})
})
