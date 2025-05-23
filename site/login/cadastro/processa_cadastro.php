<?php
require_once __DIR__.'/../../Controller/UserController.php';
require_once __DIR__.'/../../config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $foto_perfil = '';
    if (!empty($_FILES['foto_perfil']['name'])) {
        $upload_dir = __DIR__.'/../../uploads/';
        $foto_perfil_nome = basename($_FILES['foto_perfil']['name']);
        $foto_perfil = $upload_dir . $foto_perfil_nome;
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $foto_perfil);
    }

    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha'],
        'data_nascimento' => $_POST['data_nascimento'],
        'sobre_mim' => $_POST['sobre_mim'],
        'foto_perfil' => $foto_perfil_nome ?? '',
        'quem_sou_eu' => $_POST['quem_sou_eu'],
        'lembrancas' => $_POST['lembrancas'],
        'pontos_fortes' => $_POST['pontos_fortes'],
        'pontos_fracos' => $_POST['pontos_fracos'],
        'valores' => $_POST['valores'],
        'aptidoes' => $_POST['aptidoes'],
        'relacionamentos' => $_POST['relacionamentos'],
        'dia_a_dia' => $_POST['dia_a_dia'],
        'vida_escolar' => $_POST['vida_escolar'],
        'visao_sobre_mim' => $_POST['visao_sobre_mim'],
        'visao_dos_outros' => $_POST['visao_dos_outros']
    ];

    $controller = new UserController();
    $resultado = $controller->cadastrar($dados, $pdo);
    
    if ($resultado === "sucesso") {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../login.html';</script>";
    } elseif ($resultado === "email_duplicado") {
        echo "<script>alert('Este e-mail já está cadastrado. Use outro.'); history.back();</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar. Tente novamente.'); history.back();</script>";
    }
}
