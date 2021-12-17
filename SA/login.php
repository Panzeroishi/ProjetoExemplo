<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estili.css">
    <title>Document</title>
</head>
<body>
    <?php

    require_once('./nav.php');
    ?>







<?php
    include "conexao.php";
    
    
    if(isset($_POST['email']) || isset($_POST['senha'])){
        //strlen verifica a quantidade de caracteres
        if(strlen($_POST['email']) == 0){
            echo "Preencha seu email";
        } else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        } else{
            //Função do mysql para limpar os campos real_escape_string
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            
            $sql_code = "select * from usuario where email = '$email' and senha = '$senha'";
            
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL". $mysqli -> error);
            
            $quantidade = $sql_query -> num_rows;
            
            if($quantidade == 1){
                $usuario = $sql_query -> fetch_assoc();
                
                if(!isset($_session)){
                    session_start();
                }
                
                //A variavel session continua válida mesmo trocando de página por um determinado periodo de tempo
                $_session['id'] = $usuario['id'];
                $_session['nome'] = $usuario['nome'];
                
                //header redireciona o usuario
                echo "<h1>Login feito com sucesso</h1>";
                //header("location : home.php");              
            } else{
                echo "<h1>Falha ao logar! E-mail ou senha incorretos</h1>.";
            }
        }
    }
    ?>
    <div class="container">

    <h1>Acesse a sua conta</h1>
    <form action="" method="post">
        <label>Email</label>
        <input name="email" type="email">
        
        <label>Senha</label>
        <input name="senha" type="password">
        
        <button type="submit">Entrar</button>
    </form>
    <P>
        Não tem uma conta?
        <a href="CadastroUsuario.php">Cadastra-se</a>
    </P>
</div>
    <?php

require_once "footer.php";
 
?>
</body>
</html>