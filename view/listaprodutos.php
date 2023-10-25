<?php 
    require_once("../model/conexao.class.php");
    require_once("../controller/produtosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    if (isset($_GET['nome'])) {
        $nome = $_GET['nome'];
    } else {
        $nome = ''; // Ou qualquer valor padrão que você deseja usar
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

    $dao = new ProdutosDAO();

    $lista = $dao -> buscaProduto($nome, $ordem, $sentido);

    $json = json_encode($lista);
    echo $json;

?>