<a href="?c=brand&a=form" class="btn bnt-sm btn-info">Nueva Marca</a>
<table class="table table-hover tablestriped">  
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($brand as $brand): ?>
            <tr>
                <td><?= $brand->getId() ?> </td>
                <td><?= $brand->getName() ?> </td>
                <td><?= $brand->getDescription() ?> </td>
                <td>
                    <a href="?c=brand&a=form&id=<?= $brand->getId() ?>" class="btn btn-warning">Editar</a>
                    <a href="?c=brand&a=delete&id=<?= $brand->getId() ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>