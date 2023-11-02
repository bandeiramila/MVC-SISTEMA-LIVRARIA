<?php 
class OrcamentosDAO
{
    public function buscaOrcamento($id_cliente, $orderby, $sentido)
    {
        try {
            $sql = "SELECT * FROM orcamento";
            $bindValues = array();

            if (!empty($id_cliente)) {
                $sql .= " WHERE id_cliente LIKE :id_cliente";
                $bindValues[":id_cliente"] = "%{$id_cliente}%";
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
            echo "Erro ao consultar orçamentos: " . $e->getMessage();
        }
    }

    public function inserirOrcamento($clientes)
    {
        try {
            $data = $clientes->getData_solicitacao();

            $sql = "INSERT INTO orcamento (id_cliente, empenho, data_solicitacao) values ";

            if (empty($data)) {
                $sql .= "(:id_cliente, :empenho, curdate())";
            } else {
                $sql .= "(:id_cliente, :empenho, :data_solicitacao)";
            }

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql -> bindValue(":id_cliente", $clientes->getId_cliente());
            $p_sql -> bindValue(":empenho", $clientes->getEmpenho());
            
            if (!empty($data)) {
                $p_sql->bindValue(":data_solicitacao", $data);
            }

            if ($p_sql -> execute()) {
                $response['message'] = 'Orçamento cadastrado com sucesso';
            } else {
                $response['error'] = 'Erro ao cadastrar orçamento';
            }
        } catch (Exception $e) {
            $response['error'] = 'Erro ao cadastrar orçamento: ' . $e->getMessage();
        }

        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function alterarOrcamento($clientes)
    {
        try {
            $data = $clientes->getData_solicitacao();

            $sql = "UPDATE orcamento SET id_cliente = :id_cliente, empenho = :empenho, ";

            if (empty($data)) {
                $sql .= "data_solicitacao = curdate() WHERE id = :id";
            } else {
                $sql .= "data_solicitacao = :data_solicitacao WHERE id = :id";
            }

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id_cliente", $clientes->getId_cliente());
            $p_sql->bindValue(":empenho", $clientes->getEmpenho());
            $p_sql->bindValue(":id", $clientes->getId());

            if (!empty($data)) {
                $p_sql->bindValue(":data_solicitacao", $data);
            }

            if ($p_sql->execute()) {
                $response['message'] = 'Orçamento alterado com sucesso';
            } else {
                $response['error'] = 'Erro ao alterar orçamento';
            }
        } catch (Exception $e) {
            $response['error'] = 'Erro ao alterar orçamento: ' . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function removerOrcamento($id)
    {
        try {
            $sql = "DELETE FROM orcamento WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            if ($p_sql -> execute()) {
                $response["message"] = "Orçamento removido com sucesso";
            } else {
                $response["error"] = "Erro ao remover orçamento";
            }
            //return $p_sql -> execute();
        } catch (Exception $e) {
            $response["error"] = "Erro ao remover orçamento: " . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
?>