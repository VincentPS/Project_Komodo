function Player() {

	this.data = [];

	var heroData = ;
	for (i=0;i<heroData.length;i++) {
		this.data[i] = heroData[i];
	}

	

	this.walk = function(direction)
	{
		switch (direction) {
			case 'up':
				Player_up = "images/player/look_up.png";
				ctx.drawImage(Player_up,30,30);
			break;
			case 'down':
			break;
			case 'left':
			break;
			case 'right':
			break;
		}
	}
}