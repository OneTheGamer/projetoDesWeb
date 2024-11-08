<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Alterar Entrada de veículo</title>
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
                <a href="pagamento.php">
                    <span class="icon"><i class="fa-solid fa-comment-dollar"></i></span>
                    <span class="title">PAGAMENTO</span>
                </a>
            </li>
        </ul>
    </div>
  </nav>
</header><br><br><br><br><br>

<div class="msg_sucesso_cadastro">
    <?php
        include "php/conect.php";

        //$id = $_POST['id'];
        $id = isset($_POST['id']) ? (int) $_POST['id']: 0;
        $modelo = $_POST['name'];
        $placa = $_POST['licence'];

        //$sql = "INSERT INTO `estacionamento`(`Modelo`, `Placa`, `Horário`) VALUES ('$nome','$placa',CURRENT_TIME() )";

        $sql = "UPDATE estacionamento set Modelo = '$modelo', Placa = '$placa' WHERE ID = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "$modelo alterado com sucesso!";
        } else {
            echo "ERRO! $modelo não foi alterado.";
        }

    ?>
    <br><br><br>

    <div class="botao" style="text-align:center;"> 
        <a href="pesquisa.php" class="button" style="background-color:blue">Voltar</a>          
        </div>

</div><br>


<script src="JS/pagamento.js"></script>
</body>
</html>