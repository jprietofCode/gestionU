<?php

if($_SESSION["rol"] != "Administrador"){

    echo '<script>

	window.locations = "inicio";
	</script>';

    return;

}

?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Exámenes</h1>
        <p>habilitar y desabilitar mesas de examenes y vaciar registros, apoyarse en la seccion anterior de materias</p>
        <br>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>
                    <tr>

                        <th>Código</th>
                        <th>Nombre</th>
                        <th></th>

                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    $carreras = new CarrerasC();
                    $carrera = $carreras->VerCarrerasC();

                    foreach ($carrera as $key => $value) {

                        echo '<tr>
							
									<td>'.$value["id"].'</td>	
									<td>'.$value["nombre"].'</td>

									<td>
										
										<div class="btn-group">
											
											<a href="Ver-Examenes/'.$value["id"].'">
												<button class="btn btn-success">Ver Exámenes</button>
											</a>

											<a href="Crear-Examenes/'.$value["id"].'">
												<button class="btn btn-primary">Crear Examen</button>
											</a>

										</div>

									</td>

								</tr>';

                    }

                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>