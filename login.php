<?php

session_start();

$email = trim($_POST['email']);
$senha_digitada = trim($_POST['senha']);

$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$database = "trabalho";
$conexao = mysqli_connect($servidor, $usuario_db, $senha_db, $database);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sql = "SELECT * FROM cadastro WHERE email = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);

    if (password_verify($senha_digitada, $usuario['SENHA'])) {

        $_SESSION['usuario_logado'] = true;

        $_SESSION['usuario_nome'] = $usuario['NOME']; 

        header("Location: pagina1.php");
        exit();
    }
}

exit();
?>