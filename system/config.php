<?php

////////////////////////////////////////////
// Valores de URI
///////////////////////////////////////////

define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

////////////////////////////////////////////
// Valores de CORE
////////////////////////////////////////////
define('CORE', 'system/core/');
define('DEFAULT_CONTROLLER', 'Home');

/////////////////////////////////////////////
// Valores de Rutas
/////////////////////////////////////////////
define('FOLDER_PATH', '/mvcDesdeCero');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH_VIEWS', FOLDER_PATH . '/app/views/');

define('PATH_CONTROLLERS', 'app/controllers/'); 
define('HELPER_PATH', 'system/helpers/');
define('PATH_UPLOAD_IMAGES', ROOT .'/uploads/');
/////////////////////////////////////////////
//Valores de base de datos
/////////////////////////////////////////////
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', 'root');
define('DB_NAME', 'Restaurante');