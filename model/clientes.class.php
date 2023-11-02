<?php
class Clientes
{
	private $id;
	private $nome;
	private $cpf_cnpj;
	private $telefone;
	private $email;
	private $cep;
	private $cidade;
	private $bairro;
	private $logradouro;
	private $numero;

	public function getId()
	{
		return $this->id;
	}
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}
	public function getCpf_cnpj()
	{
		return $this->cpf_cnpj;
	}
	public function setCpf_cnpj($cpf_cnpj)
	{
		$this->cpf_cnpj = $cpf_cnpj;
		return $this;
	}
	public function getTelefone()
	{
		return $this->telefone;
	}
	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
		return $this;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
	public function getCep()
	{
		return $this->cep;
	}
	public function setCep($cep)
	{
		$this->cep = $cep;
		return $this;
	}
	public function getCidade()
	{
		return $this->cidade;
	}
	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
		return $this;
	}
	public function getBairro()
	{
		return $this->bairro;
	}
	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
		return $this;
	}
	public function getLogradouro()
	{
		return $this->logradouro;
	}
	public function setLogradouro($logradouro)
	{
		$this->logradouro = $logradouro;
		return $this;
	}
	public function getNumero()
	{
		return $this->numero;
	}
	public function setNumero($numero)
	{
		$this->numero = $numero;
		return $this;
	}
}
