<!DOCTYPE html>

<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Solicitação de contrato</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#lista").click(function()
            {
                $.ajax
                ({
                  url: 'list_groups.php',
                  method: 'POST',
                  data: {},
                  success: function(voltar)
                  {
                      $('#list_of_groups').html(voltar);
                  }
                }); 
            });
        });
      
    </script>
  </head>

  <body>
      
       <?php include("../editais/barra.php"); ?>
    <h2>Grupos itinerantes</h2>
    
    <button id = "lista" class="btn btn-dark">Lista de cia e artistas</button>
    <section id = "list_of_groups">
        
    </section>

  </body>

</html>
