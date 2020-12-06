<?php
 	session_start();
   
   if(!empty($_SESSION["id"]))
   {
        //se ela existir
        $true = $_SESSION["id"];
        
        
   }
    else
    {
        $true = 00;
    }
    
?>

<!DOCTYPE html>

<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title><?php //$_SESSION["id_evento"]; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		    <script>
            
                function sair(a, b)
                {
                    
                    $.ajax
                        ({
                            url: '../inicial/saindo.php',
                            method: 'POST',
                            data: {a:a, 
                                    b: b},
                            success: function(get_back)
                            {
                                 $("body").html(get_back);
                            }
                        });
                    alert("Desmarcou presença do evento.");
                    window.location.reload();
                }
			    function botao(a, b)
			    {
                    
                    if(a == 00)
                    {
                        alert("Para participar do evento é necessário a realização de um login!");
                        $('#logado').append('<h1>Realize seu login</h1><form action = "verifica.php" method = "POST"><br /><label>E-mail:</label><input type  = "mail" name = "mail" value = "" /><br /><label>Senha</label><input type = "password" name = "senha" value = "" /><br /><input type = "submit" name = "Submeter" value = "Logar"/><br /><input type = "reset" name = "resetar" value = "limpar"/></form>');
                    }
                    else
                    {
                        
                        $.ajax
                        ({
                            url: '../inicial/confirm_presen.php',
                            method: 'POST',
                            data: {a:a,
                                    b:b},
                            success: function(get_back)
                            {
                                 $("body").html(get_back);
                            }
                        });
                        
                        alert("Presença confirmada no evento.");
                        window.location.reload();
                    }
			    }
			    function botao_cadastro()
			    {
				    $('#area_cadas').append('<h1>Seja um cliente MART</h1><form action = "../comum/processa.php" method = "POST"><label>Nome:</label> <input type = "text" name = "nome" value = "" required /><label>Sobrenome:</label> <input type = "text" name = "sobrenome" value = "" required/><br /><label>E-mail:</label> <input type = "text" name = "mail" value = "" required/><label>Senha: </label> <input type = "password" name = "senha" value = "" required/><br /><label>Data de nascimento:</label> <input type = "date" name = "data" value = "" required/> <label>Cidade: </label> <input type = "text" name = "city" value = "" required/><br /><label>Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais?</label> Sim<input type = "radio" name = "editais" value = "Sim" /> Não<input type = "radio" name = "editais" value = "Nao" /> <br /> <input type = "submit" name = "submeter" value = "Enviar" required/><input type = "reset" name = "resetar" value = "Limpar" required/></form>');
			    }
                
                function url(url)
                {
                    
                    window.open(url);
                    
                }
		    </script>
            
        </head>

	<body>
        
            <?php
                                                
                
                if(isset($_POST["id"]))
                {
                    $id_c = $_POST["id"];
                    $_SESSION["id_evento"] = $id_c;
                    //print "oiiiiiiii";
                   
                }
                else if(isset($_SESSION["id_evento"]))
                {
                    
                    $id_c = $_SESSION["id_evento"]; 

                }


                
                if($true == 00)
                {
                    
                    print '<h1> <a href = "pagina_inicial.php" style = "background-color: white; color: black; margin-left: 40%; display: inline-block; boder: 1px solid black;">Bem vindo ao MART</a></h1>';        
                }
                else
                {
                    
                    print '<h1> <a href = "../menu/menu.php" style = "background-color: white; color: black; margin-left: 40%; display: inline-block; boder: 1px solid black;">Bem vindo ao MART</a></h1>';
                }
            ?>
            <p id = "area_foto" style = "margin-top: 10%;">
                <?php 
                    include("../empresa/eventos/foto_evento_perfil.php");
                    
                ?>
            </p>
            
		    <?php
			    include("../base_de_dados/conexao.php");

            ?>

            <div style = "margin-top: 30%;">

            <?php
			    $SQL = 'SELECT
						     id_evento, nome, descricao, local, data_horario, url
					    FROM
						    eventos
					    WHERE
				            id_evento = '.$id_c.';';
                
			    $query = mysqli_query($conexao, $SQL);

			    if(mysqli_num_rows($query) > 0) //Se verdadeiro
			    {
				    
				    while($registros = mysqli_fetch_assoc($query))
				    {
                        print '<hr style = "border: 10px solid black; background-color: black;"/>';
                        print '<h1 class = "display-1" style = "letter-spacing: 3px; font-family: arial"><span style="font-weight:bold; margin-left: 30%; height: 400px;">'.$registros["nome"].'</span></h1>';
                        print '<a style = "font-family: arial; margin-left: 40%;"><img src = "../inicial/icons.png" height = "25px" widht = "25px" style = "margin-right: 2%;">'.$registros["data_horario"].'</a>';
                        print '<br><a style = "font-family: arial; margin-left: 40%;"><img src = "../inicial/globo.png" height = "25px" widht = "25px" style = "margin-right: 2%;">'.$registros["local"].'</a>';

                        //
                        //$registros["local"];

                        print '<br /><p style = "margin-right: 60%;"><div class = "jumbotron" style = "display: inline-block; margin-left: 3%; margin-right: 60%; width:45%; border: 2px solid black;">'.$registros["descricao"].'</div></p>';
                        
                        
                        $SQL_TWO = 'SELECT * FROM publico WHERE evento_id = '.$id_c.';';
                        
                        $query_two = mysqli_query($conexao, $SQL_TWO);
                        
                        $publico = mysqli_num_rows($query_two);
                        
                        
                        $data_evento = $registros["data_horario"];
                        $url = $registros["eventos.url"];
				    }
				    session_start();
			    
			     
                        
                    }    
                
		    ?>

		    <br />
            
		    <?php 
                $repree = $id_c;
                
                $SQL_two = 'SELECT * FROM publico WHERE cliente_id = '.$true.' AND evento_id = '.$repree.';';
                    
                $query_twoo = mysqli_query($conexao, $SQL_two);
                print '<div class = "jumbotron" style = "display: inline-block; border: 2px solid black; margin-left: 70%; height: 90%; margin-top: -40%;">';
                if(mysqli_num_rows($query_twoo) > 0) //Se verdadeiro
			    {
                    
                    
                    $data_atual = date('y/m/d H:i:s');
                    if($data_evento >= $data_atual)
                    {
                        print '<br /><button class = "btn btn-primary" style = "margin-left: 2%;" onclick = url("'.$url.'");>Entrar na sala do evento!</button>';
                    }

                    print '<section id = "fazendo_logando">
			                 <button style = "margin-left: 2%; margin-top: 1%;" onclick = "sair('.$true.', '.$id_c.');" class="font-weight-bold btn btn-outline-dark btn btn-primary" >Deixar evento</button>
			                 <div id = "logado" style = "margin-top: 10%;"></div>
		                  </section>';
                }
                else
                {
                    print '<section id = "fazendo_logando">
			                 <button style = "margin-right: 60%; margin-top: 1%;" onclick = "botao('.$true.', '.$id_c.');" class="font-weight-bold  btn btn-outline-dark btn btn-primary" >Participar do evento</button>
			                 <div id = "logado" style = "margin-top: 1%;"></div>
		                  </section>';
                }
                
            ?>

		    <?php 
                if($true == 00)
                {
                    print '
                                <button style = "margin-left: 60%%;" onclick = "botao_cadastro();" class="font-weight-bold btn btn-outline-dark btn btn-primary">Se cadastrar na aplicação</button>
                                <div id = "area_cadas"></div>
                            
                            ';    
                }
                mysqli_close($conexao);
            ?>
            </div>
        </div>
       
	</body>

</html>
