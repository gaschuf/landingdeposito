<? 
include '../includes/conn.php'; 
$JQUERYCLOSE="jQuery('#cboxClose').click();";
if(isset($_GET['ID']))  {
	
	$id =  $_GET['ID'];
	$productsdel = mysql_query ("SELECT * FROM productos WHERE id='".$id."' " , $connect);
    $data = mysql_fetch_array($productsdel);
	 
	echo '
	<div id="formUpdate" style="padding:10px; background:#fff; min-height:500px;">
			<br />
        	<h1>Estas Seguro que queres eliminar:</h1>
            <h2>'.$data[nombre] .'</h2>
             <img src="../img/uploads/productos/'.$data[image] .'" style="width:40%; vertical-align:text-top; margin-right:20px"   /><span>'.$data[descripcion].'</span>
        <form id="formproductosdel" enctype="multipart/form-data" action="panelproductos.php" method="post"> 
           <input type="hidden" name="id" value="'.$data[id].'">
		  <input type="submit" name="delete" id="button" value="Eliminar" class="fright btn red" /> 
          <input type="button" name="close" id="button" value="Cancelar" class="fright" onclick="'.$JQUERYCLOSE.'" /> 
          
            
        </form>     
          
        </div>
	
	
	'; 
	}  
	?>
    