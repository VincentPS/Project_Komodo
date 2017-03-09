<?php require './php/core.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<title>Project Komodo</title>
	<link rel="stylesheet" href="style/style.css" >
	<script type="text/javascript" src="js/main.js" ></script>
</head>
<body>
	<section>
		<canvas id="main" ></canvas>
	</section>
	<button id="start" type="button" >start</button>
	<p id="displayData" ></p>
	<script>
		window.data = JSON.parse('<?php echo json_encode($application->data) ?>');
		console.log(window.data);
	</script>
</body>
</html>
