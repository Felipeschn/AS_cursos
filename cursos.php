<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php' ?>
<?php
    try {
        $curso = new Curso();
        $lista = $curso->cursosDoUsuario(Cliente::getCursosUsuarioLogado());
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Seus cursos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome do curso</th>
                <th class="acao"> </th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['codigo'] ?></td>
                        <td><?php echo $linha['nome'] ?></td>
                        <td>
                            <?php
                                echo '<a href="certificado.php?codigo=' . $linha['codigo'] . '" class="btn btn-warning">Emitir Certificado</a>';
                            ?>
                            
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
