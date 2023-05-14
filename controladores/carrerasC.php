<?php

class CarrerasC{

    //Crear Carrera
    public function CrearCarreraC(){

        if(isset($_POST["carrera"])){

            $tablaBD = "carreras";

            $carrera = $_POST["carrera"];

            $resultado = CarrerasM::CrearCarreraM($tablaBD, $carrera);

            if($resultado == true){

                echo '<script>

				window.location = "Carreras";
				</script>';

            }

        }

    }



    //Ver Carreras
    public function VerCarrerasC(){

        $tablaBD = "carreras";

        $resultado = CarrerasM::VerCarrerasM($tablaBD);

        //var_dump($resultado);
        return $resultado;

    }

    static public function VerCarreras2C($columna, $valor){

        $tablaBD = "carreras";

        $resultado = CarrerasM::VerCarreras2M($tablaBD, $columna, $valor);

        //var_dump($resultado);
        return $resultado;

    }

    //ver Carreras User
    static public function CarreraC($columna, $valor){
        $tablaBD = "carreras";

        $resultado = CarrerasM::CarreraM($tablaBD, $columna, $valor);

        //var_dump($resultado);
        return $resultado;
    }



    //Editar Carrera
    public function EditarCarreraC(){

        $tablaBD = "carreras";

        $exp = explode("/", $_GET["url"]);

        $id = $exp[1];

        $resultado = CarrerasM::EditarCarreraM($tablaBD, $id);

        echo '<div class="col-md-6 col-xs-12">
						
				<h2>Nombre de la Carrera:</h2>
				<input type="text" name="carrera" class="form-control input-lg" value="'.$resultado["nombre"].'" required>

				<input type="hidden" name="Cid" value="'.$resultado["id"].'">

				<br>
				<button class="btn btn-success" type="submit">Guardar Cambios</button>

			</div>';

    }


    //Actualizar Carreras
    public function ActualizarCarrerasC(){

        if(isset($_POST["carrera"])){

            $tablaBD = "carreras";

            $datosC = array("id"=>$_POST["Cid"], "carrera"=>$_POST["carrera"]);

            $resultado = CarrerasM::ActualizarCarrerasM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/learnphp/gestionU//Carreras";
				</script>';

            }

        }

    }




    //Borrar Carreras
    public function BorrarCarrerasC(){

        $exp = explode("/", $_GET["url"]);

        //$id = $exp[1];
        $id = isset($exp[1]) ? (int) $exp[1] : 0; // aseguramos que $id es un entero
        //isset($id)
        if($id > 0){

            $tablaBD = "carreras";

            $resultado = CarrerasM::BorrarCarrerasM($tablaBD, $id);

            if($resultado == true){

                echo '<script>

				window.location = "http://localhost/learnphp/gestionU/Carreras";
				</script>';

            }

        }

    }



}