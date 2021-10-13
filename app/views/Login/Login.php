<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <form class="form-signin" method="POST" action="<?= FOLDER_PATH . '/Login/signin' ?>">
            <h2 class="form-signin-heading text-center">Iniciar sesión</h2>
            <label for="cedula" class="sr-only">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" placeholder="cedula" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password" >
            <?php !empty($error_message) ? print($error_message) : '' ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

    </div> 
</body>
</html>