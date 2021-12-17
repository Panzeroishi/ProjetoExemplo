<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Home</title>
</head>
<body>
    
    <div class="grid-container">
    
    <nav>
    <a href="index.php">Home</a>
    <a href="./login.php">CPF</a>
    <a href="./CadastroCPF.php">Cadastra CPF</a>
    </nav>


    <div class="form1">

        <form action="consultar.php" method="post">
            
            <H2>Pesquisar CNPJ</H2>
            <input type="text" name="CNPJ" placeholder="Pesquisar o CNPJ">
            
            <input type="submit" name="consultar">
            
            
            
            
        </form>
    </div>
    

    <div class="form2">
        
        <form action="listar_dados.php" method="post">
            
            <h2>Pesquisar Dados</h2>
            <input type="text" placeholder="Pesquisa Aqui" name="dados">
            <input type="submit" name="search">
            
            
        </form>
    </div>

    <footer>
        <a href="https://www.linkedin.com/in/diogo-oishi-78a1b31a1/" target="_blanck">Diogo Oishi</a>
        <a href="https://www.linkedin.com/in/matheus-canuto-/" target="_blanck">Matheus Canuto</a>
    </footer>
</div>

</body>
</html>