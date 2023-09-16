<?php
session_start();

include('conexao/conexao.php');

$db = new Conexao();


class Usuario
{
    private $conn;
    private $table_name = "usuarios";
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha)
    {
        $emailExistente = $this->verificarEmailExistente($email);
        if ($emailExistente) {
            echo "<script>alert('Email já cadastrado')</script>";
            return false;
        }

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO ". $this->table_name . " (nome, email, senha) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $senhaCriptografada);
        $result = $stmt->execute();
        return $result;
    }

    private function verificarEmailExistente($email)
    {
        $sql = "SELECT COUNT(*) FROM ". $this->table_name . " WHERE email=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function logar($email, $senha)
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $usuario['senha'])) {
                return true;
            }
        }
        return false;
    }

}
?>
