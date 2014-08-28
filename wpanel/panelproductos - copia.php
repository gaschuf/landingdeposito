
<?
include 'includes/head.php'; 
include '../includes/conn.php'; 

// Borrar producto
if(isset($_POST['delete']))  {

if (!$db_selected) { 
die ('Cant use tarea : ' . mysql_error()); 
} 
$id =  $_POST['id'];
$delete = "DELETE  from productos WHERE id='".$id."'";

$res = mysql_query($delete, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:right;">Producto Eliminado Correctamente</h1></div></section>';
} else

// nuevo
if(isset($_POST['insert']))  {
 
if (!$db_selected) { 
die ('Cant use tarea : ' . mysql_error()); 
} 
// Tomar los campos provenientes del Formulario 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$habilitado = $_POST['habilitado']; 
$idcategoria = $_POST['selectcategoria']; 

//Image upload
// Recibo los datos de la imagen
$nombrefoto = $_FILES['imagen']['name'];
// Ruta donde se guardarán las imágenes
$directorio = $_SERVER['DOCUMENT_ROOT'].'/landingDeposito/img/uploads/productos/'.$nombrefoto;
	
// Muevo la imagen desde su ubicación
// temporal al directorio definitivo
move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio);

// Insertar campos en la Base de Datos 
$insfamilia = "INSERT INTO productos (nombre, descripcion, image, enable, idcategoria) "; 
$insfamilia.= "VALUES ('".$nombre."', '".$descripcion."', '".$nombrefoto."', '".$habilitado."' , '".$idcategoria."') "; 
$res = mysql_query($insfamilia, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:right;">Producto Agregado		 Correctamente</h1></div></section>';

}
// actualizacion

else if (isset($_POST['update']))  {
 
if (!$db_selected) { 
die ('Cant use tarea : ' . mysql_error()); 
} 
// Tomar los campos provenientes del Formulario 
$id = $_POST['id']; 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$habilitado = $_POST['habilitado']; 
$idcategoria = $_POST['selectcategoria']; 

// pregunto si actualizo la imagen si 
if  ($_FILES['newimage']['size'] == 0) {
	$nombrefoto = $_POST['img'];
} else  { 
// Recibo los datos de la imagen
$nombrefoto = $_FILES['newimage']['name'];
// Ruta donde se guardarán las imágenes
$directorio = $_SERVER['DOCUMENT_ROOT'].'/landingDeposito/img/uploads/productos/'.$nombrefoto;
// Muevo la imagen desde su ubicación temporal al directorio definitivo
move_uploaded_file($_FILES['newimage']['tmp_name'], $directorio);
} 

// Insertar campos en la Base de Datos 
$update = "UPDATE  productos  set nombre = '".$nombre."', descripcion = '".$descripcion."', image = '".$nombrefoto."', enable = '".$habilitado."', idcategoria = '".$idcategoria."' WHERE id='".$id."'" ;

$res = mysql_query($update, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:right;">Producto Actualizado Correctamente</h1></div></section>';

}
?>



<section class="row" style="text-align:right"><a href="productos_form.php" class="pop btn blue small">Agregar Producto</a></section>
<section class="row abm">
  <? include 'includes/menu.php'; ?>
  <div class="grid_9">
	<div>
	<h2>Modificacion de Productos</h2>
        <table>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
             <td>Categoria</td>
            <td>Descripcion</td>
            <td>Imagen</td>
			 <td>Habilitado</td>
			 <td>Modificar</td>
        </tr>
        <?
		$productos = mysql_query ("select categorias.id, categorias.nombre as cname, productos.id, productos.nombre, productos.descripcion,  productos.image, productos.enable from  productos left join categorias on categorias.id = productos.idcategoria", $connect);

        while ($rowproductos = mysql_fetch_array ($productos))
        {
        echo '<tr ><td><strong>'.$rowproductos[id].'</strong></td>
        <td><strong>'.$rowproductos[nombre].'</strong></td>
		 <td><strong>'.$rowproductos[cname].'</strong></td>
		<td><strong>'.$rowproductos[descripcion].'</strong></td>
        <td><strong><img width="50px" height="30px" src="../img/uploads/productos/'.$rowproductos[image].'"></strong></td>
		<td><strong>'.$rowproductos[enable].'</strong></td>
		<td><strong><a href="productos_form.php?ID='.$rowproductos[id].'" class="pop btn green small" >EDITAR</a> <br /> <a href="productos_del.php?ID='.$rowproductos[id].'" class="pop btn red small" >ELIMINAR</a></strong></td>
        </tr>';
        }
        
        ?>
        </table>
        <?php
        // reset the recordset after a repeat region
        mysql_data_seek($productos, 0);
        // Cerrar conexión a la Base de Datos 
		mysql_close($connect); 

        ?>
	</div>
	
	<div>
		.	
	</div>	
	</div>
	
</section>

 

<?
include 'includes/foot.php'; 
?>