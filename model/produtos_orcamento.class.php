<?php
class Produtos_orcamento
{
    private $id;
    private $id_orcamento;
    private $id_produto;
    private $quantidade;
    private $valor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId_orcamento()
    {
        return $this->id_orcamento;
    }

    public function setId_orcamento($id_orcamento)
    {
        $this->id_orcamento = $id_orcamento;
    }

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
}
