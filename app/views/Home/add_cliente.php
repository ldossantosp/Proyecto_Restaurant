<h2> Registro de Cliente</h2>

<div>
    <form method="POST" action="<?= FOLDER_PATH . '/Home/addCliente' ?>" enctype="multipart/form-data">
        <label> Cédula</label>
        <input type="text" name="Cedula" id="Cedula">
        </br>
        <label> Nombre</label>
        <input type="text" name="Nombre" id="Nombre">
        </br>
        <label> Contraseña</label>
        <input type="text" name="Password" id="Password">
        </br>
        <label> Dirección </label>
        <input type="text" name="Direccion" id="Direccion">
        </br>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a class="btn btn-default" href="<?= FOLDER_PATH ?>" role="button">Cancelar</a>
    </form>
</div>