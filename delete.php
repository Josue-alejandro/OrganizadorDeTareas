<?php  

include ("db.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "DELETE FROM tareas WHERE id = $id";
	$resultado = mysqli_query($conn, $query);
	if (!$resultado) {
		die("Query failed");
	}

	$_SESSION['mensaje'] = "Tarea borrada";
	$_SESSION['mensaje_clase'] = "danger";

	header('Location: index.php');
}

?>