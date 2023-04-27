<?php 

// BANCO DE DADOS
$host   = "localhost";
$user   = "root";
$pass   = "Mysql2023@root";
$dbname = "usuarios";
$port   = 3306;

$campo_nome      = $_POST['nome'];
$campo_sobrenome = $_POST['sobrenome'];
$campo_cep       = $_POST['cep'];
$campo_endereco  = $_POST['endereco'];
$campo_bairro    = $_POST['bairro'];
$campo_cidade    = $_POST['cidade'];
$campo_estado    = $_POST['estado'];

$conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
$stmt = $conn->prepare('INSERT INTO usuarios(nome, sobrenome, cep, endereco, bairro, cidade, estado) VALUES(:nome, :sobrenome, :cep, :endereco, :bairro, :cidade, :estado)');
$stmt->execute(array(
    ':nome'      => $campo_nome,
    ':sobrenome' => $campo_sobrenome,
    ':cep'       => $campo_cep,
    ':endereco'  => $campo_endereco,
    ':bairro'    => $campo_bairro,
    ':cidade'    => $campo_cidade,
    ':estado'    => $campo_estado
));

if ($stmt->rowCount() > 0) {
    $retorno = "validade";
}
else{
    $retorno = "Não validado";;
}

header("Location: ../index.php");
