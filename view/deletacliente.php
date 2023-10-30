<?php

 require_once("../model/conexao.class.php");
 require_once("../model/clientes.class.php");
 require_once("../controller/clientesDAO.class.php");

 $id = $_GET['id'];
 $dao = new ClientesDAO();

 $dao->removerCliente($id);
 
 ?>