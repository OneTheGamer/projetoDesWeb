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
            header('Location: index.php?message=Cadastrado com sucesso');
            exit;
        } else {
            header('Location: index.php?message=Erro: ' . mysqli_error($conn));
            exit;
        }
    } else {
        header('Location: index.php?message=Por favor, preencha todos os campos.');
        exit;
    }
}

mysqli_close($conn);
?>