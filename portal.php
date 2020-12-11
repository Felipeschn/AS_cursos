<?php require_once 'global.php' ?>
<?php
    try {
        $curso = new Curso();
        $lista = $curso->listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Lista de cursos disponíveis</h2>
    </div>
</div>

<?php 

if (Cliente::getCache()->manager === 's'){
echo '<div class="row">
         <div class="col-md-4">
             <a href="cursos-cadastrar.php" class="btn btn-info btn-block">Cadastrar Novo Curso</a>
         </div>
     </div>';
}
?>

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
                    <?php 
                        $codigo = $linha['codigo'];
                        if (Cliente::getCache()->manager === 's'){    
                            echo '<td><a href="cursos-excluir-post.php?codigo=' . $codigo . '" class="btn btn-danger">Excluir</a></td>';
                        } else {
                            echo '<td><a href="cursos-incluir-post.php?codigo=' . $codigo . '" class="btn btn-success">Cadastrar</a></td>';
                        }
                    ?> 
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
