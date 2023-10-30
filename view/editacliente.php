<?php 
    require_once("../model/conexao.class.php");
    require_once("../model/clientes.class.php");
    require_once("../controller/clientesDAO.class.php");

    header("Cache-Control: no-cache, no-store, must-revalidate"); //limpa cache
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    $body = file_get_contents('php://input');

    $clientes = new Clientes();
    $dao = new ClientesDAO();

    $jsonBody = json_decode($body, true);

    if(empty($jsonBody)) {
        $clientes->setId($_POST['id']);
        $clientes->setNome($_POST['nome']);
        $clientes->setCpf_cnpj($_POST['cpf_cnpj']);
        $clientes->setTelefone($_POST['telefone']);
        $clientes->setEmail($_POST['email']);
        $clientes->setCep($_POST['cep']);
        $clientes->setCidade($_POST['cidade']);
        $clientes->setBairro($_POST['bairro']);
        $clientes->setLogradouro($_POST['logradouro']);
        $clientes->setNumero($_POST['numero']);
    }else{
        $clientes->setId($jsonBody['id']);
        $clientes->setNome($jsonBody['nome']);
        $clientes->setCpf_cnpj($jsonBody['cpf_cnpj']);
        $clientes->setTelefone($jsonBody['telefone']);
        $clientes->setEmail($jsonBody['email']);
        $clientes->setCep($jsonBody['cep']);
        $clientes->setCidade($jsonBody['cidade']);
        $clientes->setBairro($jsonBody['bairro']);
        $clientes->setLogradouro($jsonBody['logradouro']);
        $clientes->setNumero($jsonBody['numero']);
    }

    $dao -> alterarCliente($clientes);