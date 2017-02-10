<?php

class Actor {
	private $img;

	private $style;

	private $team;

	public function getImg() 
	{
		ob_start();
		imagepng($this->img);
		$contents = ob_get_contents();
		ob_end_clean();

		imagedestroy($this->img);
		return "<img src='data:image/png;base64,".base64_encode($contents)."' class='".$this->getTeam()."' width='128' height='128'/>";
	}

	public function setImg()
	{
		$img = imagecreatefrompng($this->img . '.png');
		$img_size = getimagesize($this->img . '.png');
		switch($this->getTeam())
		{
			case 'player':
				$color_dark = array('r' => 0, 'g' => 0, 'b' => 255);
				$color_mid = array('r' => 0, 'g' => 75, 'b' => 255);
				$color_light = array('r' => 50, 'g' => 150, 'b' => 255);
				$this->colorize($img, $img_size, $color_dark, $color_mid, $color_light);
				break;
			case 'enemy':
				$color_dark = array('r' => 150, 'g' => 0, 'b' => 0);
				$color_mid = array('r' => 190, 'g' => 0, 'b' => 0);
				$color_light = array('r' => 255, 'g' => 0, 'b' => 0);
				$this->colorize($img, $img_size, $color_dark, $color_mid, $color_light);
				break;
			case 'neutral':
				$color_dark = array('r' => 0, 'g' => 120, 'b' => 0);
				$color_mid = array('r' => 0, 'g' => 190, 'b' => 75);
				$color_light = array('r' => 50, 'g' => 255, 'b' => 150);
				$this->colorize($img, $img_size, $color_dark, $color_mid, $color_light);
				break;
		}
	}

	private function colorize($img, $size, $col1, $col2, $col3)
	{
		for ($x=0; $x < $size[0]; $x++) { 
			for ($y=0; $y < $size[1]; $y++) { 
				$color_index = imagecolorsforindex($img, imagecolorat($img, $x, $y));
				if ($color_index['red'] == 63) {
					imagesetpixel($img, $x, $y, imagecolorallocate($img, $col1['r'], $col1['g'], $col1['b']));
				} else if ($color_index['red'] == 127) {
					imagesetpixel($img, $x, $y, imagecolorallocate($img, $col2['r'], $col2['g'], $col2['b']));
				} else if ($color_index['red'] == 191) {
					imagesetpixel($img, $x, $y, imagecolorallocate($img, $col3['r'], $col3['g'], $col3['b']));
				}
			}
		}
		$this->img = $img;
	}

	public function getTeam()
	{
		return $this->team;
	}

	public function setTeam($set_team)
	{
		$this->team = $set_team;
	}

	public function getStyle()
	{
		return $this->style;
	}

	public function setStyle($set_style)
	{
		$this->style = $set_style;
		$this->img = $set_style;
		$this->setImg();
	}
}