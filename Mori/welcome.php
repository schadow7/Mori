
<!DOCTYPE HTML>
<?php
	session_start();
	
	if(!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}



?>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>Mori - Battleships</title>
	<meta name="description" content="Play now in Battleships"/>
	<meta name="keywords" content="game,multiplayer,battleships,statki,gra,mori"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
		<div id="logo">
		Mori

		</div>
		<div id="menu">
			<ol>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="#">Tic-Tac-Toe</a></li>
			<li><a href="#">Battleships</a></li>
			<li><a href="#">About us</a></li>
			</ol>
		</div>
		<div id="containerL">
		<h1 align="center" >Welcome</h1>
		<h2 align ="center"><a href="index.php"> Thank you for registration. Now u can sign in.</h2>
		</div>
		<div id="containerR">
			<div class="square" style="background-color:#b5571d;">
				<div id="logging"><form>
				<input type="text">
				<br/><br/>
				<input type="password">
				<br/><br/>
				<input type="submit" value="Zaloguj się">
				</form></div>
			</div>
			<div class="square" style="background-color:#be9295;">
			<a href="https://github.com/schadow7/Mori"><i class="icon-git-squared"></i></a>
			</div>
			<div class="square" style="background-color:#be9295	;">
			<a href="#"><i class="icon-wordpress"></i></a>
			</div>
		</div>
		<div style="clear: both"></div>
		
				<div id="fotter">
		Piotr Machura &copy Wszelkie prawa zastrzeżone.
		</div>
	</div>
</body>
</html>