<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{


    //Iniciar Sesion
    static public function IniciarSesionM($tablaBD, $datosC){

        //$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta");
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE libreta = :libreta");
        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        //$pdo ->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> execute();
        if (!$pdo) {
            print_r($pdo->errorInfo());
        }

        if ($pdo->rowCount() == 0) {
            return null;
        }
        $resultado = $pdo->fetch();
        //var_dump($resultado);
        $pdo = null;
        return $resultado;
        //$pdo -> close();
    }


    //Ver Mis Datos
    static public function VerMisDatosM($tablaBD, $id){

        //$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();
        $resultado = $pdo->fetch();
        $pdo = null;
        return $resultado;

        /*$pdo -> close();
        $pdo = null;*/

    }



    //Guardar Mis Datos
    static public function GuardarDatosM($tablaBD, $datosC){

        //$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, correo = :correo, preparatoria = :preparatoria, pais = :pais, clave = :clave WHERE id = :id");
        $respuesta=false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("UPDATE $tablaBD SET fechanac = :fechanac, direccion = :direccion, telefono = :telefono, correo = :correo, preparatoria = :preparatoria, pais = :pais, clave = :clave WHERE id = :id");
        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
        $pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo -> bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo -> bindParam(":preparatoria", $datosC["preparatoria"], PDO::PARAM_STR);
        $pdo -> bindParam(":pais", $datosC["pais"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta=true;
            //return true;
        }
        $pdo = null;
        return $respuesta;

        /*$pdo -> close();
        $pdo = null;*/

    }

    //Crear Usuarios
    static public function CrearUsuarioM($tablaBD, $datosC){
        $respuesta=false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("INSERT INTO $tablaBD (libreta, clave, apellido, nombre, id_carrera, rol) VALUES (:libreta, :clave, :apellido, :nombre, :id_carrera, :rol)");

        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;

    }




    //Ver Usuarios
    static public function VerUsuariosM($tablaBD, $columna, $valor){
        $resultado="";
        if($columna != null){
            $conexion = new ConexionBD();
            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            $resultado = $pdo -> fetch();

        }else{
            $conexion = new ConexionBD();
            $pdo = $conexion->cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            $resultado = $pdo -> fetchAll();

        }

        //$pdo -> close();
        $pdo = null;
        return $resultado;

    }



    //Actualizar Usuarios
    static public function ActualizarUsuariosM($tablaBD, $datosC){
        $respuesta = false;
        $conexion = new ConexionBD();
        $pdo = $conexion->cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, libreta = :libreta, clave = :clave, id_carrera = :id_carrera, rol = :rol WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

        if($pdo -> execute()){
            $respuesta = true;
        }

        //$pdo -> close();
        $pdo = null;
        return $respuesta;
    }



    //Eliminar Usuarios
    static public function EliminarUsuariosM($tablaBD, $id){
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

}