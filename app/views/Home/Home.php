<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=FOLDER_PATH . '/Login'?>">Iniciar sesion</a></li>
            <li><a href="<?=FOLDER_PATH . '/Home/formularioRegistro'?>">Registrarse</a></li>
        </ul>
    </nav> 
    <?php
        for ($i=0; $i<count($info_plato); $i++){
            echo '<blockquote>';
            echo '<p><h2>'.$info_plato[$i][2].'</h2></p>';
            echo '<footer>'.$info_plato[$i][3].'</footer>';
            echo '</blockquote>';
    ?>   
       <div id="carousel-example-generic<?=$i?>" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic<?=$i?>" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic<?=$i?>" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic<?=$i?>" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
                $contador = 0;
                while ($row = $info_plato[$i][4]->fetch_assoc())
                {
                    if($contador == 0){
                        $nameFoto = $row['Foto'];
                        echo"
                        <div class=\"item active\">
                            <p class=\"text-center\"><img width=\"200px\" height=\"150px\" src=\"/uploads/{$nameFoto}\" alt=\"...\" class=\"img-thumbnail\"></p>
                            <div class=\"carousel-caption\"> </div>
                        </div>";
                    }
                    else{
                        $nameFoto = $row['Foto'];
                        echo " <div class=\"item\">
                        <p class=\"text-center\"><img width=\"200px\" height=\"150px\" src=\"/uploads/{$nameFoto}\" alt=\"...\" class=\"img-thumbnail\"></p>
                        <div class=\"carousel-caption\">
                        </div>
                        </div>";
                    }
                    $contador = $contador + 1;
                }
            ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic<?=$i?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic<?=$i?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
            
       
    <?php   
        }//for
    ?>
    <?php !empty($message) ? print("<div class=\"alert alert-$message_type\">$message</div>") : '' ?>
    <?php !empty($show_formulario_Registro) ? require 'app/views/Home/add_cliente.php' : ''?>
</body>
</html>