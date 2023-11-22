<?php 
    require_once("../model/conexao.class.php");
    require_once("../controller/orcamentosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    if (isset($_GET['cliente'])) {
        $nome = $_GET['cliente'];
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
    if (isset($_GET['last_id'])) {
        $last_id = $_GET['last_id'];
    } else {
        $last_id = '';
    }

    $dao = new OrcamentosDAO();

    $lista = $dao -> buscaOrcamento($nome, $ordem, $sentido, $last_id);

    $json = json_encode($lista);
    echo $json;

?>