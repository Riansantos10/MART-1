<?php 
	
	//Conectar com o software de banco de dados
	//MySQL
	
	$conexao = mysqli_connect("localhost", "root", "");

	if(!$conexao)
	{
		print "<h1>Erro</h1>";

		print mysqli_connect_error($conexao). "<br>";
		exit();
	}
	
	
	//selecionando a base de dados
	$db = mysqli_select_db($conexao, "mart_banco");
	
	if(!$db)
	{
		print "a";
		print "Erro";
		print mysqli_error($db)."<br>";
		exit();
	}

	
	
?>