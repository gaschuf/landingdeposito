<? 
include '../includes/conn.php'; 
$familia = mysql_query ("select * from familias", $connect);
// MODIFICACION
if(isset($_GET['ID']))  {
	
	$id =  $_GET['ID'];
	$categoryyUpdate = mysql_query ("SELECT * FROM categorias WHERE id='".$id."' " , $connect);
    $data = mysql_fetch_array($categoryyUpdate);
	?>
    <div id="formUpdate" style="padding:10px; background:#fff;">

        	<h2>Modificación de Categoria</h2>
        	<form id="formCategorias" name="form1" method="post" enctype="multipart/form-data"> 
			 <input type="hidden" name="id" value="<?=$data[id] ?>">
			  <fieldset>
			<label for="selectfamilia">Familia de Pertenencia:</label><br />
			<div class="select">
			 <select name="selectfamilia">
				<?
                while ($dataf = mysql_fetch_array ($familia))
                {														
              echo '<option  value="'.$dataf[id].'"'.(($dataf[id]==$data[idfamilia])?'selected="selected"':"").'>('.$dataf[id].') '.$dataf[nombre].'</option>';
             
			    }?>
            </select>
			</div>
   			</fieldset>    
          <fieldset>
		   <label for="nombre">Nombre</label>
            <input name="nombre" type="text" id="nombre" value="<?=$data[nombre] ?>" size=45 required /> 
              </fieldset>
              <fieldset>
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" type="text" id="descripcion" value="<?=$data[descripcion] ?>" size=45 required /> 
            </fieldset>
              <fieldset> 
            <label for="imagen">Imagen</label><br />
   			 <img src="../img/uploads/categorias/<?=$data[image] ?>" style="width:100px;" />
			 <input type="hidden" name="img"  id="img" value="<?=$data[image] ?>" >
			 <input id="newimage" name="newimage" size="30" type="file" accept="image/gif, image/jpg, image/png"  />
              </fieldset>
           
              <fieldset>
                <label for="radio">Habilitado</label>
                <div class="radio">
                
               <? if  ($data[enable]  == "1") {
				?>
             <span>
                        <input type="radio" tabindex="12" name="habilitado" id="r5" value="1" checked>
                        <label for="r5" onclick="">SI</label>
                    </span>
                    <span> 
                        <input type="radio" tabindex="13" name="habilitado" id="r6" value="0">
                        <label for="r6" onclick="">No</label>
                </span>
				<? } else  { ?>
             <span>
                        <input type="radio" tabindex="12" name="habilitado" id="r5" value="1">
                        <label for="r5" onclick="">SI</label>
                    </span>
                    <span> 
                        <input type="radio" tabindex="13" name="habilitado" id="r6" value="0" checked>
                        <label for="r6" onclick="">No</label>
                </span> 
				<? } ?>
            
            		</div>
                    </fieldset>	
          <input type="button" name="close" id="button" value="Cancelar" class="fright" onclick="jQuery('#cboxClose').click();" /> 
             <input type="submit" name="update" id="button" value="Guardar" class="fright" /> 
             
            </form> 
        
        </div>
 <?  }

//ALTA 
else  { ?>
        <div id='formAlta' style='padding:10px; background:#fff;'>
        	<h2>Alta de Categoria </h2>
        	<form id="formCategorias" name="formAlta" method="post" enctype="multipart/form-data"> 
            <fieldset>
			<label for="selectfamilia">Familia de Pertenencia:</label><br />
			<div class="select">
			 <select name="selectfamilia">
				<?
                while ($data = mysql_fetch_array ($familia))
                {
                echo '<option value="'.$data[id].'">('.$data[id].') '.$data[nombre].'</option>';
                }?>
            </select>
			</div>
   			</fieldset>    
			<fieldset>
           <label for="nombre">Nombre</label>
            <input name="nombre" type="text" id="nombre" value="" size=45 required /> 
              </fieldset>
              <fieldset>
            <label for="descripcion">Descripcion</label>
            <input name="descripcion" type="text" id="descripcion" value="" size=45 required /> 
            </fieldset>
              <fieldset> 
            <label for="imagen">Imagen</label>
   			 <input id="imagen" name="imagen" size="30" type="file" accept="image/gif, image/jpg, image/png" required />
              </fieldset>
           
              <fieldset>
                <label for="radio">Habilitado</label>
                <div class="radio">
             <span>
                        <input type="radio" tabindex="12" name="habilitado" id="r5" value="1" checked>
                        <label for="r5" onclick="">SI</label>
                    </span>
                    <span>
                        <input type="radio" tabindex="13" name="habilitado" id="r6" value="0">
                        <label for="r6" onclick="">No</label>
                    </span>
           			</div>
                    </fieldset>	
          <input type="button" name="close" id="button" value="Cancelar" class="fright" onclick="jQuery('#cboxClose').click();" /> 
             <input type="submit" name="insert" id="button" value="Guardar" class="fright" /> 
            </form> 
        
        </div>
 <?   } ?>
 