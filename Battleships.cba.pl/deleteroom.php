<?php
	session_start();
	
	if (isset($_SESSION['host'])&&$_SESSION['host']==true)
	{
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
				$idgry=$_SESSION['idgry'];
				$idroom=$_SESSION['idroom'];
				$gametype=$_SESSION['gametype'];
				if($polaczenie->query("DELETE FROM $gametype WHERE idgame='$idgry'"))
					{
						unset($_SESSION['idgry']);
						unset($_SESSION['gametype']);
						$polaczenie->query("DELETE FROM rooms WHERE idroom='$idroom'");
					
						unset($_SESSION['idroom']);
						unset($_SESSION['host']);
						header('Location: game.php');
						exit();
									
					}
				else 
					{	
						echo "Błąd serwera";
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
		header('Location: game.php');
		exit();
	}

	
?>