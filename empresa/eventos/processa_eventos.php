<!DOCTYPE html>

<html lang = "pt-BR">
	
	<head>
		<title>Bem vindo ao MART</title>
		<meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	
	<body class =  ".display-3">
        <?php
            session_start();
            include("conexao.php");



            $SQL = "INSERT INTO eventos
                         (nome, descricao, local, data_horario, cnpj_empresa, url)
                    VALUES
                        ('".$_POST['nome']."', '".$_POST['descricao']."', '".$_POST['endereco']."', '".$_POST['data_hora']."', ".$_POST['cnpj'].", '".$_POST['url']."');
                    ";
            $query = mysqli_query($conexao, $SQL);


            if($query == NULL)
            {

                print "Erro aqui <br />";
                print $SQL;

            }
            else
            {
                $last_id = mysqli_insert_id($conexao);


                $_SESSION["id_evento"] = $last_id;
                print $_SESSION["id_evento"];

                print '<a class = "display-4">Evento cadastrado com sucesso!<br /> Página do evento </a>';
                print '<a href = "../puxador.php" class = "display-4">Página do evento!</a>';

            }

            mysqli_close($conexao);
        ?>

        
    
    
    </body>
    
</html>