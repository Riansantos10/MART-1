<?php
    session_start();
    print "estou aqui";
    include "../base_de_dados/conexao.php";

    $cnpj = $_POST["cnpj"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $localizacao = $_POST["localizacao"];
    $cidade = $_POST["cidade"];
    $tipos = $_POST["tipos"];

    $inserindo = "INSERT INTO empresa
						(cnpj, nome_empresa, email, senha, localizacao, cidade, tipos_eventos)
                    VALUES ($cnpj, '$nome' , '$email', $senha, '$localizacao', '$cidade', '$tipos')";
    var_dump($inserindo);
    $query = mysqli_query($conexao, $inserindo);
    
    if($localizacao == "Itinerante")
    {
		$iti = "INSERT INTO grupos_itinerantes
						(cnpj_itine, nome)
                    VALUES($cnpj, '$nome')";
                    
        $query_two = mysqli_query($conexao, $iti);
	}

    $_SESSION["cnpj"] = $cnpj;
    $_SESSION["nome_empresa"] = $nome;
	$_SESSION["email"] = $email;
	$_SESSION["senha"] = $senha;
	$_SESSION["localizacao"] = $localizacao;
	$_SESSION["cidade"] = $cidade;
	$_SESSION["tipos_eventos"] = $tipos;

	header("location:../menu_empresa/menu.php");
    
    mysqli_close($conexao);
?>
