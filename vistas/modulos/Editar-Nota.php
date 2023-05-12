<?php
if($_SESSION["rol"] != "Administrador"){

    echo '<script>

	window.locations = "http://localhost/learnphp/gestionU/inicio";
	</script>';

    return;

}
?>
<div class="content-wrapper">

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <?php

                    $exp = explode("/", $_GET["url"]);

                    $columna = "libreta";
                    $valor = $exp[2];

                    $estudiante = UsuariosC::VerUsuariosC($columna, $valor);

                    echo '<h2>Alumno: '.$estudiante["apellido"].' '.$estudiante["nombre"].' - Libreta: '.$estudiante["libreta"].'</h2>';

                    echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">

					<input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">

					<input type="hidden" name="id_carrera" value="'.$exp[1].'">';

                    $columna = "id";
                    $valor = $exp[1];

                    $materia = MateriasC::VerMaterias2C($columna, $valor);

                    echo '<h2>Materia: '.$materia["nombre"].'</h2>

					<input type="hidden" name="id_materia" value="'.$materia["id"].'">';

                    ?>


                    <div class="row">

                        <div class="col-md-6 col-xs-12">
                            <?php
                            $columna = "id";
                            $valor = $exp[3];
                            $resultado = MateriasC::VerNotas2C($columna, $valor);
                            echo '<h2>Fecha:</h2>
                            <input type="text" class="input-lg" name="fecha" value="'.$resultado["fecha"].'">
                            <input type="hidden" class="input-lg" name="nota_id" value="'.$resultado["id"].'">

                            <h2>Profesor:</h2>
                            <input type="text" class="input-lg" name="profesor" value="'.$resultado["profesor"].'">

                        </div>

                        <div class="col-md-6 col-xs-12">

                            <h2>Estado Actual: '.$resultado["estado"].'</h2>
                            <select class="input-lg" name="estado">

                                <option value="'.$resultado["estado"].'">Seleccionar...</option>

                                <option value="No Cursada">No Cursada</option>
                                <option value="Aprobado">Aprobado</option>
                                <option value="Regular">Regular</option>
                                <option value="Desaprobado">Desaprobado</option>

                            </select>

                            <h2>Nota Final:</h2>
                            <input type="text" class="input-lg" name="nota_final" value="'.$resultado["nota_final"].'">';
                            ?>

                            <br><br>

                            <button class="btn btn-success btn-lg" type="submit">Guardar Nota</button>

                        </div>

                    </div>

                    <?php

                    $notas = new MateriasC();
                    $notas -> CambiarNotaC();

                    ?>

                </form>

            </div>

        </div>

    </section>

</div>