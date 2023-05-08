<?php

require_once "ConexionBD.php";

class MateriasM extends ConexionBD{

    static public function CrearMateriaM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa) VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");

        $pdo -> bindParam("id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo -> bindParam("codigo", $datosC["codigo"], PDO::PARAM_STR);
        $pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam("grado", $datosC["grado"], PDO::PARAM_STR);
        $pdo -> bindParam("tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo -> bindParam("programa", $datosC["programa"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



    static public function VerMateriasM($tablaBD){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD ORDER BY grado, codigo ASC");

        $pdo -> execute();

        $resultado = $pdo -> fetchAll();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }



    static public function VerMaterias2M($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetch();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }


    static public function EliminarMateriaM($tablaBD, $id){
        $respuesta=false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }




    static public function CrearComisionM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_materia, c_maxima, numero, dias, horario) VALUES (:id_materia, :c_maxima, :numero, :dias, :horario)");

        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo -> bindParam(":c_maxima", $datosC["c_maxima"], PDO::PARAM_INT);
        $pdo -> bindParam(":numero", $datosC["numero"], PDO::PARAM_INT);
        $pdo -> bindParam(":dias", $datosC["dias"], PDO::PARAM_STR);
        $pdo -> bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }




    static public function VerComisionesM($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY numero ASC");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetchAll();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }


    static public function VerComisiones2M($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetch();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }



    static public function BorrarComisionM($tablaBD, $id){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo-> close();
        $pdo = null;
        return $respuesta;

    }

    static public function ColocarNotaM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, fecha, profesor, nota_final, estado) VALUES (:id_alumno, :libreta, :id_materia, :fecha, :profesor, :nota_final, :estado)");

        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



    static public function VerNotasM($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetchAll();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }


    static public function VerNotas2M($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

        $pdo -> execute();

        $resultado = $pdo -> fetch();

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }



    static public function CambiarNotaM($tablaBD, $datosC){
       $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("UPDATE $tablaBD SET fecha = :fecha, profesor = :profesor, estado = :estado, nota_final = :nota_final WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }



    static public function InscribirMateriaM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision) VALUES (:id_alumno, :id_materia, :id_comision)");

        $pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }




    static public function VerInscMateriasM($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        $resultado = $pdo -> fetchAll();

        //$pdo->close();
        $pdo = null;
        return $resultado;

    }


    static public function VerInscMaterias2M($tablaBD, $columna, $valor){
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        $resultado = $pdo -> fetch();

        //$pdo->close();
        $pdo = null;
        return $resultado;

    }



    static public function BorrarInscMM($tablaBD, $id){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;

        return $respuesta;


    }



    static public function VaciarRegistrosMateriasM($tablaBD){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("DELETE FROM $tablaBD");

        if($pdo -> execute()){
            $respuesta =true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }


}