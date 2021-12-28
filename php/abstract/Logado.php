<?php 

abstract class Logado implements Usuario{
                
    private $nome;
    private $email;
    private $nascimento;
    private $senha;
    private $celular;
    private $cpf;
    private $logradouro;
    private $numero;
    private $cep;
    private $pais;
    private $estado;
    private $cidade;
    private $bairro;
    
    public function getNome(){

        return $this->nome;

    }

    public function setNome($nome){

        $this->nome = $nome;

    }

    public function getEmail(){

        return $this->email;

    }

    public function setEmail($email){

        $resultado = Logado::validarEmail($email);

        if ($resultado === false) {

            throw new Exception("Email inválido!", 1);

        }

        $this->email = $email;

    }

    public function getNascimento(){

        return $this->nascimento;

    }

    public function setNascimento($nascimento){

        $this->nascimento = $nascimento;

    }

    public function getSenha(){

        return $this->senha;

    }

    public function setSenha($senha){

        $this->senha = $senha;

    }

    public function getCelular(){

        return $this->celular;

    }

    public function setCelular($celular){

        $resultado = Logado::validarCelular($celular);

        if ($resultado === null) {

            throw new Exception("Celular inválido!", 1);

        }

        $this->celular = $celular;

    }

    public function getCpf(){

        return $this->cpf;

    }

    public function setCpf($cpf){

        $resultado = Logado::validarCPF($cpf);

        if ($resultado === false) {

            throw new Exception("CPF informado não é válido!", 1);
            

        }

        $this->cpf = $cpf;

    }

    public function getLogradouro(){

        return $this->logradouro;

    }

    public function setLogradouro($logradouro){

        $this->logradouro = $logradouro;

    }

    public function getNumero(){

        return $this->numero;

    }

    public function setNumero($numero){

        $this->numero = $numero;

    }

    public function getCep(){

        return $this->cep;

    }

    public function setCep($cep){

        $this->cep = $cep;

    }

    public function getPais(){

        return $this->pais;

    }

    public function setPais($pais){

        $this->pais = $pais;

    }

    public function getEstado(){

        return $this->estado;

    }

    public function setEstado($estado){

        $this->estado = $estado;

    }

    public function getCidade(){

        return $this->cidade;

    }

    public function setCidade($cidade){

        $this->cidade = $cidade;

    }

    public function getBairro(){

        return $this->bairro;

    }

    public function setBairro($bairro){

        $this->bairro = $bairro;

    }

//============================================|

    public static function validarEmail($email):bool{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    public static function validarCPF($cpf):bool{
        //Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
        //Elimina possível Máscara
        $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
         
        //Verifica se o número de dígitos informado é igual a 11
        if (strlen($cpf) != 11) {
            echo "length";
            return false;
        }
        //verifica se nenhuma das sequências inválidas abaixo
        //foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
        //Calcula os dígitos verificadores para verificar se o CPF é válido
        } else {   
             
            for ($t = 9; $t < 11; $t++) {
                 
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
     
            return true;
        }
    }

    public static function validarCelular(string $celular, bool $forceOnlyNumber = true) : ?array{
//Exemplos válidos: +55 (21) 98888-8888 / 9999-9999 / 21 98888-8888 / 5511988888888 / +55 (021) 98888-8888 / 021 99995-3333 || https://gist.github.com/mariojrrc/dbd39fc810355c62323d922e42c65e42
        $celular = preg_replace('/[()]/', '', $celular);
    if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([0-0]?[0-9]{1}[0-9]{1})\)?\s?)??(?:((?:9\d|[2-9])\d{3}\-?\d{4}))$/', $celular, $matches) === false) {
        return null;
    }

    $ddi = $matches[1] ?? '';
    $ddd = preg_replace('/^0/', '', $matches[2] ?? '');
    $number = $matches[3] ?? '';
    if ($forceOnlyNumber === true) {
        $number = preg_replace('/-/', '', $number);
    }

    return ['ddi' => $ddi, 'ddd' => $ddd , 'number' => $number];

    }

}
?>