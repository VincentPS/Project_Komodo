<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="data" content="<?=json_encode($this->data)?>" />
    <link rel="stylesheet" href="style/style.css" >
    <script type="text/javascript" src="js/main.js" ></script>
    <title>Project Komodo</title>
</head>
<body>
<section class="canvas">
    <canvas id="main" width="960" height="640">Your browser may not support the HTML5 canvas element. Consider upgrading to a browser which does, such as: Google Chrome or Mozilla Firefox.</canvas>
</section>
<section class="description">
    <button id="start" type="button">start</button>
    <button id="startGet">Click to get database</button>
    <h2>We know it's a long explaination, Still advised to read it.</h2>
    <p>
        This game is meant to be played in fullscreen mode.
        The moment you hit the start button,
        you will automatically be put into fullscreen mode for this reason.
        Press the escape key to cancel out of the canvas and back to the standard page.
    </p>
</section>
</body>
</html>