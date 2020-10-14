<!DOCTYPE html>
<?php session_start(); ?>
<html lang = "pt-BR">

    <head>
        <meta charset = "UTF-8" />
        <script type="text/javascript">
        function meus_eventos()
        {
            //selecionar os eventos que irá comparecer. 
            $(document).ready(function ()
            {
                $.ajax
                    ({
                        url: '../menu/listar_eventos.php',
                        method: 'POST',
                        data: {},
                        success: function(get_back)
                        {
                            $("#eventos").html(get_back);
                        }
                    });   
            });
        }
        function acesse(evento_id)
        {
            
            $(document).ready(function ()
            {	
                $.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento: evento_id},
                    success: function(back)
                    {
                        $("body").html(back);
                    }
                });
            });
        }
        function editais()
        {
            $(document).ready(function ()
            {
                $.ajax
                ({
                    url: '../menu/editais_publicados.php',
                    method: 'POST',
                    data: {},
                    success: function(volta)
                    {
                        $("#eventos").html(volta);
                    }
                });
            });
        }
        function excluir_conta()
        {
            
            var judger = confirm("Deseja mesmo exluir esta conta?");

            if(judger == true)
            {
                $(document).ready(function()
                {
                    $.ajax
                    ({
                        url: '../menu/deletando.php',
                        method: 'POST',
                        data: {},
                        success: function(volta)
                        {
                            $("body").html(volta);
                            window.location.href = "../inicial/pagina_inicial.php";
                        }
                    });
                });
            }
        }

        
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-static-top">
        <a class="navbar-brand" href="../menu/menu.php">Bem vindo á MART, <?php print $_SESSION['nome']; ?></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" onClick = "meus_eventos();">Eventos marcados</a>
                </li>
                <?php
                        if ($_SESSION['editais_s_n'] == "Sim")
                        {
                            print '<li class="nav-item">
                                <a class="nav-link" onClick = "editais();">Editais publicados.</a>
                            </li>';    
                        }
                        
                    ?>
                <p class="text-right"></p>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href = "../menu/logout.php">Logout</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" onclick = "excluir_conta();">Excluir conta</a>
                    </li>
                </ul>

                
            </ul>
        </nav>
        <div id = "eventos"></div>
    </body>
    

</html>