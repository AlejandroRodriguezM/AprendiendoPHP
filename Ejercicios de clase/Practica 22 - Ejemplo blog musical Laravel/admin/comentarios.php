<?php
    include 'header_admin.php';
    include '../includes/config.php';
    if (isset($_GET['accion']) && $_GET['accion'] == "eliminar") {
        $id = $_GET['id'];
        $sql = sprintf("DELETE FROM comentarios WHERE id = '$id'");
        $del = mysqli_query($conn,$sql);
        if (!$del) die('Invalid query: ' . mysql_error());
        echo "El comentario ha sido eliminado correctamente.";
    }
 
    if (isset($_GET['accion']) && $_GET['accion'] == "aprobar") {
        $id = $_GET['id'];
        $sql = sprintf("UPDATE comentarios SET estado = 1 WHERE id = '$id'");
        $del = mysqli_query($conn,$sql);
        if (!$del) die('Invalid query: ' . mysql_error());
        //echo "El comentario ha sido aprobado correctamente.";
    }
 
    $sql = sprintf("SELECT id, nombre, comentario, estado FROM comentarios ORDER BY id DESC");
    $res = mysqli_query($conn,$sql);
    if (!$res) die('Invalid query: ' . mysql_error());
 
?>
<section> <!-- start div tabla-->
		<div class="container">
			<div class="container">
				<h3> A continuaci&oacute;n puedes ver todos los comentarios de tu sitio y aprobarlos, eliminarlos o no publicarlos.</h3>
				
			</div><br>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead id="cabeza">
						<tr>
							<th>Nombre</th>
							<th>Comentario</th>
							<th>Estado</th>
						</tr>
					</thead>
 
            <tbody>
                <?php while ($com = mysqli_fetch_array($res)) { ?>
                <tr>
                    <td width="250px;"><?php echo strip_tags( $com['nombre']) ?></td>
                    <td><?php echo strip_tags($com['comentario']) ?></td>
                    <td>
                    <?php if ($com['estado'] == 1) {
                        echo "Publicado";
                    } else {
                        echo "Pendiente";
                    } ?></td>
                    <td><a href="comentarios.php?accion=eliminar&id=<?php echo $com['id'] ?>"><img src="../img/eliminar.png"></a></td>
                    <td><a href="comentarios.php?accion=aprobar&id=<?php echo $com['id'] ?>"><img src="../img/ok.png"></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
		</div><!-- end div tabla-->
		</div>
	</section>
<?php include 'footer_admin.php' ?>