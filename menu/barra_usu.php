

<?php session_start(); ?>
<script>
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
                         //$("#eventos").html(get_back);
                         $("#lista").html(get_back);
                         $("#eventos").modal('show');
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
                     
                     $("#lista_es").html(back);
                     $("#evento_especi").modal('show');
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
   $(document).ready(function(){
   $("#barra").on("input", function () {
        var word = $("#barra").val();
        $.ajax
        ({
            url: '../inicial/select.php',
            method: 'POST',
            data: {word: word},
            success: function(retorno)
            {
                if(retorno == "foi")
                {
                    
                    window.location.href = "../inicial/transicao_com.php";    
                    
                }
                else
                {
                    $("#pes").html(retorno);    
                }



            }

        });
    });
});
    
</script>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-static-top" style = "background-color: black;">
    <a class="navbar-brand" href="../menu/menu.php"> <?php echo '<img src="'.$_SESSION["perfil"].'" style = "width: 5%; min-width: 25%; max-height: 80px; min-height: 80px;"/>     '; print "  Bem vindo á MART,".$_SESSION['nome'].""; ?></a>
    <ul>
        <li>
            <form class="form-inline my-2 my-lg-0" style = "margin-left: 30%;">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 700px;">
                        
                <datalist id = "pes">

                 </datalist>
            
            </form>
        </li>
    </ul>
      <ul class="navbar-nav" style = "margin-left: 250px; color: white;">
        <li class="nav-item">
          <a class="nav-link" onClick = "meus_eventos();" data-target="#eventos" style = "color: white;">Eventos marcados</a>
        </li>
          <?php
                if ($_SESSION['editais_s_n'] == "Sim")
                {
                    print '<li class="nav-item">
                        <a class="nav-link" onClick = "editais();" style = "color: white;">Editais publicados.</a>
                    </li>';    
                }
                
            ?>
        <p class="text-right"></p>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href = "../menu/logout.php" style = "color: white;">Logout</a>
            </li>
          </ul>
        </ul>
</nav>
    <div class = "modal fade bd-example-modal-lg" id = "eventos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_evento">Lista de evento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
    

    <div class = "modal fade bd-example-modal-lg" id = "evento_especi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id = "nome_evento">Lista de evento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <a id = "lista_es"></a>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    
            
