<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= FOLDER_PATH . '/Plato/formulario'?>">Agregar Plato</a></li>
    </ul>

    <div class="container">
        <?php !empty($show_formulario) ? require 'app/views/Plato/add_plato.php' : ''?>
        <?php !empty($show_platos_list) ? require 'app/views/Plato/platos_list.php' : ''?>
        <?php !empty($show_edit_form) ?  require 'app/views/Plato/edit_plato.php' : '' ?>
        <?php !empty($show_edit_form_foto) ?  require 'app/views/Plato/edit_plato_foto.php' : '' ?>
    </div>
</body>
</html>