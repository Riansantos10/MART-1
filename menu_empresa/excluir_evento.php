<?php 
    //excluir o evento

    include("../base_de_dados/conexao.php");

    $id = $_POST["id_excludente"];
    session_start();

    $cnpj = $_SESSION["cnpj"];

    $SQL = 'DELETE FROM eventos WHERE id_evento = '.$id.' AND cnpj_empresa = '.$cnpj.';';

    $query = mysqli_query($conexao, $SQL);

    //print $SQL;

    mysqli_close($conexao);


?>