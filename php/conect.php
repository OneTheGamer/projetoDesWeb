<?php
date_default_timezone_set('America/Sao_paulo');
$server = "localhost";
$user = "root";
$password = ""; // senha q n existe
$bd = "Bitstop";

// Criar conexão
$conn = mysqli_connect($server, $user, $password, $bd);

// Verificar conexão
if ($conn) {
    //echo "Conectado ao banco de dados!";
} else {
   echo "Erro ao conectar no banco de dados.";
}


//function 


//function permanencia(string $);
?>