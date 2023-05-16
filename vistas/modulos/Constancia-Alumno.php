<?php

if($_SESSION["rol"] != "Estudiante"){

    echo '<script>

	window.locations = "inicio";
	</script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content">

        <div class="box">

            <div class="box-body">

                <h2>Constancia de Alumno</h2>

                <form method="post">

                    <?php

                    echo '<h3>Alumno: '.$_SESSION["apellido"].', '.$_SESSION["nombre"].'</h3>';

                    $columna = "id";
                    $valor = $_SESSION["id_carrera"];

                    $carrera = CarrerasC::VerCarreras2C($columna, $valor);

                    echo '<h3>Carrera: '.$carrera["nombre"].'</h3>

					<h3>Libreta: '.$_SESSION["libreta"].'</h3>

					<input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'">
					<input type="hidden" name="tipo" value="alumno">
					<input type="hidden" name="estado" value="No Impreso">';

                    $columna = "id_alumno";
                    $valor = $_SESSION["id"];

                    $cert = CertificadosC::VerCertificadosC($columna, $valor);

                    foreach ($cert as $key => $value) {

                        if($_SESSION["id"] == $value["id_alumno"] && $value["tipo"] == "alumno"){

                            echo '<div class="alert alert-success">Ya ha solicitado el Certificado de Alumno.</div>';

                        }

                    }

                    echo '
					<button class="btn btn-primary btn-lg" type="submit">Pedir Certificado</button>
					';


                    $certificado = new CertificadosC();
                    $certificado -> PedirCertificadosC();


                    ?>



                </form>

            </div>

        </div>

    </section>

</div>