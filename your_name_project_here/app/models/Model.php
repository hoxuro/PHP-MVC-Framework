<?php

class Model
{
    use Database;

    // mi modelo de todos tendra una propiedad llamada todos que
    // serán los todos existentes obtenidos de la base de datos
    public $todos = [];

    /**
     * Método constructor que nos permite crear instancias de Model
     * su funcion sera almacenar los todos en un array en forma de 
     * objetos.
     */
    public function __construct()
    {
        $this->refreshTodo();
    }

    /**
     * Metodo que permite tener nuestro array de todos
     * actualizado a como este en la base de datos en ese
     * momento.
     */
    public function refreshTodo()
    {
        $query = "SELECT * FROM todos";
        $resultado =  $this->query($query);

        // Si ha habido error con la base de datos
        if ($resultado instanceof PDOException) {
            echo '<span style="color: red;">Error, no ha podido insertarse su TODO.</span></br>';
        }

        // Si no ha habido error con la base de datos
        if (!($resultado instanceof PDOException)) {
            $this->todos = $resultado;
        }
    }

    /**
     * Metodo que permite añadir un todo a la base de datos.
     * 
     * @param description la description del todo a insertar
     */
    public function addTodo($description)
    {
        $query = "INSERT INTO todos (description, status) VALUES
                    ('" . $description . ".', false)";

        $resultado = $this->query($query);

        // Si ha habido error con la base de datos
        if ($resultado instanceof PDOException) {
            echo '<span style="color: red;">Error, no ha podido insertarse su TODO.</span></br>';
        }
    }

    /**
     * Metodo que permite eliminar un todo a la base de datos.
     * 
     * @param id el ID del todo a eliminar
     */
    public function deleteTodo($id)
    {
        $query = "DELETE FROM todos WHERE id = $id ";

        $resultado = $this->query($query);

        // Si ha habido error con la base de datos
        if ($resultado instanceof PDOException) {
            echo '<span style="color: red;">Error, no ha podido eliminarse el TODO.</span></br>';
        }
    }

    /**
     * Metodo que permite editar un todo existente en la base
     * de datos.
     * 
     * @param id el ID del todo a editar
     */
    public function editTodo($id, $description, $status)
    {
        $query = "UPDATE todos SET description = '$description' , status = '$status'
                  WHERE id = $id";

        $resultado = $this->query($query);

        // Si ha habido error con la base de datos
        if ($resultado instanceof PDOException) {
            echo '<span style="color: red;">Error, no ha podido editarse el TODO.</span></br>';
        }
    }

    /**
     * Metodo que permite cambiar el estado de un todo de la base
     * de datos.
     * 
     * @param id el ID del todo cuyo estado queremos cambiar
     */
    public function changeStatus($id)
    {

        // primero obtengo el status
        $query = "SELECT status FROM todos WHERE id = $id";
        $resultado = $this->query($query);

        // Si ha habido error con la base de datos
        if ($resultado instanceof PDOException) {
            echo '<span style="color: red;">Error, no se ha podido cambiar su status el TODO.</span></br>';
        }

        // Si no ha habido error con la base de datos
        if (!($resultado instanceof PDOException)) {
            // cambio el status del todo
            $status = !$resultado;
            $query = "UPDATE todos SET status = $status";
            $resultado = $this->query($query);

            // Si ha habido error con la base de datos
            if ($resultado instanceof PDOException) {
                echo '<span style="color: red;">Error, no sea ha podido cambiar su status el TODO.</span></br>';
            }
        }
    }
}
