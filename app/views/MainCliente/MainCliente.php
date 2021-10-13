
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>p
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <p class="navbar-brand">Bienvenido CLiente</p>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= FOLDER_PATH . '/Plato/formulario'?>">Realizar Reserva</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= FOLDER_PATH . '/Login/logout'?>">Cerrar sesion</a></li>
                </ul>    
        </ul>
    </nav> 

    <div class="jumbotron">
        <?php !empty($show_menuPlatos) ? require 'app/views/MainCliente/menuPlatos.php' : '' ?>
    </div>
</body>
</html>
