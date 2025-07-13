<?php
session_start();
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("Location: login.html");
    exit();
}
$nome_usuario = isset($_SESSION['usuario_nome']) ? htmlspecialchars($_SESSION['usuario_nome']) : 'Usuário';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Notícias</title>
    <link rel="stylesheet" href="cssfinal.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="content-container">

            <header class="portal-cabecalho">
                <h1>Portal de Notícias CEC</h1>
                <p>Bem-vindo, <?php echo $nome_usuario; ?>!</p>
            </header>

            <main class="portal-conteudo">
                <div class="noticia-card">
                    <img src="cru.png" >
                    <h2>Em busca dos 3 pontos!</h2>
                    <p>Cruzeiro prepara-se para o proximo confronto (13/06) contra o Grêmio dentro de casa e conta com casa cheia.</p>
                </div>
                <div class="noticia-card">
                    <img src="mafia.png">
                    <h2>Cadê meu Rival?</h2>
                    <p>De acordo com o Portal GE, Cruzeiro tem a 5° maior torcida do País com 6% dos torcedores.</p>
                </div>
                <div class="noticia-card">
                <img src="cdb.png">
                    <h2>Em busca do HEPTA</h2>
                    <p>Cruzeiro tem como principal objetivo a conquista da Copa do Brasil e voltar a ser o Maior Campeão com folga de quem vem atrás, quem tem mais tem 6!!!</p>
                </div>

                <div class="admin-panel">
                    
                    <h2>Painel Administrativo</h2>
                    <p>Acesse a lista de todos os usuários cadastrados no sistema.</p>
                    <a href="usuarios_cadastrados.php" class="botao-admin">Ver Usuários Cadastrados</a>
                </div>
            </main>
            
            <a href="logout.php" class="botao-logout">Sair (Logout)</a>

        </div>
    </div>
    
</body>
</html>