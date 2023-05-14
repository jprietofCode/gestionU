<?php

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{

    //Crear Carrera
    static public function CrearCarreraM($tablaBD, $carrera){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta=true;
        }
        $pdo = null;
        return $respuesta;

        /*$pdo -> close();
        $pdo = null;}*/

    }



    //Ver Carreras
    static public function VerCarrerasM($tablaBD){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();
        $resultado = $pdo->fetchAll();
        $pdo = null;
        return $resultado;

        /*$pdo -> close();
        $pdo = null;*/

    }

    static public function VerCarreras2M($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna" );
        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
        $pdo -> execute();
        $resultado = $pdo->fetch();
        //var_dump($resultado);
        $pdo = null;
        return $resultado;

        /*$pdo -> close();
        $pdo = null;*/

    }

    //ver Carreras User
    static public function CarreraM($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        $resultado = $pdo -> fetch();
        //var_dump($resultado);
        $pdo = null;
        return $resultado;
    }


    //Editar Carreras
    static public function EditarCarreraM($tablaBD, $id){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();
        $resultado=$pdo -> fetch();
        $pdo=null;
        return $resultado;

        /*$pdo -> close();
        $pdo = null;*/

    }



    //Actualizar Carreras
    static public function ActualizarCarrerasM($tablaBD, $datosC){
        $respuesta=false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["carrera"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta=true;
        }
        $pdo = null;
        return $respuesta;

        /*$pdo -> close();
        $pdo = null;*/

    }



    //Borrar Carreras
    static public function BorrarCarrerasM($tablaBD, $id){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            $respuesta=true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



}