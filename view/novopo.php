<?php
require_once("../model/conexao.class.php");
require_once("../model/produtos_orcamento.class.php");
require_once("../controller/produtos_orcamentoDAO.class.php");

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$body = file_get_contents('php://input');

$produtos_orcamento = new Produtos_orcamento();
$dao = new Produtos_orcamentoDAO();

$jsonBody = json_decode($body, true);

if (empty($jsonBody)) {
    $produtos_orcamento->setId_orcamento($_POST['id_orcamento']);
    $produtos_orcamento->setId_produto($_POST['id_produto']);
    $produtos_orcamento->setQuantidade($_POST['quantidade']);
    $produtos_orcamento->setValor($_POST['valor']);
} else {
    $produtos_orcamento->setId_orcamento($jsonBody['id_orcamento']);
    $produtos_orcamento->setId_produto($jsonBody['id_produto']);
    $produtos_orcamento->setQuantidade($jsonBody['quantidade']);
    $produtos_orcamento->setValor($jsonBody['valor']);
}

$dao->inserirPO($produtos_orcamento);
