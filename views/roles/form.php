<h4><?=$roles->getId() ? 'Editar' : 'Nuevo'?> Rol</h4>
<form action="?c=roles&a=save&id=<?= $roles->getId() ?>" method="post">
    <input type="text" name="name">
    <br><br>
    <button type="submit">Guardar</button>
</form>