
<?
include 'includes/head.php'; 
include '../includes/conn.php'; 

// Borrar categoria
if(isset($_POST['deletecat']))  {

if (!$db_selected) { 
die ('Cant use tarea : ' . mysql_error()); 
} 
$id =  $_POST['id'];
$delete = "DELETE from categorias  WHERE id='".$id."'";

$res = mysql_query($delete, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:right;">Categoria Eliminada Correctamente</h1></div></section>';
} else

// nuevo
if(isset($_POST['insert']))  {
 
if (!$db_selected) { 
die ('Cant use tarea : ' . mysql_error()); 
} 
// Tomar los campos proven	ientes del Formulario 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$habilitado = $_POST['habilitado']; 
$idfamilia = $_POST['selectfamilia']; 


//Image upload
// Recibo los datos de la imagen
$nombrefoto = $_FILES['imagen']['name'];
// Ruta donde se guardarán las imágenes
$directorio = $_SERVER['DOCUMENT_ROOT'].'/landingDeposito/img/uploads/categorias/'.$nombrefoto;
	
// Muevo la imagen desde su ubicación
// temporal al directorio definitivo
move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio);

// Insertar campos en la Base de Datos 
$inscategoria = "INSERT INTO categorias (nombre, descripcion, image, enable, idfamilia) "; 
$inscategoria.= "VALUES ('".$nombre."', '".$descripcion."', '".$nombrefoto."', '".$habilitado."', '".$idfamilia."') "; 
$res = mysql_query($inscategoria, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:center;">Categoria Agregada Correctamente</h1></div></section>';

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
$idfamilia = $_POST['selectfamilia']; 

// pregunto si actualizo la imagen si 
if  ($_FILES['newimage']['size'] == 0) {
	$nombrefoto = $_POST['img'];
} else  { 
// Recibo los datos de la imagen
$nombrefoto = $_FILES['newimage']['name'];
// Ruta donde se guardarán las imágenes
$directorio = $_SERVER['DOCUMENT_ROOT'].'/landingDeposito/img/uploads/categorias/'.$nombrefoto;
// Muevo la imagen desde su ubicación temporal al directorio definitivo
move_uploaded_file($_FILES['newimage']['tmp_name'], $directorio);
} 

// Insertar campos en la Base de Datos 
$update = "UPDATE  categorias  set nombre = '".$nombre."', descripcion = '".$descripcion."', image = '".$nombrefoto."', enable = '".$habilitado."', idfamilia = '".$idfamilia."' WHERE id='".$id."'" ;

$res = mysql_query($update, $connect) or die(mysql_error()); 

echo '<section class="row"><div class="grid_4">&nbsp;</div><div class="grid_8"><h1 style="text-align:right;">Categoria Actualizada Correctamente</h1></div></section>';

}
?>



<section class="row" style="text-align:right"><a href="categoria_form.php" class="pop btn blue small">Agregar Categoria</a></section>
<section class="row abm">
  <? include 'includes/menu.php'; ?>
  <div class="grid_9">
	<div>
	<h2>Modificacion de Categorias</h2>
        <table>
        <tr>
            <td>ID</td>
			<td>Nombre</td>
            <td>Familia</td>
            <td>Descripcion</td>
            <td>Imagen</td>
			 <td>Habilitado</td>
			 <td>Modificar</td>
            
        </tr>
        <?
		$categorias = mysql_query ("select familias.id, familias.nombre as fname, categorias.id, categorias.nombre, categorias.descripcion,  categorias.image, categorias.enable from  categorias left join familias on familias.id = categorias.idfamilia ", $connect);

	
        while ($rowcategorias = mysql_fetch_array ($categorias))
        {
        echo '<tr ><td><strong>'.$rowcategorias[id].'</strong></td>
		<td><strong>'.$rowcategorias[nombre].'</strong></td>
		 <td><strong>'.$rowcategorias[fname].'</strong></td>
		<td><strong>'.$rowcategorias[descripcion].'</strong></td>
        <td><strong><img width="50px" height="30px" src="../img/uploads/categorias/'.$rowcategorias[image].'"></strong></td>
		<td><strong>'.$rowcategorias[enable].'</strong></td>
		<td><strong><a href="categoria_form.php?ID='.$rowcategorias[id].'" class="pop btn green small" >EDITAR</a> <br /> <a href="categoria	_del.php?ID='.$rowcategorias[id].'" class="pop btn red small" >ELIMINAR</a></strong></td>
        </tr>';
        }
        
        ?>
        </table>
        <?php
        // reset the recordset after a repeat region
        mysql_data_seek($categorias, 0);
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