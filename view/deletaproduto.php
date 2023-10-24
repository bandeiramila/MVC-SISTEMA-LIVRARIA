<?php

require_once("../model/conexao.class.php");
require_once("../model/produtos.class.php");
require_once("../controller/produtosDAO.class.php");

$id = $_GET['id'];
$dao = new ProdutosDAO();

$dao->removerProduto($id);

?>