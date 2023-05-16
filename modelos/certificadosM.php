<?php

require_once "ConexionBD.php";

class CertificadosM extends ConexionBD{

    static public function PedirCertificadosM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_alumno, estado, tipo) VALUES (:id_alumno, :estado, :tipo)");

        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



    static public function VerCertificadosM($tablaBD, $columna, $valor){
        $respuesta = "";
        $conexion = new ConexionBD();

        if($columna == null){

            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            $respuesta = $pdo -> fetchAll();

        }else{

            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            $respuesta = $pdo -> fetchAll();

        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }




    static public function CambiarEM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



}