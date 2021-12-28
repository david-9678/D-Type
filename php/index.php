<?php require_once "../include.html" ?>
<main>
    <div class="main">
        <h1>Usuário cadastrado com sucesso!</h1>
            <p><?php


                require_once "config/config.php";

                echo "Bem-Vindo, " . ucwords($gNome) ."!" . "<br/>";

                echo "Seu e-mail é: " . strtolower($gEmail) . "<br/>";

                echo "Sua data de nascimento é: " . $gNasc . "<br/>";

                echo "Sua ID de Sessão é: " . $_SESSION['id'] . "<br/>";

                echo "Sua senha é: " . $gSenha . "<br/>";

                echo $gNome. " " .$gEmail. " " .$gNasc. " " .$gSenha. " " .$gCelular. " " .$gCpf. " " .$gLogradouro. " " .$gNumero. " " .$gCep. " " .$gPais. " " .$gEstado. " " .$gCidade. " " .$gBairro. "<br/>";

            ?></p>
    </div>
</main>