<?php
class ClientesDAO
{
    public function buscaCliente($nome, $orderby, $sentido)
    {
        try {
            $sql = "SELECT * FROM cliente";
            $bindValues = array();

            if (!empty($nome)) {
                $sql .= " WHERE nome LIKE :nome";
                $bindValues[':nome'] = "%{$nome}%";
            }

            if (!empty($orderby)) {
                $sql .= " ORDER BY $orderby $sentido";
            }

            $p_sql = Conexao::getInstance()->prepare($sql);

            foreach ($bindValues as $param => $value) {
                $p_sql->bindValue($param, $value);
            }

            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (Exception $e) {
            echo "Erro ao consultar Produtos: " . $e->getMessage();
        }
    }

    public function inserirCliente($clientes)
    {
        try {
            $sql = "INSERT INTO cliente (nome, cpf_cnpj, telefone, email, cep, cidade, bairro, logradouro, numero) values (:nome, :cpf_cnpj, :telefone, :email, :cep, :cidade, :bairro, :logradouro, :numero)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql -> bindValue(":nome", $clientes->getNome());
            $p_sql -> bindValue(":cpf_cnpj", $clientes->getCpf_cnpj());
            $p_sql -> bindValue(":telefone", $clientes->getTelefone());
            $p_sql -> bindValue(":email", $clientes->getEmail());
            $p_sql -> bindValue(":cep", $clientes->getCep());
            $p_sql -> bindValue(":cidade", $clientes->getCidade());
            $p_sql -> bindValue(":bairro", $clientes->getBairro());
            $p_sql -> bindValue(":logradouro", $clientes->getLogradouro());
            $p_sql -> bindValue(":numero", $clientes->getNumero());

            if ($p_sql->execute()) {
                $response['message'] = 'Produto cadastrado com sucesso';
            } else {
                $response['error'] = 'Erro ao cadastrar o produto';
            }
        } catch (Exception $e) {
            $response['error'] = 'Erro ao cadastrar produto: ' . $e->getMessage();
        }
        
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function alterarCliente($clientes)
    {
        try {
            $sql = "UPDATE cliente SET 
            nome = :nome, 
            cpf_cnpj = :cpf_cnpj, 
            telefone = :telefone, 
            email = :email, 
            cep = :cep, 
            cidade = :cidade, 
            bairro = :bairro, 
            logradouro = :logradouro, 
            numero = :numero 
            WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql -> bindValue(":nome", $clientes->getNome());
            $p_sql -> bindValue(":cpf_cnpj", $clientes->getCpf_cnpj());
            $p_sql -> bindValue(":telefone", $clientes->getTelefone());
            $p_sql -> bindValue(":email", $clientes->getEmail());
            $p_sql -> bindValue(":cep", $clientes->getCep());
            $p_sql -> bindValue(":cidade", $clientes->getCidade());
            $p_sql -> bindValue(":bairro", $clientes->getBairro());
            $p_sql -> bindValue(":logradouro", $clientes->getLogradouro());
            $p_sql -> bindValue(":numero", $clientes->getNumero());
            $p_sql -> bindValue(":id", $clientes->getId());

            if ($p_sql -> execute()) {
                $response["message"] = "Cliente alterado com sucesso";
            } else {
                $response["error"] = "Erro ao alterar cliente";
            }
        } catch (Exception $e) {
            $response["error"] = 'Erro ao alterar cliente: ' . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function removerCliente($id)
    {
        try {
            $sql = "DELETE FROM cliente WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql -> bindValue(":id", $id);

            if ($p_sql -> execute()) {
                $response["message"] = "Cliente removido com sucesso";
            } else {
                $response["error"] = "Erro ao remover cliente";
            }
            //return $p_sql -> execute();
        } catch (Exception $e) {
            $response["error"] = "Erro ao remover produto: " . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}