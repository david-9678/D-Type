<?php

setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8","portuguese");

function incluirClasses($nomeClasse) {

	if(file_exists($nomeClasse.".php") === true){
		require_once($nomeClasse.".php");
	}

}

spl_autoload_register("incluirClasses");
spl_autoload_register(function($nomeClasse){

	if(file_exists("abstract" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true) {
		require_once("abstract" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");
	}

});

//POST METHOD

$logado = new UsuarioLogado();

    $logado->setNome($_POST["nome"]);
    $logado->setEmail($_POST["email"]);
    $logado->setNascimento($_POST["nascimento"]);
    $logado->setSenha($_POST["senha"]);
    $logado->setCelular($_POST["celular"]);
    $logado->setCpf($_POST["cpf"]);
    $logado->setLogradouro($_POST["logradouro"]);
    $logado->setNumero($_POST["numero"]);
    $logado->setCep($_POST["cep"]);
    $logado->setPais($_POST["pais"]);
    $logado->setEstado($_POST["estado"]);
    $logado->setCidade($_POST["cidade"]);
    $logado->setBairro($_POST["bairro"]);
    
    $gNome = $logado->getNome();
    $gEmail = $logado->getEmail();
    $gNasc = $logado->getNascimento();
    $gSenha = $logado->getSenha();
    $gCelular = $logado->getCelular();
    $gCpf = $logado->getCpf();
    $gLogradouro = $logado->getLogradouro();
    $gNumero = $logado->getNumero();
    $gCep = $logado->getCep();
    $gPais = $logado->getPais();
    $gEstado = $logado->getEstado();
    $gCidade = $logado->getCidade();
    $gBairro = $logado->getBairro();

//SESSION CONFIG
if (isset($_SESSION['id'])) {
	session_unset($_SESSION['id']);
}
session_start();

$_SESSION['nome'] = $gNome;
$_SESSION['id'] = session_id();

$gSession = $_SESSION['id'];

//DATABASE CONFIG

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "Mysql31840615#");

$stmt = $conn->prepare("INSERT INTO tb_users (nome, email, nascimento, senha, celular, cpf, logradouro, numero, cep, pais, estado, cidade, bairro)VALUES (:NOME, :EMAIL, :NASC, :SENHA, :CELULAR, :CPF, :LOGRADOURO, :NUMERO, :CEP, :PAIS, :ESTADO, :CIDADE, :BAIRRO)");

$nome = $gNome;
$email = $gEmail;
$nascimento = $gNasc;
$senha = $gSenha;
$celular = $gCelular;
$cpf = $gCpf;
$logradouro = $gLogradouro;
$numero = $gNumero;
$cep = $gCep;
$pais = $gPais;
$estado = $gEstado;
$cidade = $gCidade;
$bairro = $gBairro;

$stmt->bindParam(":NOME", $nome);
$stmt->bindParam(":EMAIL", $email);
$stmt->bindParam(":NASC", $nascimento);
$stmt->bindParam(":SENHA", $senha);
$stmt->bindParam(":CELULAR", $celular);
$stmt->bindParam(":CPF", $cpf);
$stmt->bindParam(":LOGRADOURO", $logradouro);
$stmt->bindParam(":NUMERO", $numero);
$stmt->bindParam(":CEP", $cep);
$stmt->bindParam(":PAIS", $pais);
$stmt->bindparam(":ESTADO", $estado);
$stmt->bindParam(":CIDADE", $cidade);
$stmt->bindParam(":BAIRRO", $bairro);

$stmt->execute();

 ?>