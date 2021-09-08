<h2> Agregar Plato</h2>

<div>
<form method="POST" action="<?= FOLDER_PATH . '/Plato/addPlato' ?>" enctype="multipart/form-data">
<label> Nombre</label>
<input type="text" name="Nombre" id="Nombre">
</br>
<label> Descripcion</label>
<input type="text" name="Descripcion" id="Descripcion">
</br>
<label> Precio</label>
<input type="text" name="Precio" id="Precio">
</br>
<label> Imagen </label>
<input type="file" name="Imagen" id="Imagen">

<button type="submit" class="btn btn-primary">Agregar</button>
<a class="btn btn-default" href="<?= FOLDER_PATH . '/Plato/PlatosList' ?>" role="button">Cancelar</a>
</form>
</div>