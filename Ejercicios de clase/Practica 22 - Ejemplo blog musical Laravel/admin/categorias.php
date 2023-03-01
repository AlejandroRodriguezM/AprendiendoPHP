<?php include 'header_admin.php';
include '../includes/config.php';
    if(isset($_GET['a']) && $_GET['a'] == "c") {
        $nombre = $_POST['categoria'];
        $sql = sprintf("INSERT INTO categorias VALUES (NULL, '$nombre')");
        $res = mysqli_query($conn,$sql);
        if (!$res) die('Invalid query: ' . mysql_error());
    } else if(isset($_GET['a']) && $_GET['a'] == "m") {
        $nombre = $_POST['categoria'];
        $id = $_GET['id'];
        $sql = sprintf("UPDATE categorias SET categoria = '$nombre' WHERE id = '$id'");
        $res = mysqli_query($conn,$sql);
        if (!$res) die('Invalid query: ' . mysql_error());
    }
    if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
        $id = $_GET['id'];
        $sql = sprintf("DELETE FROM categorias WHERE id = '$id'");
        $del = mysqli_query($conn,$sql);
        if (!$del) die('Invalid query: ' . mysql_error());
    }
     
    $sql = sprintf("SELECT id, categoria FROM categorias ORDER BY id DESC");
    $res = mysqli_query($conn,$sql);
    if (!$res) die('Invalid query: ' . mysql_error());
 
 ?>
 
 <section> <!-- start div tabla-->
		<div class="container">
			<div class="container">
				<h2> Categor&iacute;as</h2>
				<a  class="btn btn-primary" href="?accion=crear">Crear nueva categor&iacute;a</a>
			</div><br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead id="cabeza">
						<tr>
							<th>Categor&iacute;a</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>

            <tbody>
                <?php while ($categoria = mysqli_fetch_array($res)) { ?>
                <tr>
                    <td class="titulo"><a href="categorias.php?id=<?php echo $categoria['id'] ?>&cat=<?php echo $categoria['categoria'] ?>"><?php echo $categoria['categoria'] ?></a></td>
                    <td><a href="categorias.php?accion=editar&id=<?php echo $categoria['id'] ?>&cat=<?php echo $categoria['categoria'] ?>"><img src="../img/editar.png"></a></td>
                    <td><a href="categorias.php?accion=eliminar&id=<?php echo $categoria['id'] ?>"><img src="../img/eliminar.png"></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
		</div><!-- end div tabla-->
		<div>
			<?php if(isset($_GET['accion']) && $_GET['accion'] == "crear") { ?>
			<h2>Alta nueva categor&iacute;a</h2>
			<form method="post" action="categorias.php?a=c">
			  <div class="form-group">
				<label for="categoria">Nombre categor&iacute;a</label>
				<input type="text" name="categoria" class="form-control"></br>
				<input type="submit" name="ok" class="btn btn-success" value="Crear">

			  <div>
			  
		</form>
		<?php } else if (isset($_GET['accion']) && $_GET['accion']=="editar") {?>
		<h2>Modificar categor&iacute;a</h2>
		<form method="post" action="categorias.php?a=m&id=<?php echo $_GET['id'] ?>">
		  <div class="form-group">
			<label for="categoria">Nombre categor&iacute;a</label>
			<input type="text" name="categoria" value="<?php echo $_GET['cat'] ?>" class="form-control"></br>
			<input type="submit" value="Modificar" class="btn btn-success">
		  <div>
		</form>
	<?php } ?>
	</div>
		</div>
	</section>

<?php include 'footer_admin.php' ?>