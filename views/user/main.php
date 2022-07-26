<a href="?c=user&a=form" class="btn bnt-sm btn-info">Nuevo Usuario</a>
<table class="table table-hover tablestriped">  
    <thead>
        <tr>
            <td>ID</td>
            <td>Email</td>
            <td>Name</td>
            <td>Role</td>
            <td>State</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->getId() ?> </td>
                <td><?= $user->getEmail() ?> </td>
                <td><?= $user->getName() ?> </td>
                <td><?= $roles->getById($user->getRoles_Id())->getName() ?> </td>
                <td> 
                    <a href="?c=user&a=updateStatus&id=<?= $user->getId() ?>&state=<?= $user->getState() ?>" 
                    class="btn <?= $user -> getState() ? 'btn-danger' :  'btn-success' ?>"><?= $user -> getState() ? 'Desactivar' :  'Activar' ?> </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>