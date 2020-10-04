<?php
	session_start();

	$nome = $_POST["nome"];
	$sobre = $_POST["sobrenome"];
	$mail = $_POST["mail"];
	$senha = $_POST["senha"];
	$data = $_POST["data"];
	$city = $_POST["city"];;
	$edital = $_POST["editais"];

	include "../base_de_dados/conexao.php";

	$inserindo = "INSERT INTO cliente
						(nome, sobrenome, email, senha, data_de_nasc, cidade, editais_s_n)
					VALUES ('$nome', '$sobre', '$mail', '$senha', '$data', '$city', '$edital')";
	
	$query = mysqli_query($conexao, $inserindo);
	$_SESSION["nome"] = $nome;
	$_SESSION["sobrenome"] = $sobre;
	$_SESSION["email"] = $mail;
	$_SESSION["senha"] = $senha;
	$_SESSION["data_de_nasc"] = $data;
	$_SESSION["cidade"] = $city;
	$_SESSION["editais_s_n"] = $edital;

    $last_id = mysqli_insert_id($conexao);
    $_SESSION["id"] = $last_id;

	header("location:../menu/menu.php");
	

	mysqli_close($conexao);

?>