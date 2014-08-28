<? 
include '../includes/conn.php'; 
$JQUERYCLOSE="jQuery('#cboxClose').click();";
if(isset($_GET['ID']))  {
	
	$id =  $_GET['ID'];
	$familyUpdate = mysql_query ("SELECT * FROM familias WHERE id='".$id."' " , $connect);
    $data = mysql_fetch_array($familyUpdate);
	
	//validar que no haya ninguna categoria
	$sql="select COUNT(*) as result from categorias where idfamilia='".$id."'"; 
	$result=mysql_query($sql); 
	if (mysql_result($result,0) >= 1){ 
	echo '
	<div id="formUpdate" style="padding:10px; background:#fff; height:100%;">
	<h2>NOSE PUEDE ELIMINAR LA FAMILIA YA QUE HAY CATEGORIAS QUE CORRESPONDEN A ESTA, PRIMERO ELIMINE LAS CATEGORIAS Y LUEGO PODRA ELIMINAR LA FAMILIA.</h2>
	   </div>
	'; 
	} else { 
	echo '
	<div id="formUpdate" style="padding:10px; background:#fff; height:100%;">
			<br />
        	<h1>Estas Seguro que queres eliminar:</h1>
            <h2>'.$data[nombre] .'</h2>
             <img src="../img/uploads/familias/'.$data[image] .'" style="width:40%; vertical-align:text-top; margin-right:20px"   /><span>'.$data[descripcion].'</span>
        <form id="formFamiliasdel" enctype="multipart/form-data" action="panelfamilias.php" method="post"> 
           <input type="hidden" name="id" value="'.$data[id].'">
		  <input type="submit" name="delete" id="button" value="Eliminar" class="fright btn red" /> 
          <input type="button" name="close" id="button" value="Cancelar" class="fright" onclick="'.$JQUERYCLOSE.'" /> 
          
            
        </form>     
          
        </div>
	
	
	'; 
	}  
	?>
    
 <?  } ?>