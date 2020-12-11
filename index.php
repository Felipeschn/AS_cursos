<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <body>
      <div class="loginbox">
        <h1>Login</h1>
        <form action="cliente-valida-user.php" method="post">
          <p>Username</p>
          <input type="text" name="username" />
          <p>Senha</p>
          <input type="password" name="senha" />
          <input type="submit" class="btn btn-success btn-block" value="Salvar">
          <a href="./index.html">Limpar campos</a><br />
          <a href="./clientes-cadastrar.php">Criar conta</a>
        </form>
      </div>
    </body>
  </head>
</html>
