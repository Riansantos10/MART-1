<?php
    
    include("../menu_empresa/barra_one.php");
    print '<h1 class = "display-3">Informações sobre seu próprio evento</h1>';
    include("../base_de_dados/conexao.php");
    session_start();

    $_SESSION["id_evento"] = $_POST["id_evento"];



    $SQL = 'SELECT
                 nome, descricao, local, data_horario, url
            FROM
                eventos
            WHERE
                id_evento = '.$_POST["id_evento"].';';

    $query = mysqli_query($conexao, $SQL);

    print '<style rel="stylesheet" type="text/css">
                .imagem{
                   background: url(lapis.png);
                   width: 46px;
                    height: 44px;
                }
    
    
    
        </style>';

    print '<script>
                function altera_campo(representante)
                {
                    
                    $(document).ready(function ()
                    {
                        var a = $("#"+representante).attr("id");
                    
                        if(a == 1)
                        {
                            //mudar o campo nome
                        }
                        if(a == 2)
                        {
                            //mudar o campo 
                        }
                        if(a == 3)
                        {
                        
                        }
                        if(a == 4)
                        {
                        
                        }
                        if(a == 5)
                        {
                        
                        }
                    
                    })
                    
                    
                
                }
    
    
        </script>';


    if(mysqli_num_rows($query) > 0) //Se verdadeiro
    {

        print '<table class="table table-hover">';
        print '<thead>
          <tr>
            <th>Nome do evento</th>
            <th></th>
            <th>Descrição</th>
            <th></th>
            <th>Local</th>
            <th></th>
            <th>data_horario</th>
            <th></th>
            <th>url</th>
            <th></th>
          </tr>
        </thead>';
        while($registros = mysqli_fetch_assoc($query))
        {
            print '<tr>';
            print '<td>'.$registros["nome"].'</td><td onClick = "altera_campo(1);" id = "1" val = "1"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
            print '<td>'.$registros["descricao"].'</td><td onClick = "altera_campo(2);" id = "2"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
            print '<td>'.$registros["local"].'</td><td onClick = "altera_campo(3);" id = "3"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
            print '<td>'.$registros["data_horario"].'</td><td onClick = "altera_campo(4);" id = "4"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td>';
            print '<td>'.$registros["url"].'</td><td onClick = "altera_campo(5);" id = "5"><img src="lapis.png" widht = "3.5%" height = "3.5%"/></td></tr>';

        }
        print "</table>";

        print '<a href = "../contratacoes_editais/menu_negociacao.php"><button class="btn btn-dark">Realizar contratação de artistas para este evento</button></a>';

    }
    ?>
