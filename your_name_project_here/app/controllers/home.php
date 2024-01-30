<?php

class Home extends Controller
{
    // a estos métodos se les suele llamar acciones o metodos de accion
    public function index($name = '')
    {

        // instanciamos un nuevo modelo de todo
        $todos = $this->model('Model');

        if (isset($_POST['add'])) {
            $description = $_POST['description'];
            $todos->addTodo($description);
            $todos->refreshTodo();
        }

        if (isset($_POST['delete'])) {
            $id = $_GET['id'];
            $todos->deleteTodo($id);
            $todos->refreshTodo();
        }

        if (isset($_POST['edit'])) {
            $id = (int) $_GET['id'];
            $description = $_POST['description'];
            $status = isset($_POST['status']) ? true : false;
            $todos->editTodo($id, $description, $status);
            $todos->refreshTodo();
        }

        // ejecutamos la vista pasando
        $this->view('home/index', ['todos' => $todos->todos]);  // esta direccion que le pasamos no tiene nada que ver con el modelo
        //                                  // y sus metodos
    }
}
