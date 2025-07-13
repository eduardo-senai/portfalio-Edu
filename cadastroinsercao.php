<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$senha_digitada = $_POST['senha'];

$senha_hash = password_hash($senha_digitada, PASSWORD_DEFAULT);

$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$database = "trabalho";

$conexao = mysqli_connect($servidor, $usuario_db, $senha_db, $database);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO cadastro (nome, email, telefone, cpf, endereco, senha) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);

if ($stmt === false) {
    die("Erro ao preparar a consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, "ssssss", $nome, $email, $telefone, $cpf, $endereco, $senha_hash);

if(mysqli_stmt_execute($stmt)){

    header("Location: login.html");
    exit(); 
} else {

    echo "Erro ao cadastrar: " . mysqli_stmt_error($stmt);
}

// 7. Fecha a conexão
mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>