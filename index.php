<?php include("db.php")?>
<?php include ("includes/header.php");?>

<div class="container p-4">
	
	<div class="row">

		<div class="col-md-4">

			<?php if(isset($_SESSION['mensaje'])){ ?>
				<div class="alert alert-<?= $_SESSION['mensaje_clase'] ?> alert-dismissble fade show" role="alert">
					<?= $_SESSION['mensaje'] ?>
				</div>
			<?php session_unset(); }?>

			<div class="card card-body">
				<form action="save.php" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" class="form-control" placeholder="Titulo de la tarea" autofocus="">
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>
					</div>

					<input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="guardar tarea">
				</form>
			</div>
			
		</div>

		<div class="col-md-8">
		<table class="table table-bordered" >
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Descripción</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $query = "SELECT * FROM tareas";
				 $result_tareas = mysqli_query($conn, $query);

				 while ($row = mysqli_fetch_array($result_tareas)) { ?>
				 	<tr>
				 		<td><?php echo $row['titulo']; ?> </td>
				 		<td><?php echo $row['descripcion']; ?> </td>
				 		<td><?php echo $row['fecha']; ?> </td>

				 		<td><a href="edit.php?id=<?php echo $row['id'] ?>" >Edit</a>
				 		<a href="delete.php?id=<?php echo $row['id'] ?>" >Delete</a></td>

				 	</tr>
				 <?php }
				 ?>
			</tbody>
		</table>
	</div>
	</div>

</div>
	

</body>
</html>