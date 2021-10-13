<?php

class Session
{
    //Inicializa la sesión
    public function init()
    {
        session_start();
    }

    //$key => llave de array de sesión
    //$value => valor para el elemento de la sesión
    public function add($key, $value)
    {
        $_SESSION[$key]= $value;
    }

    //Retorna un elemento de la sesión
    public function get($key)
    {
        return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    //Retorna todos los valores de la sesión
    public function getAll()
    {
        return $_SESSION;
    }

    //Borra un elemento de la sesión
    public function remove($key)
    {
        if(!empty($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    //Cierra la sesión eliminando los valores
    public function close()
    {
        session_unset();
        session_destroy();
    }

    //Retorna el estado de la sesión
    public function getStatus()
    {
        return session_status();
    }
}