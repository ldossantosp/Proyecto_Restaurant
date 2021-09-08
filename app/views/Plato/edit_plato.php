<h2> Editar Plato</h2>

<?php if(!$info_plato){
        exit('Hubo un error al cargar la información');
}
?>

<form method="POST" action="<?= FOLDER_PATH . '/Plato/updatePlato' ?>">
<label> Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="<?= $info_plato->Nombre?>">
</br>
<label> Descripcion</label>
<input type="text" name="Descripcion" id="Descripcion" value="<?= $info_plato->Descripcion?>">
</br>
<label> Precio</label>
<input type="text" name="Precio" id="Precio" value="<?= $info_plato->Precio?>">

<input type="hidden" name="id" value="<?=$info_plato->Id ?>"> 
<button type="submit" class="btn btn-primary">Actualizar</button>
<a class="btn btn-default" href="<?= FOLDER_PATH . '/Plato/PlatosList' ?>" role="button">Cancelar</a>