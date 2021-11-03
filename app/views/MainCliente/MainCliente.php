
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
        <p class="navbar-brand"><a href='<?= FOLDER_PATH. "/MainCliente"?>'>Bienvenido Cliente</a></p>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= FOLDER_PATH . '/MainCliente/MiPedido'?>">Mi Pedido</a></li>
            <li><a href="<?= FOLDER_PATH . '/MainCliente/MisReservas'?>">Mis Reservas</a></li>
            <li><a href="<?= FOLDER_PATH . '/MainCliente/reserva'?>">Realizar Reserva</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= FOLDER_PATH . '/Login/logout'?>">Cerrar sesion</a></li>
                </ul>    
        </ul>
    </nav> 

    <div class="container">
        <?php !empty($show_menuPlatos) ? require 'app/views/MainCliente/menuPlatos.php' : '' ?>
        <?php !empty($show_reserva) ? require 'app/views/MainCliente/reserva.php' : '' ?>
        <?php !empty($show_info_reserva) ? require 'app/views/MainCliente/info_reserva.php' : '' ?>
        <?php !empty($show_info_reservas) ? require 'app/views/MainCliente/info_reservas.php' : '' ?>
        <?php !empty($show_pedido) ? require 'app/views/MainCliente/mi_pedido.php' : '' ?>

    </div>
</body>
</html>
