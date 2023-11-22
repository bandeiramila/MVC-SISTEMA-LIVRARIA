<?php
require_once("../model/conexao.class.php");
require_once("../controller/produtos_orcamentoDAO.class.php");

header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

//NESTA CONFIGURAÇÃO, NÃO É POSSIVEL PESQUISA DIGITADA

if (isset($_GET['id_orcamento'])) {
    $id = $_GET['id_orcamento'];
} else {
    $id = '';
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

$dao = new Produtos_orcamentoDAO();

$lista = $dao->buscaProdutoOrcamento($id, $ordem, $sentido);

$json = json_encode($lista);
echo $json;
