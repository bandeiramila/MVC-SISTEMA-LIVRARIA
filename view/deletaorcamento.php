<?php

require_once("../model/conexao.class.php");
require_once("../model/orcamento.class.php");
require_once("../controller/orcamentosDAO.class.php");

$id = $_GET['id'];
$dao = new OrcamentosDAO();

$dao->removerOrcamento($id);

?>