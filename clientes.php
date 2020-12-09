<?php require_once 'global.php' ?>
<?php

    try {
        $cliente = new Cliente();
        $lista = $cliente->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Clientes</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="clientes-cadastrar.php" class="btn btn-info btn-block">Cadastrar Novo Cliente</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Bairro</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['CliCodigo'] ?></td>
                    <td><?php echo $linha['CliNome'] ?></td>
                    <td><?php echo $linha['CliCPF'] ?></td>
                    <td><?php echo $linha['CliCNPJ'] ?></td>
                    <td><?php echo $linha['CliEndereco'] ?></td>
                    <td><?php echo $linha['CliBairro'] ?></td>
                    <td><a href="clientes-editar.php?codigo=<?php echo $linha['CliCodigo'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a href="clientes-excluir-post.php?codigo=<?php echo $linha['CliCodigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
