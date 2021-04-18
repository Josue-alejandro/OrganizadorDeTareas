<?php 

include ('db.php');

if (isset($_POST['guardar_tarea'])){
	$nombre_tarea = $_POST['titulo'];
	$descripcion_tarea = $_POST['descripcion'];

	$query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$nombre_tarea', '$descripcion_tarea')";
	$resultado = mysqli_query($conn, $query);

	if (!$resultado) {
		die("Hubo un error >:O");
	}

	$_SESSION['mensaje'] = 'Se ha agregado una tarea';
	$_SESSION['mensaje_clase'] = 'success';

	header("location: index.php");
}
 ?>