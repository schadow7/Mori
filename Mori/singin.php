<?php
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

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
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
			if ($rezultat = $polaczenie->query(
			sprintf("SELECT * FROM users WHERE nick='%s'",
			mysqli_real_escape_string($polaczenie,$login))))
			{
				$ilu_userow = $rezultat->num_rows;
				if($ilu_userow>0)
				{
					$wiersz = $rezultat->fetch_assoc();
					
					if (password_verify($haslo, $wiersz['password']))
					{
						$_SESSION['zalogowany'] = true;
						$_SESSION['id'] = $wiersz['id'];
						$_SESSION['nick'] = $wiersz['nick'];
						$_SESSION['puntky'] = $wiersz['punkty'];
						$_SESSION['rank'] = $wiersz['rank'];
						$_SESSION['avatar'] = $wiersz['avatar'];
						$_SESSION['email'] = $wiersz['email'];

						
						unset($_SESSION['blad']);
						$rezultat->free_result();
						header('Location: index.php');
					}
					else 
					{
						$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
						header('Location: index.php');
					}
					
				} else {
					
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
					
				}
				
			}
			else
			{
				throw new Exception($polaczenie->error);
			}
			
			$polaczenie->close();
		}
	}
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
?>