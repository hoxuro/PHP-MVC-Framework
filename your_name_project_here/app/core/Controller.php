<?php

class Controller
{
    /**
     * Método que permite la creación de instancias de modelos
     * que en MVC es donde se almacena y edita la lógica de
     * nuestra aplicacion, pudiendose conectar con una base de
     * datos.
     * 
     * @param model el nombre del fichero php del modelo a instan-
     * ciar sin acabar en .php
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    /**
     * Método que permite la creación de instancias de vistas
     * que en MVC es donde sirven para mostrar al usuario el 
     * resultado final de las operaciones que previamente han 
     * hecho el controlador y el modelo.
     * 
     * @param view el nombre del fichero php de la vista a instan-
     * ciar sin acabar en .php
     * @param data array de argumentos que seran necesarios para
     * que las vistas muestren de manera exitosa el resultado 
     * final.
     */
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
}
