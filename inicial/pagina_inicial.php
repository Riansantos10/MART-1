<?php 
    session_start();
   
    if(!empty($_SESSION["id"]))
    {
        //se ela existir
        header("location: ../menu/menu.php");
    }
    
?>

<!DOCTYPE html>

<html lang = "pt-BR">
	
	<head>
		<title>Bem vindo ao MART</title>
		<meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<!--<script src = "login.js"></script>-->
        <style type = "text/css">
                body 
                {
                  overflow: scroll;            
                }
                .overlay 
                {
                      position: absolute;
                      bottom: 100%;
                      left: 0;
                      right: 0;
                      background-color: #008CBA;
                      overflow: hidden;
                      width: 100%;
                      height: 0;
                      transition: .5s ease;
                 }
                .container:hover .overlay 
                {
                  bottom: 0;
                  height: 100%;
                }
                .text {
                  white-space: nowrap; 
                  color: white;
                  font-size: 20px;
                  position: absolute;
                  overflow: hidden;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  -ms-transform: translate(-50%, -50%);
                }
        </style> 
		<script>
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

			function eve(id_evento)
			{
                $(document).ready(function ()
                {
                    $.ajax
                    ({
                        url: 'transicao.php',
                        method: 'POST',
                        data: {id_evento:id_evento},
                        success: function(get_back)
                        {
                            //$("body").html(get_back);
                            $("#data").html(get_back);
                            $("#modal_repre").modal('show');
                            
                        }
                    });
                    
                });
				
			}
            
		</script>
		
	</head>
	
	<body class =  ".display-3">
        
        <div>
            <nav class="navbar navbar-expand-sm bg-dark navbar-white navbar-static-top fixed-top navbar-light bg-light">
                <section class = "area_login">
                    <ul class="navbar-nav">
                         <ul class="nav justify-content-end">
                            <section id = "login">
                                <li class="nav-item">
                                  <a class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" style = "margin: 5px 12px 5px 10px; padding: 10px;" id = "click_login" data-target="#modalPoll-1" data-toggle="modal">Login</a>
                                </li>
                                <div>
                                    <?php include ("../inicial/modal_form.php")?>
                                </div>
                                
                            </section>


                             <section id = "comum">
                                 <li class="nav-item">
                                    <a id = "click_comum" class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" style = "margin: 5px 10px 5px 10px; padding: 10px; text-decoration: none;" href = "../comum/cadastro.php">Realizar cadastro comum</a>
                                </li>
                            </section>
                            
                            <section>
                                <li class="nav-item">
                                  <a class="nav-link font-weight-bold btn btn-light btn btn-outline-dark" id = "click_empre" style = "text-decoration: none; margin: 5px 10px 5px 10px; padding: 10px;" href = "../empresa/form_empre.php">Realizar cadastro empresarial</a>
                                 </li>
                            </section>
                        </ul>
                    </ul>
                </section>
            <!--barra de pesquisa-->

         <form class="form-inline my-2 my-lg-0" style = "margin-left: 30%;">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 450px;">
            
            <datalist id = "pes">

            </datalist>
         </form>
            </nav>
            
         </div>
        <center class = "jumbotron">
		    <h1 href = "pagina_inicial.php" class = "display-3" style = "background-color: black; color: white;margin-left: 25%; margin-right: 25%; margin-top: 5%; padding: 2.5%;">Bem vindo ao MART</h1>
            <h2>ACOMPANHE OS EVENTOS QUE RODAM A SUA REGIÃO</h2>
        </center>
        
        <div>
            <?php include("../inicial/slides.php"); ?>
        
        </div>

		<section class = "area_eventos jumbotron">
			
			<?php
				include("../base_de_dados/conexao.php");

				$SQL = "SELECT 
							 id_evento, nome, descricao, local, data_horario, perfil_evento, capa_evento
						FROM
							eventos";
				$query = mysqli_query($conexao, $SQL);
				if(mysqli_num_rows($query) > 0) //Se verdadeiro
				{
                    $count = 0;
                    print '<div class="row">';
					while($registros = mysqli_fetch_assoc($query))
					{
                        print '
                            <div class="card" style="width: 18%; margin: 40px 0px 0px 85px; background-color: black;">
                                <div class = "container">
                                    <img class="card-img-top" src= "../empresa/eventos/'.$registros["perfil_evento"].'" alt="Card image cap" style = "min-width: 20%; max-height: 300px; min-height: 300px;">
                                    <div class="overlay">
                                        <div class="text">
                                            <div class="card-body" style = "color: white;">
                                                <h5 class="card-title">'.$registros["nome"].'</h5>
                                                <a>
                                                    <button type="button" class="btn btn-primary font-weight-bold btn btn-light btn btn-outline-blue" data-toggle="modal" data-target="#modal_repre" onClick = "eve('.$registros['id_evento'].');">
                                                        Acessar evento
                                                    </button>
                                                </a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            </div>

                            <div class = "modal fade bd-example-modal-xl" id = "modal_repre" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id = "nome_evento">Detalhes do evento</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style = "overflow: scroll;">
                                            <a id = "data"></a>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
			                </div>
                            ';

                       

						//print '<tr><td>'.$count.'</td>';
						//print '<td></td>';
						//print '<td>'.$registros["local"].'</td>';
						//print '<td></td>';
						//print '<td><button class=""  onClick = eve('.$registros["id_evento"].');>Acesse o evento</button></td></tr>';

                       



                        $matriz[$count] = $registros["capa_evento"];

                        $count = $count + 1;
                        
                    }

                    
                    print '</div>';
				}

                mysqli_close($conexao);
			?>

           
		</section>

        
	</body>

</html>
