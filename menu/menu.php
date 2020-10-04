<!DOCTYPE html>

<hmtl>
    <head>
        <meta charset="UTF-8" />
        <title>Menu</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
			function eve(id_evento)
			{
				
				$.ajax
                ({
                    url: '../inicial/transicao.php',
                    method: 'POST',
                    data: {id_evento:id_evento},
                    success: function(get_back)
                    {
                         $("body").html(get_back);
                    }
				});
			}
		</script>
        
    
    </head>
    <body class =  ".display-3">
        
        <?php include("barra_usu.php") ?>
        
        <section class = "area_eventos">
			<h2>ACOMPANHE OS EVENTOS QUE RODAM AS SUA REGIÃO</h2>
			<?php
				include("../base_de_dados/conexao.php");

				$SQL = "SELECT 
							 id_evento, nome, descricao, local, data_horario
						FROM
							eventos";
				$query = mysqli_query($conexao, $SQL);
				if(mysqli_num_rows($query) > 0) //Se verdadeiro
				{
					$count = 1;
					print '<table class = "table table-hover">';
                    print '<thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Local</th>
                                    <th>Data e hora</th>
                                    <th>Link de acesso</th>
                                </tr>
                            </thead>';
					while($registros = mysqli_fetch_assoc($query))
					{
						print '<tr><td>'.$count.'</td>';
						print '<td>'.$registros["nome"].'</td>';
						print '<td>'.$registros["descricao"].'</td>';
						print '<td>'.$registros["local"].'</td>';
						print '<td>'.$registros["data_horario"].'</td>';
						print '<td><button class="font-weight-bold btn btn-light btn btn-outline-dark" onClick = eve('.$registros["id_evento"].');>Acesse o evento</button></td></tr>';

						$count = $count + 1;
					}
					print "</table>";
				}
			?>
		</section>
    
    </body>
</hmtl>

