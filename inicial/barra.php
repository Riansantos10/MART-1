<?php session_start(); ?>

<head>
    <meta charset = "UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
               $("#barra").on("input", function (){
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
            $(document).ready(function()
            {
                $("#table").on("input", function ()
                {
                    var word_two = $("#table").val();
                    $.ajax
                    ({
                        url: '../inicial/select_two.php',
                        method: "POST",
                        data: {word_two: word_two},
                        success: function(retorna)
                        {
                            
                            $("#area_alvo").html(retorna);    
                            
                        }
                    });
                })
            });
    </script>
</head>
<div>
            <nav class="navbar navbar-expand-sm navbar-red navbar-static-top fixed-top navbar-light" style = "background-color: red; man-height: 1%; min-height: 1%;">
                <button class = "navbar-toggler" data-toggle = "collapse" data-target = "#collapse_target">
                    <span class = "navbar-toggler-icon"></span>
                </button>
                
                <div class = "collapse navbar-collapse" id = "collapse_target">
                     <ul class="navbar-nav">
                        <li class="nav-item" id = "login" style = "margin-right: 2%;">
                            <a class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" id = "click_login" data-target="#modalPoll-1" data-toggle="modal"> <button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">Login</button></a>
                             <div>
                                <?php include ("../inicial/modal_form.php"); ?>
                            </div>
                        </li>
                         
                        <li class="nav-item" style = "text-decoration: none; margin-right: 2%;"><button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">
                            <a id = "click_comum" class="font-weight-bold btn btn-light btn btn-outline-dark nav-link" href = "../comum/cadastro.php">Realizar cadastro comum</button></a>
                        </li>
                        <li class="nav-item" style = "text-decoration: none; margin-right: 4%;"><button style = "background-color: white; border: none; color: black; padding: 4px 4px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px;">
                          <a href = "../empresa/form_empre.php" class="nav-link font-weight-bold btn btn-light btn btn-outline-dark" id = "click_empre">Realizar cadastro empresarial</button></a>
                        </li>
                        
                        <li class = "nav-item" style = "margin-left: 0%;">
                            <a href = "../inicial/pagina_inicial.php" class = "nav-link">
                                <img src = "../logoti.png" style = "height: 50px; margin-left: 10%; "/>
                            </a>
                        </li>
                      <!--barra de pesquisa-->
                        <li class = "nav-item" style = "margin-left: 0%;"> 
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id = "barra" list = "pes" style = "width: 450px; display: inline-block; border-bottom: 8px solid black;">

                                <datalist id = "pes">

                                </datalist>
                            </form>
                         </li>
                    </ul>
                </div>
            </nav>
            
         </div>
