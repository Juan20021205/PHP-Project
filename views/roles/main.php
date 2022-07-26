<a href="?c=roles&a=form" class="btn bnt-sm btn-info">Nuevo Rol</a>
<table class="table table-hover tablestriped">  
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($roles as $role): ?>
            <tr>
                <td><?= $role->getId() ?> </td>
                <td><?= $role->getName() ?> </td>
                <td>
                    <a href="?c=roles&a=form&id=<?= $role->getId() ?>" class="btn btn-warning">Editar</a>
                    <a href="?c=roles&a=delete&id=<?= $role->getId() ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>