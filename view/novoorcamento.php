<?php
    require_once("../model/conexao.class.php");
    require_once("../model/orcamento.class.php");
    require_once("../controller/orcamentosDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    $body = file_get_contents('php://input');
    
    $orcamentos = new Orcamento();
    $dao = new OrcamentosDAO();
    
    $jsonBody = json_decode($body, true);

    if(empty($jsonBody)){
        $orcamentos->setId_cliente($_POST['id_cliente']);
        $orcamentos->setEmpenho($_POST['empenho']);
        $orcamentos->setData_solicitacao($_POST['data_solicitacao']);
    }else{
        $orcamentos->setId_cliente($jsonBody['id_cliente']);
        $orcamentos->setEmpenho($jsonBody['empenho']);
        $orcamentos->setData_solicitacao($jsonBody['data_solicitacao']);
    }

    $dao->inserirOrcamento($orcamentos);

?>