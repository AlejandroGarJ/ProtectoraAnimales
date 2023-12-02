<?php
include_once("./Conexion.php");


 class Crud extends Conexion{


    private $tabla;
    private $conn;

    //Constructor, para instanciar esta clase se debera instanciar antes un objeto de tipo Conexion

    function __construct($tabla){
        $this->tabla = $tabla;
        $this->conn= parent::conectar();
     
    }


    function obtieneTodos(){

        //No se puede poner un valor preparado como nombre de la tabla
        try{
           $stmt=$this->conn->query("SELECT * FROM $this->tabla");

           $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $rows;

        } catch (PDOException $e) {
            echo "Fallo: " . $e->getMessage();
        }

    }


    function obtieneDeID($id){

        try{
            $stmt=$this->conn->prepare("SELECT * FROM $this->tabla WHERE id = :id");
            
            $stmt->bindValue(':id', $id); 

            $stmt->execute();
            
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
            if(count($rows)==0)echo "No se encontro";
            else{
                foreach($rows AS $fila){
                    foreach($fila AS $col => $value){
                        echo $value." ";
                    }
                    echo "\n";
                }
            }
            
 
         } catch (PDOException $e) {
             echo "Fallo: " . $e->getMessage();
         }

    }


    function borrar($id){

        try{
            $stmt=$this->conn->prepare("DELETE FROM $this->tabla WHERE id = :id");
            
            $stmt->bindValue(':id', $id); 

            $stmt->execute();
            
            
 
         } catch (PDOException $e) {
             echo "Fallo: " . $e->getMessage();
         }

    }



}


?>