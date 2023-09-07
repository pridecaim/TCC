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
    <form action="#">
      <h1>Criar Conta</h1>
      <input type="text" placeholder="Nome" />
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Senha" />
      <button>Criar</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="#">
      <h1>Login</h1><br>
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Senha" />
      <a href="#">Esqueceu sua senha?</a>
      <button>Entrar</button>
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