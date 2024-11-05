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
        <img class="imagem" src="imagens/logo.png.png" alt="LOGO1">
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

<div>
    <form method="POST">
        <legend class="borda"><h2>Registro de entrada</h2></legend><br>
        <br>

        <label class="borda">Modelo:</label>
        <input type="text" id="name" name="name" placeholder="Digite o modelo do veiculo:" autocomplete="off"> <br> <br>

        <label class="borda" for="">Placa do veiculo:</label>
        <input type="text" id="licence" name="licence" placeholder="Digite a placa do veiculo:" autocomplete="off"> <br>
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

    if (!$conn) {
        die("Conexão com o servidor falhou: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $modelo = $_POST['name'];
        $placa = $_POST['licence'];

        if (!empty($modelo) && !empty($placa)) {
            $sql = "INSERT INTO estacionamento(Modelo, Placa, Horário) VALUES ('$modelo', '$placa', CURRENT_TIME())";

            if (mysqli_query($conn, $sql)) {
                echo "Cadastrado com sucesso";
            } else {
                echo "Erro: " . mysqli_error($conn);
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }

    $sql = "SELECT * FROM estacionamento";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table style="margin: 0 auto; border-collapse: collapse;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 8px;">VEÍCULO</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">PLACA</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">HORÁRIO</th>';
        echo '<th style="border: 1px solid black; padding: 8px;">AÇÕES</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . htmlspecialchars($row['Modelo']) . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . htmlspecialchars($row['Placa']) . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' . htmlspecialchars($row['Horário']) . '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;"><button>Remover</button></td>'; 
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Nenhum registro encontrado.";
    }

    mysqli_close($conn);
    ?>
</div>

<script src="js/script.js"></script>
</body>
</html>