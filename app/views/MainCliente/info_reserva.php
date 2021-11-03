<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '';

    if($info_Reserva){
        echo"

        <h3>Fecha de la reserva <span class=\"label label-default\">{$info_Reserva['fecha']}</span></h3>

        <h3>Cantidad de personas <span class=\"label label-default\">{$info_Reserva['cantPersonas']}</span></h3>

        <h3>Turno <span class=\"label label-default\">{$info_Reserva['turno']}</span></h3>

        <h3>Número de mesa <span class=\"label label-default\">{$info_Reserva['nroMesa']}</span></h3>

        ";
    }
?>