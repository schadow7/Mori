<?php
	session_start();
	
	if (!isset($_POST['gametype'])||$_SESSION['zalogowany']==false)
	{
		header('Location: game.php');
		exit();
		$_SESSION['e_room']='<span style="color:red">Nie wybrałeś rodzaju gry.</span>';
	}

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
		
	try 
	{
		$gametype=$_POST['gametype'];
		$_SESSION['gametype']=$gametype;
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($polaczenie->connect_errno!=0)
		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{
			//Tworzenie pustej planszy i zamiana na tekst
			  $board=array(" "," "," "," "," "," "," "," "," ");
			$str = serialize($board);
			$strenc = urlencode($str);
			if($polaczenie->query("INSERT INTO $gametype VALUES (NULL,'$strenc','0','0')"))
				{
					$_SESSION['host']=true;
					$idgry=$polaczenie->insert_id;
					$_SESSION['idgry']=$idgry;
					$idgracza1=$_SESSION['id'];
					if($polaczenie->query("INSERT INTO rooms VALUES (NULL,'$idgracza1','','$idgry','$gametype','WAITING')"))
					{
						$idroom=$polaczenie->insert_id;
						$_SESSION['idroom']=$idroom;
						header('Location: game.php');
						
					}			
				}
			else 
				{	
					$polaczenie->query("DELETE FROM $gametype WHERE idgame='$idgry'");
					echo "Błąd serwera";
				}
				
		}
			$polaczenie->close();
		}
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
	      
	}
?>