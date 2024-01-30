<?php

trait Database
{
    /**
     * Método que nos permite realizar una conexión a una base de datos
     * de configuración previamente indicada en config.php
     */
    private function connect()
    {

        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME . "";
        return $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    /**
     * Método que nos permite ejecutar una query a la base de datos y 
     * ademas separa la query de los parametros introducidos por el usuario
     * para prevenir inyecciones sql
     * 
     * @param query consulta en formato string que queremos ejecutar en
     *          la base de datos
     * 
     * @param data array de argumentos para prevenir una inyeccion sql
     */
    public function query($query, $data = [])
    {
        try {
            $con = $this->connect();
            $statement = $con->prepare($query);

            $check = $statement->execute($data);


            // si el resultado de la consulta no es nulo
            if ($check) {
                $result = $statement->fetchAll(PDO::FETCH_OBJ);
                if (is_array($result) && count($result)) {
                    // cerramos la conexión con la base de datos
                    $con = null;
                    return  $result;
                }
            }

            // cerramos la conexión con la base de datos
            $con = null;
            // si la consulta da resultado nulo
            return false;
        } catch (PDOException $e) {
            return $e;
        }
    }
}
