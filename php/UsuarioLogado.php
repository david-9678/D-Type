<?php 

class UsuarioLogado extends Logado{

    public function exibir(){

        return array(
            $uNome=>$this->getNome(),
            $uEmail=>$this->getEmail(),
            $uNascimento=>$this->getNascimento(),
            $uSenha=>$this->getSenha(),
            $uCelular=>$this->getCelular(),
            $uCpf=>$this->getCpf(),
            $uLogradouro=>$this->getLogradouro(),
            $uNumero=>$this->getNumero(),
            $uCep=>$this->getCep(),
            $uPais=>$this->getPais(),
            $uEstado=>$this->getEstado(),
            $uCidade=>$this->getCidade(),
            $uBairro=>$this->getBairro(),
            );
    }
}

 ?>