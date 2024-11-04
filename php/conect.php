<?php
$server = "localhost";
$user = "root";
$password = ""; // senha q n existe
$bd = "Bitstop";

// Criar conexão
$conn = mysqli_connect($server, $user, $password, $bd);

// Verificar conexão
if ($conn) {
    echo "Conectado ao banco de dados!";
} else {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
?>