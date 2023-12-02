<?php
class Conexion{

    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password ='';
    protected $port='3306';
    protected $database='protectora_animales'; 


    protected function conectar(){

        try {
            $conn = new PDO("mysql:host=$this->servername;port=$this->port;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec('SET NAMES utf8mb4');

            return $conn;
          
        } catch (PDOException $e) {
            echo "Fallo: " . $e->getMessage();
        }
    }



}

?>