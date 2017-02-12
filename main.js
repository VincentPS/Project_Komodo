var canvas = document.getElementById('main');
		canvasCtx = canvas.getContext('2d');

function fullscreen(){
	if (canvas.webkitRequestFullScreen) {
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
		canvas.webkitRequestFullScreen();
	}
	else {
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
		canvas.mozRequestFullScreen();
	}            
}

canvasCtx.fillstyle = "red";
canvasCtx.fill();

canvas.addEventListener("click",fullscreen);