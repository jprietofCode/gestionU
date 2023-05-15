<?php

require_once "ConexionBD.php";

class ExamenesM extends ConexionBD{

    static public function CrearExamenM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_carrera, id_materia, estado, aula, profesor, hora, fecha) VALUES (:id_carrera, :id_materia, :estado, :aula, :profesor, :hora, :fecha)");

        $pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":aula", $datosC["aula"], PDO::PARAM_STR);
        $pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

        if($pdo->execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;

        return $respuesta;

    }




    static public function VerExamenesM($tablaBD, $columna, $valor){
        $resultado = null;
        $conexion = new ConexionBD();
        if($columna == null){
            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            $resultado = $pdo -> fetchAll();

        }else{

            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            $resultado = $pdo -> fetch();

        }

        //$pdo -> close();
        $pdo = null;

        return $resultado;

    }




    static public function InscribirseExamenM($tablaBD, $datosC){
        $resultado = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_examen, libreta) VALUES (:id_alumno, :id_examen, :libreta)");

        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_examen", $datosC["id_examen"], PDO::PARAM_INT);
        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);

        if($pdo->execute()){
            $resultado = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }




    static public function VerInscExamenM($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        $resultado = $pdo -> fetchAll();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }


}