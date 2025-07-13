<?php
// Inicia a sessão e protege a página
session_start();
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("Location: login.html");
    exit();
}

// Configurações do banco de dados e conexão
$conexao = mysqli_connect("localhost", "root", "", "trabalho");

// Verifica a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// 1. MUDANÇA NO SQL: Selecionando apenas as colunas essenciais.
$sql = "SELECT ID, NOME, EMAIL FROM cadastro ORDER BY NOME ASC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados (Simplificado)</title>
    <link rel="stylesheet" href="cssfinal.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="content-container">
            <header class="portal-cabecalho">
                <h1>Lista de Usuários</h1>
            </header>

            <main>
                <a href="pagina1.php" class="botao-voltar">&larr; Voltar ao Portal</a>

                <div class="tabela-wrapper">
                    <?php if (mysqli_num_rows($resultado) > 0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($usuario = mysqli_fetch_assoc($resultado)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($usuario['ID']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['NOME']); ?></td>
                                        <td><?php echo htmlspecialchars($usuario['EMAIL']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Nenhum usuário cadastrado encontrado.</p>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
<?php
mysqli_close($conexao);
?>