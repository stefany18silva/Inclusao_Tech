<?php
require_once __DIR__ . '/../Model/UserModel.php';

class UserController {
    public function cadastrar($dados, $pdo) {
        $user = new UserModel($pdo);
        return $user->create($dados);
    }
}
