<?php
    session_start();
    
?>
<!DOCTYPE html>

<html lang = "pt-BR">
    <head>
        <meta charset = "UTF-8" />
        <title><?php  echo $_SESSION['nome_empresa']; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>

    <body>
        <?php 
            include("../base_de_dados/conexao.php");

            $SQL = 'SELECT
                         perfil_evento, capa_evento
                    FROM
                        eventos
                    WHERE
                        id_evento = '.$_SESSION["id_evento"].';';

            $query = mysqli_query($conexao, $SQL);

            while($registros = mysqli_fetch_assoc($query))
            {
                $foto = $registros["perfil_evento"];
                $capa = $registros["capa_evento"];
            }
            
            print $foto;
            echo '<img src= "'.$foto.'" height="42" width="42"/>';

        ?>
        
    </body>
</html>
