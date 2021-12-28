<?php 
            //Neumorfismo
            //https://neumorphism.io/#f4a9a9
            //https://cssbuttons.io/buttonss

interface Usuario{
                
                public function getNome();
                public function setNome($nome);
                public function getEmail();
                public function setEmail($email);
                public function getNascimento();
                public function setNascimento($nascimento);
                public function getSenha();
                public function setSenha($senha);
                public function getCelular();
                public function setCelular($celular);
                public function getCpf();
                public function setCpf($cpf);
                public function getLogradouro();
                public function setLogradouro($logradouro);
                public function getNumero();
                public function setNumero($numero);
                public function getCep();
                public function setCep($cep);
                public function getPais();
                public function setPais($pais);
                public function getEstado();
                public function setEstado($estado);
                public function getCidade();
                public function setCidade($cidade);
                public function getBairro();
                public function setBairro($bairro);
                public function exibir();
                
            }

 ?>