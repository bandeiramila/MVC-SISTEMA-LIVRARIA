<?php
    require_once("../model/conexao.class.php");
    require_once("../model/produtos.class.php");
    require_once("../controller/produtosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    $body = file_get_contents('php://input');
    
    $produtos = new Produtos();
    $dao = new ProdutosDAO();
    
    $jsonBody = json_decode($body, true);

    if(empty($jsonBody)){
        $produtos->setNome_produto($_POST['nome_produto']);
        $produtos->setCodigo_de_barras($_POST['codigo_de_barras']);
        $produtos->setQuantidade($_POST['quantidade']);
        $produtos->setValor($_POST['valor']);
    }else{
        $produtos->setNome_produto($jsonBody['nome_produto']);
        $produtos->setCodigo_de_barras($jsonBody['codigo_de_barras']);
        $produtos->setQuantidade($jsonBody['quantidade']);
        $produtos->setValor($jsonBody['valor']);
    }

    $dao->inserirProduto($produtos);


?>