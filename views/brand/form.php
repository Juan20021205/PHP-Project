<h4><?=$brand->getId() ? 'Editar' : 'Nueva'?> Marca</h4>
<form action="?c=brand&a=save" method="post">
<input type="hidden" name="id" value="<?=$brand->getId() ?>">
<div class="row">
    <div class="col-md-4">
        <label for="name">Nombre: </label>
    </div>
    <div class="col-md-8">
        <input type="text" name="name" value="<?=$brand->getName() ?>" class="form-control">
    </div>
</div>  
<div class="row">
    <div class="col-md-4">
        <label for="name">Descripción: </label>
    </div>
    <div class="col-md-8">
        <input type="text" name="description" value="<?=$brand->getDescription() ?>" class="form-control">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <a href="?c=brand" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</botton>
    </div>
</div>
</form>