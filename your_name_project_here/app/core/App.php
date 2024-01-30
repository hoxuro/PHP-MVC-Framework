<?php

class App
{
    protected $controller = 'home'; // controlador por defecto al cargar la app
    protected $method = 'index';    // metodo de accion del controlador por defecto al cargar la app

    protected $params = [];         // subdirectorios despues de public en la url

    public function __construct()
    {
        $url = $this->parseUrl();

        // si existe el controlador introducido por url se establecera
        // sino seguirá el por defecto
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            // si no existe el controlador significa que la pagina no
            // existe y error 404 not found
            $this->controller = '_404';
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        // si existe el metodo de accion del controlador introducidos por url se establecera
        // sino seguirá el por defecto
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];


        // Funcion que ejecuta un callback pasandole los argumentos por parámetro
        // es como llamar a una funcion de manera mas compleja
        //                  // nombre clase     // nombre metodo    // parametros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Funcion que devuelve el numero de elementos después de mvc/public en la url
     */
    public function parseUrl()
    {
        // si no existe el parametro la url introducida es public/ por lo que queremos
        // que situe al usuario en home
        $URL = $_GET['url'] ?? 'home';
        $URL = explode('/', filter_var(rtrim($URL, '/'), FILTER_SANITIZE_URL));
        return $URL;
    }
}
