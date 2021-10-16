<h2> Realizar reserva </h2>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="<?= FOLDER_PATH. '/MainCliente/RealizarReserva' ?>">
            <div class="form-group">
            <?php $fcha = date("Y-m-d");?>
                <label> Seleccione la fecha de la reserva</label>
                <input type="date" name="fechaReserva" id="fechaReserva" value="<?php echo $fcha;?>">
            </div>

            <div class="form-group">
                <label>Cantidad de personas</label>
                <select name="cantidad" id="cantidad">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                    <option value="6"> 6 </option>
                </select>  
            </div>

            <div class="form-group">
                <label>Turno</label>
                <select name="turno" id="turno">
                    <option value="Desayuno">Desayuno</option>
                    <option value="Almuerzo">Almuerzo</option>
                    <option value="Merienda">Merienda</option>
                    <option value="Cena">Cena</option>
                </select>  
            </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
        <a class="btn btn-default" href="" role="button">Cancelar</a>
    </form>
    </div> 
</div>