

<? 
include '../includes/conn.php'; 
$JQUERYCLOSE="jQuery('#cboxClose').click();";

if(isset($_GET['ID']))  {
	$id =  $_GET['ID'];
	$categorydel = mysql_query ("SELECT * FROM categorias WHERE id='".$id."' " , $connect);
    $data = mysql_fetch_array($categorydel);
	
	//validar que no haya ningun producto
	$sql="select COUNT(*) as result from productos where idcategoria='".$id."'"; 
	$result=mysql_query($sql); 
	if (mysql_result($result,0) >= 1){ 
	echo '
	<div id="formDel" style="padding:10px; background:#fff; height:100%;">
	<h2>NOSE PUEDE ELIMINAR LA CATEGORIA YA QUE HAY PRODUCTOS QUE CORRESPONDEN A ESTA, PRIMERO ELIMINE LOS PRODUCTOS  Y LUEGO PODRA ELIMINAR LA CATEGORIA.</h2>
	   </div>
	'; 
	} else { 
	echo '
	<div id="formDel" style="padding:10px; background:#fff; height:100%;">
			<br />
        	<h1>Estas Seguro que queres eliminar:</h1>
            <h2>'.$data[nombre] .'</h2>
             <img src="../img/uploads/categorias/'.$data[image] .'" style="width:40%; vertical-align:text-top; margin-right:20px"   /><span>'.$data[descripcion].'</span>
        <form id="formcategoriasdel" enctype="multipart/form-data" action="panelcategorias.php" method="post"> 
           <input type="hidden" name="id" value="'.$data[id].'">
		  <input type="submit" name="deletecat" id="button" value="Eliminar" class="fright btn red" /> 
          <input type="button" name="close" id="button" value="Cancelar" class="fright" onclick="'.$JQUERYCLOSE.'" /> 
          
            
        </form>     
          
        </div>
	
	
	'; }  
	  } ?>
