<?php
class ProdutosDAO
{
    public function buscaProduto($nome)
    {
        try {
            $sql = "SELECT * FROM produto WHERE nome_produto LIKE :nome";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", "%{$nome}%");
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } catch (Exception $e) {
            echo "Erro ao consultar Produtos: " . $e->getMessage();
        }
    }

    public function inserirProduto($produtos)
    {
        //$response = array();
        try {
            $sql = "INSERT INTO produto (nome_produto, codigo_de_barras, quantidade, valor) values(:nome, :codigo, :quantidade, :valor)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produtos->getNome_produto());
            $p_sql->bindValue(":codigo", $produtos->getCodigo_de_barras());
            $p_sql->bindValue(":quantidade", $produtos->getQuantidade());
            $p_sql->bindValue(":valor", $produtos->getValor());

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

    public function alterarProduto($produtos)
    {
        try {
            $sql = "UPDATE produto SET nome_produto = :nome, codigo_de_barras = :codigo, quantidade = :quantidade, valor = :valor WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":nome", $produtos->getNome_produto());
            $p_sql->bindValue(":codigo", $produtos->getCodigo_de_barras());
            $p_sql->bindValue(":quantidade", $produtos->getQuantidade());
            $p_sql->bindValue(":valor", $produtos->getValor());
            $p_sql->bindValue(":id", $produtos->getId());

            if ($p_sql->execute()) {
                $response['message'] = 'Produto alterado com sucesso';
            } else {
                $response['error'] = 'Erro ao alterar produto';
            }
            //return $p_sql->execute();
            //echo "alterado" . Exception->getMessage();
        }catch (Exception $e) {
            $response['error'] = 'Erro ao alterar produto: ' . $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }

    public function removerProduto($id)
    {
        try{
            $sql = "DELETE FROM produto WHERE id = :id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao remover produto: " . $e->getMessage();
        }
    }




}


?>