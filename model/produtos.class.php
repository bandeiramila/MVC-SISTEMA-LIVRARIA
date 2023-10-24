<?php 
    class Produtos{
        private $id;
        private $nome_produto;
        private $codigo_de_barras;
        private $quantidade;
        private $valor;

        public function getId() {
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        
        public function getNome_produto() {
            return $this->nome_produto;
        }
        public function setNome_produto($nome_produto){
            $this->nome_produto = $nome_produto;
        }

        public function getCodigo_de_barras(){
            return $this->codigo_de_barras;
        }
        public function setCodigo_de_barras($codigo_de_barras){
            $this->codigo_de_barras = $codigo_de_barras;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function getValor(){
            return $this->valor;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }
    }

?>