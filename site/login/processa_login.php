<?php
require_once __DIR__.'\..\..\config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conn = $pdo;

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Criar cookie com ID do usuário por 1 hora
        setcookie("usuario_id", $usuario['id'], time() + 3600, "/");
        header("Location: usuario.php");
        exit();
    } else {
        echo "<script>alert('E-mail ou senha inválidos!'); history.back();</script>";
    }
}
