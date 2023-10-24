<?php 
    require_once("../model/conexao.class.php");
    require_once("../controller/produtosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    $nome = $_GET['nome'];
    $dao = new ProdutosDAO();

    $lista = $dao -> buscaProduto($nome);

    $json = json_encode($lista);
    echo $json;

?>