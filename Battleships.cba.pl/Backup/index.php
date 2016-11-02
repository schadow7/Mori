<!DOCTYPE HTML>
<?php
	session_start();
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
		<h2 align="center" >Welcome</h2>
		<br/><br/>		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nibh augue. Donec sed velit metus. Proin malesuada varius ex, a elementum leo accumsan eget. Ut tincidunt turpis congue, posuere neque vitae, sodales tortor. Vivamus auctor egestas leo at porta. Phasellus viverra orci id sapien tincidunt accumsan. Etiam gravida dui et lorem venenatis, at laoreet nisi faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
		<br/><br/>
		Nulla sodales sodales velit sit amet pulvinar. In ut tellus eu libero porta lobortis vel sit amet lorem. Morbi porta fermentum odio, in malesuada nunc viverra et. Cras pulvinar augue diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In in lectus vestibulum elit ornare mollis vitae sit amet lorem. Quisque sed elit non augue sagittis vestibulum ac eget nisi. Sed sollicitudin odio eu turpis pellentesque, et varius urna consequat. Nullam elementum varius tortor sed bibendum. Duis ut enim ut ex imperdiet imperdiet. Aliquam cursus fringilla lobortis. Maecenas fringilla, mauris ultrices viverra ultrices, purus dolor porttitor tellus, ut maximus ligula urna a metus. Nullam ornare dignissim ipsum, at varius nunc semper eget.
		<br/><br/>
		Fusce placerat urna vitae neque iaculis malesuada eget semper tellus. Duis porttitor eros quis risus mollis iaculis. Nulla interdum elit quis nisi pretium rutrum. Vestibulum diam nisl, tristique sed est id, venenatis blandit odio. Nam nisl odio, dignissim a congue aliquam, posuere ut leo. Vivamus egestas viverra tortor, eu ultrices dui. Mauris facilisis scelerisque ex ac finibus. Morbi sodales consequat porta. Vestibulum ac nisi nec lacus ultricies viverra lacinia vel eros. Pellentesque mauris lorem, pharetra vitae ex scelerisque, finibus tristique lorem. Morbi mollis leo enim, ut fringilla enim tincidunt sed. Morbi sed dolor nec leo euismod placerat. Etiam a ante volutpat, cursus felis at, suscipit ipsum.
		<br/><br/>
		Etiam sit amet elit dolor. Nam quis sem porttitor, sodales lectus ac, pellentesque diam. Quisque suscipit sed neque in lobortis. Vivamus ac euismod leo. Praesent rhoncus erat massa, in lacinia felis ultrices sed. Suspendisse et ligula odio. Quisque vel dapibus lacus. Quisque leo ante, interdum quis ullamcorper ut, lacinia placerat sem. Curabitur id nisl nunc. Mauris tincidunt nisl varius tortor sagittis egestas. Vestibulum ut mauris id tortor dictum aliquam. Suspendisse congue est a tellus blandit, vitae tempus nulla dapibus. Fusce rhoncus dolor quis enim mollis viverra. Quisque fermentum felis id massa scelerisque, ut tempus lacus sagittis.
		</div>
		<div id="containerR">
			<div class="square" style="background-color:#b5571d;">
				<div id="logging">
				<?php
					if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
					{
						echo '<div align="center"><img src='.$_SESSION['avatar'].' style="height: 40%;width: 40%;"><br/>'.$_SESSION['nick'].'</div>';
						echo '<form action="loguot.php"><input type="submit" value="Logout"></form>';
						if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
						unset($_SESSION['blad']);
					}
					else
					{
						echo '<form action="singin.php" method="post">
								<input type="text" name="login">
								<br/><br/>
								<input type="password" name="haslo">
								<br/><br/>
								<input type="submit" value="Sign in">
								</form>';
								if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
								unset($_SESSION['blad']);
					}
					?>
				</div>
			</div>
			<div class="square" style="background-color:#be9295;">
			<a href="https://github.com/schadow7/Mori"><i class="icon-git-squared"></i></a>
			</div>
			<div class="square" style="background-color:#be9295	;">
			<a href="http://329elearning.aei.polsl.pl/tiwordpress2016/s525/"><i class="icon-wordpress"></i></a>
			</div>
		</div>
		<div style="clear: both"></div>
		
				<div id="fotter">
		Piotr Machura &copy Wszelkie prawa zastrzeżone.
		</div>
	</div>
</body>
</html>