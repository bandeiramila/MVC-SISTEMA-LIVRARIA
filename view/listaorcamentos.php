<?php 
    require_once("../model/conexao.class.php");
    require_once("../controller/orcamentosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    if (isset($_GET['id_cliente'])) {
        $nome = $_GET['id_cliente'];
    } else {
        $nome = '';
    }    
    if (isset($_GET['orderby'])) {
        $ordem = $_GET['orderby'];
    } else {
        $ordem = '';
    }
    if (isset($_GET['sentido'])) {
        $sentido = $_GET['sentido'];
    } else {
        $sentido = '';
    }

    $dao = new OrcamentosDAO();

    $lista = $dao -> buscaOrcamento($nome, $ordem, $sentido);

    $json = json_encode($lista);
    echo $json;

?>