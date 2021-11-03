<h3> Mis Reservas </h3>
<table class="table">
<?php 
    while ($row = $info_Reservas->fetch_assoc())
    {
        echo"
            <tr>
                <h3>
                    <td>Fecha de la reserva</td> 
                    <td><span class=\"label label-default\">{$row['Fecha']}</span></td>
                </h3>
            </tr>

            <tr>
                <h3>
                    <td>Cantidad de personas</td> 
                    <td><span class=\"label label-default\">{$row['Cant_Personas']}</span></td>
                </h3>
            </tr>

            <tr>
                <h3>
                    <td>Turno</td>
                    <td><span class=\"label label-default\">{$row['Turno']}</span></td>
                </h3>
            </tr>

            <tr>
                <h3>
                    <td>Número de mesa</td> 
                    <td><span class=\"label label-default\">{$row['NroMesa']}</span></td>
                </h3>
            </tr>

            <tr>
                <td></td>
                <td><a href='".FOLDER_PATH ."/MainCliente/removeReserva/{$row['Fecha']}"."&"."{$row['CiCliente']}"."&"."{$row['Turno']}'>Eliminar Reserva</a></td>
            </tr>  
            
            <tr>
                <td></td>
                <td></td>
            </tr>
            ";
    }


?>

</table>