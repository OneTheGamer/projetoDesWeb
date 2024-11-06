<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pesquisar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>  
<header>     
  <nav class="menu">
    <div class="logo">
        <a href="cadastro.php"><img class="imagem" src="imagens/logo.png.png" alt="LOGO1"></a>
    </div>   
    <button class="menu-toggle" aria-label="Toggle menu">
    &#9776;
    </button>

    <div class="navegation">
         <ul>
            <li>
                <a href="index.php">
                    <span class="icon"><i class="fa-solid fa-car"></i></span>
                    <span class="title">REGISTRO</span>
                </a>
            </li>
            <li>
                <a href="pagamento.html">
                    <span class="icon"><i class="fa-solid fa-comment-dollar"></i></span>
                    <span class="title">PAGAMENTO</span>
                </a>
            </li>
        </ul>
    </div>
  </nav>
</header><br><br><br><br><br>


    <?php

        $pesquisa = $_POST['busca'] ?? '';

        include "php/conect.php";

        $sql = "SELECT * FROM estacionamento WHERE Placa LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);
    ?>

    <nav class="pesquisa-BD">
        <form class="pesquisa1-BD" action="pesquisa.php" method="post">
            <h1 class="titulo-pesquisa">Pesquisar</h1>
            <div class="titulo-pesquisaBD">
                <input class="input-pesquisa" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="busca" autofocus>
                <button class="btn-pesquisa" type="submit">Buscar</button>
            </div>
        </form>
    </nav><br>
    <table class="tabela-pesquisa-hover">
        <thead>
            <tr>
            <th>Modelo do veículo</th>
            <th>Placa do veículo</th>
            <th>Hora de entrada</th>
            <th>Permanência</th>
            <th>Funções</th>
            </tr>
        </thead>
        <tbody>

        <?php
        while ( $linha = mysqli_fetch_assoc($dados) ) {
            $modelo = $linha['Modelo'];
            $placa = $linha['Placa'];
            $horaEntrada = $linha['Horário'];
        //    $permanencia = $horaEntrada;

            echo "<tr>
            <th>$modelo</th>
            <th>$placa</th>
            <th>$horaEntrada</th>
            <th>00:01:34</th>
            <th>
            
            
            </th>
                </tr>";
        } 

        //$dataEntrada = new DateTime(date("Y-m-d") ."".$horaEntrada);
        //echo $dataEntrada->format('H:i:s');
    ?>
        </tbody>
    </table><br>
    <div class="painel-coluna" style="text-align:center;"> 
        <a href="index.php" class="button">Voltar ao início</a>          
        </div>
</body>
</html>