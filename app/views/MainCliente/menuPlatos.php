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
                        <p><a href=\"#\" class=\"btn btn-primary\" role=\"button\">Button</a> <a href=\"#\" class=\"btn btn-default\" role=\"button\">Button</a></p>
                    </div>
                </div>    
            </div>";
    }//for    
    ?>
</div>