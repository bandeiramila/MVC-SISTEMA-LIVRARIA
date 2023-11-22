<?php
class Produtos_orcamentoDAO
{
    public function buscaPO($id_orcamento, $orderby, $sentido)
    {
        try {
            $sql = "SELECT * FROM produtos_orcamento";
            $bindValues = array();

            if (!empty($id_orcamento)) {
                $sql .= " WHERE id_orcamento LIKE :id_orcamento";
                $bindValues[":id_orcamento"] = "%{$id_orcamento}%";
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
            echo "Erro ao consultar produtos do orçamento: " . $e->getMessage();
        }
    }

    public function buscaProdutoOrcamento($id_orcamento, $orderby, $sentido)
    {
        try {
            $sql = "SELECT distinct po.id, po.id_produto, po.id_orcamento, p.nome_produto, po.quantidade, po.valor_unitario from produto p join produtos_orcamento po on p.id = po.id_produto";
            $bindValues = array();

            if (!empty($id_orcamento)) {
                $sql .= " where po.id_orcamento like :id";
                $bindValues[":id"] = "%{$id_orcamento}%";
            }
            if (!empty($orderby)) {
                $sql .= " order by $orderby $sentido";
            }
            $p_sql = Conexao::getInstance()->prepare($sql);
            foreach($bindValues as $param => $value) {
                $p_sql -> bindValue($param, $value);
            }
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (Exception $e) {
            echo "Erro ao consultar produtos do orçamento: " . $e -> getMessage();
        }
    }

    public function inserirPO($produtos_orcamento)
    {
        try {
            $sql = "INSERT INTO produtos_orcamento (id_orcamento, id_produto, quantidade, valor_unitario) values (:id_orcamento, :id_produto, :quantidade, :valor_unitario)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id_orcamento", $produtos_orcamento->getId_orcamento());
            $p_sql->bindValue(":id_produto", $produtos_orcamento->getId_produto());
            $p_sql->bindValue(":quantidade", $produtos_orcamento->getQuantidade());
            $p_sql->bindValue(":valor_unitario", $produtos_orcamento->getValor());

            if ($p_sql->execute()) {
                $response['message'] = 'Produto cadastrado no orçamento com sucesso';
            } else {
                $response['error'] = 'Erro ao cadastrar produto no orçamento';
            }
        } catch (Exception $e) {
            $response['error'] = 'Erro ao cadastrar produto no orçamento: ' . $e->getMessage();
        }

        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function alterarPO($produtos_orcamento)
    {
        try {
            $sql = "UPDATE produtos_orcamento SET quantidade = :quantidade, valor_unitario = :valor WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":quantidade", $produtos_orcamento->getQuantidade());
            $p_sql->bindValue(":valor", $produtos_orcamento->getValor());
            $p_sql->bindValue(":id", $produtos_orcamento->getId());

            if ($p_sql->execute()) {
                $response["message"] = "Produto alterado com sucesso";
            } else {
                $response['error'] = 'Erro ao alterar produto';
            }
        } catch (Exception $e) {
            $response['error'] = 'Erro ao alterar produto: ' . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function removerPO($id)
    {
        try {
            $sql = 'DELETE FROM produtos_orcamento WHERE id = :id';
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(':id', $id);
            if ($p_sql -> execute()) {
                $response["message"] = "Produto removido do orçamento com sucesso";
            } else {
                $response["error"] = "Erro ao remover produto do orçamento";
            }
        } catch (Exception $e) {
            $response["error"] = "Erro ao remover produto do orçamento: " . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
