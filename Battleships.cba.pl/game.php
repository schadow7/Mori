<!DOCTYPE HTML>
<?php
	session_start();
	if ((!isset($_SESSION['zalogowany']))||($_SESSION['zalogowany']==false))
	{
		header('Location: index.php');
		exit();
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
			<li><a href="game.php">Game</a></li>
			<li><a href="aboutus.php">About us</a></li>
			</ol>
		</div>
		<div id="containerL">

			<?php
				if(!isset($_SESSION['host']))
				{
					echo '<h2 align="center" >Create or join room</h2>
							<div id="createroom"><h3>Create room</h3>
							<form action="createroom.php" method="post">
							<div id="gt1" style="float:left;">
								<select name="gametype">
									<option value="tictac">Tic-Tac-Toe</option>
									<option value="battleships">Battleships</option>
								</select>
							</div>
							<div id="gt2" style="float:left;">
								<input type="submit" value="Create">
							</div>
							</form>
						</div>
						<div id="rooms">
						</br></br></br>
							<table id="pokoje">
								<tr style="background-color: #b5571d; font-weight: bold;">
									<td>Room number</td>
									<td>Player 1</td>
									<td>Player 2</td>
									<td>Game ID</td>
									<td>Game Type</td>
								</tr>';
								
						require_once "connect.php";
						mysqli_report(MYSQLI_REPORT_STRICT);
			
						try 
						{
							$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
							
							if ($polaczenie->connect_errno!=0)
							{
								throw new Exception(mysqli_connect_errno());
							}
							else
							{
															
								if($rezultat=$polaczenie->query(sprintf("SELECT * FROM rooms")))					
									{
										$rezultat->data_seek(0);
										while ($row = $rezultat->fetch_assoc()) 
										{
											echo 	'<tr>
															<td>'.$row['idroom']."</td>
															<td>".$row['idplayer1']."</td>
															<td>".$row['idplayer2']."</td>
															<td>".$row['idgame'].'</td>
															<td><img src="img/'.$row['gametype'].'.png" height="42" width="38"></td>
														</tr>';
										}
									}
									else 
									{									
										header('Location: index.php');
									}
									
								}
								
								$polaczenie->close();
							}
						catch(Exception $e)
						{
							echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
			
						}
				}
				else
				{
					echo '<div style="margin:200px;">
								<a href="'.$_SESSION['gametype'].'.php" target="_blank"><input type="submit" value="Go to room"></input></a> 
								</div>';
					
				}
				?>
			</table>
		</div>
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