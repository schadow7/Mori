<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST['email']))
	{
		 //Flaga do sprawdzenia, czy wszystkie pola są prawidłowe
		 $wszystko_OK=true;
		 
		 //Sprawdzenie poprawności nicku
		 $nick = $_POST['nick'];
		 
		 //Sprawdzenie długości nicka
		 if((strlen($nick)<3) || (strlen($nick)>20))
		 {
			 $wszystko_OK=false;
			 $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków"; 
		 }
		 
		 //Sprawdzenie czy nick ma tylko znaki alfanumeryczne
		 
		 if(ctype_alnum($nick)==false)
		 {
			 $wszystko_OK=false;
			 $_SESSION['e_nick']="Nick może składać się jedynie ze znaków alfanumerycznych, bez polskich znaków";
		 }
		 
		 //Sprawdź czy email jest poprawny
		 
		 $email=$_POST['email'];
		 $emailS = filter_var($email,FILTER_SANITIZE_EMAIL);
		 
		 if((filter_var($emailS,FILTER_VALIDATE_EMAIL)==false)||($email!=$emailS))
		 {
			 $wszystko_OK=false;
			 $_SESSION['e_email']="Niepoprawny adres email";
		 }
		 
		//Sprawdź poprawność hasłą

		$haslo1=$_POST['haslo1'];
		$haslo2=$_POST['haslo2'];
		
		if((strlen($haslo1)<8)||(strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi mieć od 8 do 20 znaków długości";
		}
		
		if($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne";
		}
		
		$haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);
		
		//Sprawdź czy nie jest botem
		
		$sekret = "6LcaZQkUAAAAABnAcaxfyS5N34ychIRoVSYh6tyO";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz=json_decode($sprawdz);
		
		if($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem";
		}
		
		require_once("connect.php");
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
			if($polaczenie->connect_errno!=0)
			{
				throw new Exception (mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje
				$rezultat=$polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				$ile_takich_maili=$rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego emaila.";
				}
				//Czy nick jest już zarezerwowany?
				$rezultat=$polaczenie->query("SELECT id FROM users WHERE nick='$nick'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				$ile_takich_nickow=$rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku";
				}
				if($wszystko_OK==true)
				{
					if($polaczenie->query("INSERT INTO users  VALUES (NULL,'$nick','$haslo_hash','$email',0,0,'img/noavatar.png')"));
					$_SESSION['udanarejestracja']=true;
					header('Location: welcome.php');
				}
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color: red;">Błąd serwera. Spróbuj zarejestrować się później</span>'; 
		}

		 
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
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
		<h2 align="center" >Register</h2>
			<form align="center" method="post">
				Nickname: <br/>
				<input type="text" name="nick"/>
				<?php
					if(isset($_SESSION['e_nick']))
					{
						echo '<div class="error"">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
					}
				
				?>
				<br/>Email:<br/>
				<input type="text" name="email"/>
				<?php
					if(isset($_SESSION['e_email']))
					{
						echo '<div class="error"">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
				
				?>
				<br/>Password:<br/>
				<input type="password" name="haslo1"/>
				<?php
					if(isset($_SESSION['e_haslo']))
					{
						echo '<div class="error"">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
				
				?>
				<br/>Repeat password:<br/>
				<input type="password" name="haslo2"/>
				<br/><br/>
				<div class="g-recaptcha" align="center" data-sitekey="6LcaZQkUAAAAAGlNuorONvmsRmQtwXNekGV2PvBX"></div>
				<br/>
				<?php
					if(isset($_SESSION['e_bot']))
					{
						echo '<div class="error"">'.$_SESSION['e_bot'].'</div>';
						unset($_SESSION['e_bot']);
					}
				
				?><br/>
				<input type="submit" value="Sign up"/>
				<br/><br/>
			</form>
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