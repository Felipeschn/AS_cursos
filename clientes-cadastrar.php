<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Cadastrar Novo Cliente</h2>
    </div>
</div>

<form action="clientes-cadastrar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Usuário" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input name="senha" type="password" class="form-control" placeholder="*******" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" required>
            </div>            
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control" placeholder="email@email.com" required>
            </div>                     
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
