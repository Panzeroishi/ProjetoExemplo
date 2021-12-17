<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Listar Dados</title>
</head>
<body>
    <div class="grid-container">

        <?php
    
    require_once('nav.php');
    
    if(isset($_POST['search'])){
        $consulta_dados =trim($_POST['dados']);
        
        $conection = new mysqli('localhost','root','','dados');
        
        #validadndo conexão ao banco
        if($conection->connect_error){
            echo 'ERRO AO CONECTAR AO BANCO';
        }
        #fim do if
        
        #comando sql executado no banco
        $sql_line = "SELECT * FROM empresas WHERE nome_empresa='$consulta_dados'";
        
        
        
        $resultados_sql=$conection->query($sql_line);
        
        if($resultados_sql){
            foreach($resultados_sql as $indice){
                $resultados_sql=$indice;
            }
        }elseif(count($indice)==0){
            echo 'dados não encontrados';
        }
        unset($_POST['search']);
        
    }
    elseif(isset($_POST['alter'])){
        $nome_alter = $_POST['nome'];
        $fantasia_alter = $_POST['fantasia'];
        $abertura_alter = $_POST['abertura_data'];
        $tipo_alter = $_POST['matriz'];
        $logradouro_alter = $_POST['logradouro'];
        $numero_alter = $_POST['numero'];
        $complemento_alter = $_POST['complemento'];
        $situacao_alter = $_POST['situacao'];
        
        $conection = new mysqli('localhost','root','','dados');
        
        if($conection->connect_error){
            echo 'Erro ao conectar ao banco de dados';
        }
        
        $sql_comand = "UPDATE empresas SET nome_empresa='$nome_alter',nome_fantasia='$fantasia_alter',
            data_abertura='$abertura_alter',matriz_filial='$tipo_alter',logradouro='$logradouro_alter',
            numero='$numero_alter',complemento='$complemento_alter',situacao='$situacao_alter'WHERE nome_empresa='$nome_alter'";
            
            
            $resultados_alter=$conection->query($sql_comand);
            if($resultados_alter){
                echo "Dados Alterados com Sucecsso";
            }else{
                echo "Erro ao alterar os dados";
            }
            $conection->close();
            
        }elseif(isset($_POST['delete'])){

            $deletar_dados=$_POST['nome'];  

            $conection = new mysqli('localhost','root','','dados');

            if($conection->connect_error){
                echo 'Erro ao conectar ao banco de dados';
            }

            $sql_comand_line = "DELETE FROM empresas WHERE nome_empresa='$deletar_dados'";

            $resultados_dele = $conection->query($sql_comand_line);

            if($resultados_dele){
                echo 'Dados deletados com Sucesso';
            }
            else{
                echo 'erro ao deletar os dados';
            }
            $conection->close();


        }
        ?>
        <div class="form3">

            <form action="#" method="post">
                <label for="">Nome da Empresa</label>
                <input type="text" name="nome" value = '<?=isset($indice['nome_empresa'])?$indice['nome_empresa']:'Nome da empresa não foi encontrado'?>'>
                <label for="">Nome Fantasia</label>
                <input type="text" name="fantasia"  value = '<?=isset($indice['nome_fantasia'])?$indice['nome_fantasia']:'Nome Fantasia Não Foi Encontrado'?>'>
                
                
                <label for="">Data de Abertura</label>
                <input type="text" name="abertura_data" value = '<?=isset($indice['data_abertura'])?$indice['data_abertura']:'Data da Abertura Não Foi Econtrada'?>'>
                
                <label for="">Matriz ou Filial</label>
                <input type="text" name="matriz" value = '<?=isset($indice['matriz_filial'])?$indice['matriz_filial']:'Matriz ou Filial Não Encontrada'?>'>
                        
                
                
                <label for="">Longradouro</label>
                <input type="text" name="logradouro" value ='<?=isset($indice['logradouro'])?$indice['logradouro']:'Logradouro não foi encontrado'?>'>
                
                
                
                <label for="">Numero</label>
                <input type="text" name="numero" value = '<?=isset($indice['numero'])?$indice['numero']:'Número não foi encontrado'?>'>
                
                
                
                
                <label for="">Complemento</label>
                <input type="text" name="complemento" value = '<?=isset($indice['complemento'])?$indice['complemento']:'Complemento não foi encontrado'?>'>
                
                
                <label for="">Situação Cadastral</label>
                <input type="text" name="situacao" value = '<?=isset($indice['situacao'])?$indice['situacao']:'Situação não foi encontrada'?>'>
                
                <input type="submit" name="alter" value="Alteraração">
                <input type="submit" name="delete" value="Deletar">
                
            </form>
                 </div>
                 <?php require_once('footer.php')?>
                </div>
                    
                </body>
                </html>