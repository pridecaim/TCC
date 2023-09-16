<?php
require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if (isset($_POST['cadastrar'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  if ($usuario->cadastrar($nome, $email, $senha)) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
  } else {
    echo "<script>alert('Erro ao cadastrar')</script>";
  }
  exit();
}

if (isset($_POST['logar'])) {
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  if ($usuario->logar($email, $senha)) {
    $_SESSION['email'] = $email;
    header("Location: telainicio.php");
    exit();
  } else {
    echo "<script>alert('Login inválido')</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form method="POST">
        <h1>Criar Conta</h1>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" minlength="8" required>
        <button name="cadastrar">Criar</button>
      </form>
    </div>

    <div class="form-container sign-in-container">
      <form method="POST">
        <h1>Login</h1><br>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <a href="#">Esqueceu sua senha?</a>
        <button name="logar">Entrar</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Bem-vindo de volta!</h1>
          <p>Para manter-se conectado conosco, faça o Login.</p>
          <button class="ghost" id="signIn">Logar</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Olá, amigo!</h1>
          <p>Insira seus detalhes pessoais e comece sua jornada conosco.</p>
          <button class="ghost" id="signUp">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove("right-panel-active");
    });
  </script>
</body>

</html>