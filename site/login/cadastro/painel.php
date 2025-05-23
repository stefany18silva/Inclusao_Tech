<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
?>
<h1>Bem-vinda, <?php echo $_SESSION['usuario']; ?>!</h1>
<a href="logout.php">Sair</a>
