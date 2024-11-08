<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Estacionamento</title>
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

<div>
    <form method="POST" action="cadastro_script.php">
        <legend class="borda"><h2>Registro de entrada</h2></legend><br>
        <br>

        <label class="borda">Modelo:</label>
        <input type="text" id="name" name="name" placeholder="Digite o modelo do veiculo:" autocomplete="off" required> <br> <br>

        <label class="borda" for="">Placa do veiculo:</label>
        <input type="text" id="licence" name="licence" placeholder="Digite a placa do veiculo:" autocomplete="off" required> <br>
        <br><br>

        <div class="botao"> 
        <button id="send" type="submit">Registrar</button>          
        </div>    
    </form>
<!--
</div><br>
    </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>VEICULO</th>
                        <th>PLACA</th>
                        <th>HORARIO</th>
                        <th id="ações">AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="garage"></tbody>
            </table>
        </div>
-->
<div style="text-align: center;font-weight:bolder;font-size:30px">
    <?php
    include 'php/conect.php';



    ?>
</div>

<script src="js/pagamento.js"></script>
</body>
</html>