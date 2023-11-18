<?php
require_once("../model/conexao.class.php");
require_once("../model/produtos_orcamento.class.php");
require_once("../controller/produtos_orcamentoDAO.class.php");

$id = $_GET['id'];
$dao = new Produtos_orcamentoDAO();

$dao->removerPO($id);
