<?php
require_once __DIR__ . '/../config.php';

class UserModel {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function create($data) {
        $sql = "INSERT INTO usuarios (
            nome, email, senha, data_nascimento, sobre_mim, foto_perfil,
            quem_sou_eu, lembrancas, pontos_fortes, pontos_fracos,
            valores, aptidoes, relacionamentos, dia_a_dia,
            vida_escolar, visao_sobre_mim, visao_dos_outros
        ) VALUES (
            :nome, :email, :senha, :data_nascimento, :sobre_mim, :foto_perfil,
            :quem_sou_eu, :lembrancas, :pontos_fortes, :pontos_fracos,
            :valores, :aptidoes, :relacionamentos, :dia_a_dia,
            :vida_escolar, :visao_sobre_mim, :visao_dos_outros
        )";

        $stmt = $this->conn->prepare($sql);
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

        try {
            $stmt->execute($data);
            return "sucesso";
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return "email_duplicado";
            }
            return "erro";
        }
    }
}
