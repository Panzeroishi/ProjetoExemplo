<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="grid-container">

        <?php
    require_once('nav.php');
    if(isset($_POST['consultar'])){
        
        #capturando os dados do index para variaveis
        $cnpj=trim($_POST['CNPJ']);
        $link = "https://www.receitaws.com.br/v1/cnpj/$cnpj";
        $inicio = curl_init($link);
        
        #decoreba para json
        curl_setopt($inicio,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($inicio, CURLOPT_SSL_VERIFYPEER, false);
        $resultados_cnpj=json_decode(curl_exec($inicio));
        
        #jogando todos os valores da api para key
        foreach($resultados_cnpj as $key=>$dados_cnpj){
            $$key=$dados_cnpj;
            
            #apagando o valor do botão enviar no index
            unset($_POST['consultar']);
        }
        curl_close($inicio);
        
        
        
    }elseif(isset($_POST['cadastrar'])){
        
        $nome_cnpj = trim($_POST['empresa']);
        $fantasia_cnpj = trim($_POST['fantasia']);
        $abertura_cnpj = trim($_POST['abertura_data']);
        $tipo_cnpj = trim($_POST['matriz']);
        $logradouro_cnpj = trim($_POST['logradouro']);
        $numero_cnpj = trim($_POST['numero']);
        $complemento_cnpj = trim($_POST['complemento']);
        $status_cnpj = trim($_POST['situacao']);
        
        
        $conection = new mysqli('localhost','root','','dados');
        
        #if verificação para conectar ao banco de dados
        if($conection->connect_error){
            echo 'Problema ao Conectar ao Banco de Dados';
        }
        #fim do if
        
        #linha sql
        $sql_comand ="INSERT INTO empresas(nome_empresa, nome_fantasia, data_abertura, matriz_filial, logradouro, numero, complemento, situacao)
            VALUES('$nome_cnpj','$fantasia_cnpj','$abertura_cnpj','$tipo_cnpj','$logradouro_cnpj','$numero_cnpj','$complemento_cnpj','$status_cnpj')";

#executando linha de sql e conexão ao banco
$sql_resultados = $conection->query($sql_comand);

#if para validar se query foi executada com sucesso ou não
if($sql_resultados==TRUE){
    Echo 'Dados cadastrados com Sucesso';
}else{
    echo 'Erro ao cadastrar'.$conection->connect_error;
}
#fim do if
$conection->close();
}


?>

<div class="form3">
    
    <form action="#" method="post">
        
        <label for="">Nome</label>
        <input type="text" name="empresa"   value ="<?= isset($nome)?$nome:''?>">
        
        
        <label for="">Nome Fantasia</label>
        <input type="text" name="fantasia"  value = '<?=isset($fantasia)?$fantasia:''?>'>
            
        
        <label for="">Data de Abertura</label>
        <input type="text" name="abertura_data" value = '<?=isset($abertura)?$abertura:''?>'>
        
        <label for="">Matriz ou Filial</label>
        <input type="text" name="matriz" value = '<?=isset($tipo)?$tipo:''?>'>
        
        
        
        <label for="">Longradouro</label>
        <input type="text" name="logradouro" value ='<?= isset($logradouro)?$logradouro:''?>'>
        
        
        
        <label for="">Numero</label>
        <input type="text" name="numero" value = '<?=isset($numero)?$numero:''?>'>
        
        
        
        
        <label for="">Complemento</label>
        <input type="text" name="complemento" value = '<?=isset($complemento)?$complemento:''?>'>
        
        
        <label for="">Situação Cadastral</label>
        <input type="text" name="situacao" value = '<?=isset($status)?$status:''?>'>
        
        
        <input type="submit" value="Inserir" name="cadastrar">
    </form>
</div>

</div>


<?php

require_once('footer.php');

?>


</body>
</html>