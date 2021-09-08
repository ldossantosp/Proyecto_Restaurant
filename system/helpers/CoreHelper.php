<?php

class CoreHelper
{
    public static function validateController($controller){
        if (is_file(PATH_CONTROLLERS."{$controller}/{$controller}Controller.php"))
            return true;
        return false;
    }

    public static function validateMethodController($controller, $method)
    {
        $controller .= 'Controller';
        if(method_exists($controller, $method))
            return true;
        return false;
    }
}