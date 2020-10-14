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
		<script src = "menu_empresa.js"></script>
        <script>
            function listar()
            {
                $(document).ready(function ()
                {
                    $.ajax
                    ({
                        url: 'lista_soli.php',
                        method: 'POST',
                        data: {},
                        success: function(voltar)
                        {
                            $('#area').html(voltar);
                        }
                    });
                });
            }
        
        </script>
    </head>

    <body id = "perfil">
        
        <?php include("../menu_empresa/barra.php"); ?>
        <br />
        <section id = "area"></section>
		
        
		<br />
        
        
        
    </body>
</html>
