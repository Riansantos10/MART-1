<?php
	session_start();
	
	$_SESSION["id_evento"] = $_POST["id_evento"];
	
	
	header('Location: perfil_evento.php');
?>
