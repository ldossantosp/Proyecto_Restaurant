<?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : ''?>
<div class="row">
    <?php
    for ($i=0; $i<count($info_plato); $i++){
        $row = $info_plato[$i][4]->fetch_assoc(); 
        $nameFoto = $row['Foto'];
        echo"
            <div class=\"col-sm-6 col-md-4\">
                <div class=\"thumbnail\">
                    <img width=\"350px\" height=\"150px\" src=\"/uploads/{$nameFoto}\" alt=\"...\">
                    <div class=\"caption\">
                        <h3>".$info_plato[$i][2]."</h3>
                        <p>".$info_plato[$i][3]."</p>
                        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Pedir</a></p>
                        <form method=\"POST\" action=".FOLDER_PATH. '/MainCliente/RealizarPedido'.">
                            <input type=\"hidden\" id=\"idPlato\" name=\"idPlato\" value=\"{$info_plato[$i][1]}\">
                            <p>Cantidad:<input type=\"number\" id=\"cantidad\" name=\"cantidad\"></p>
                            <p>Observaciones:</p><p><textarea id=\"obs\" name=\"obs\"></textarea></p>
                            <p><button type=\"submit\" class=\"btn btn-primary\">Confirmar</button></p>
                        </form>
                        </div>
                </div>    
            </div>";
    }//for    
    ?>
</div>