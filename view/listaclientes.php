<?php
    require_once("../model/conexao.class.php");
    require_once("../controller/clientesDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    if (isset($_GET['nome'])) {
        $nome = $_GET['nome'];
    } else {
        $nome = '';
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = '';
    }

    $dao = new ClientesDAO();

    $lista = $dao -> buscaCliente($nome, $ordem, $sentido, $id);

    $json = json_encode($lista);
    echo $json;