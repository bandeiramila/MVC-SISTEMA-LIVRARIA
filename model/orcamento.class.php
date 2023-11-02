<?php
class Orcamento
{
    private $id;
    private $id_cliente;
    private $empenho;
    private $data_solicitacao;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
        return $this;
    }

    public function getEmpenho()
    {
        return $this->empenho;
    }

    public function setEmpenho($empenho)
    {
        $this->empenho = $empenho;
        return $this;
    }

    public function getData_solicitacao()
    {
        return $this->data_solicitacao;
    }

    public function setData_solicitacao($data_solicitacao)
    {
        $this->data_solicitacao = $data_solicitacao;
        return $this;
    }
}
