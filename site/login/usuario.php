<?php
require_once __DIR__.'\..\..\config.php';

// Verifica se o usuário está logado
if (!isset($_COOKIE['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$conn = $pdo;

$id = $_COOKIE['usuario_id'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuário não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #cce3ff, #ffd6f6, #fffcbf);
            background-size: 300% 300%;
            animation: gradient 10s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        @keyframes gradient {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .perfil-container {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
            color: #000;
        }

        .perfil-container h2 {
            margin-top: 0;
        }

        .perfil-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        .info {
            margin-bottom: 15px;
        }

        .info strong {
            color: #333;
        }

        .botao-quiz {
            display: inline-block;
            background-color: #ffb3b3;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .botao-quiz:hover {
            background-color: #ff8080;
        }
    </style>
</head>
<body>
<div class="perfil-container">
    <h2>Olá, <?= htmlspecialchars($usuario['nome']) ?> 👋</h2>
    
    <?php if ($usuario['foto_perfil']): ?>
        <img src="../uploads/<?= htmlspecialchars($usuario['foto_perfil']) ?>" alt="Foto de Perfil">
    <?php endif; ?>

    <div class="info"><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></div>
    <div class="info"><strong>Data de Nascimento:</strong> <?= htmlspecialchars($usuario['data_nascimento']) ?></div>
    <div class="info"><strong>Sobre Mim:</strong> <?= nl2br(htmlspecialchars($usuario['sobre_mim'])) ?></div>
    <div class="info"><strong>Quem Sou Eu:</strong> <?= nl2br(htmlspecialchars($usuario['quem_sou_eu'])) ?></div>
    <div class="info"><strong>Minhas Lembranças:</strong> <?= nl2br(htmlspecialchars($usuario['lembrancas'])) ?></div>
    <div class="info"><strong>Pontos Fortes:</strong> <?= htmlspecialchars($usuario['pontos_fortes']) ?></div>
    <div class="info"><strong>Pontos Fracos:</strong> <?= htmlspecialchars($usuario['pontos_fracos']) ?></div>
    <div class="info"><strong>Valores:</strong> <?= htmlspecialchars($usuario['valores']) ?></div>
    <div class="info"><strong>Aptidões:</strong> <?= htmlspecialchars($usuario['aptidoes']) ?></div>
    <div class="info"><strong>Relacionamentos:</strong> <?= nl2br(htmlspecialchars($usuario['relacionamentos'])) ?></div>
    <div class="info"><strong>Dia a Dia:</strong> <?= nl2br(htmlspecialchars($usuario['dia_a_dia'])) ?></div>
    <div class="info"><strong>Vida Escolar:</strong> <?= nl2br(htmlspecialchars($usuario['vida_escolar'])) ?></div>
    <div class="info"><strong>Visão Sobre Mim:</strong> <?= nl2br(htmlspecialchars($usuario['visao_sobre_mim'])) ?></div>
    <div class="info"><strong>Visão dos Outros:</strong> <?= nl2br(htmlspecialchars($usuario['visao_dos_outros'])) ?></div>
</div>
</body>
</html>

