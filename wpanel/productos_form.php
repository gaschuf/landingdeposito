
<? 
include '../includes/conn.php'; 
$categorias = mysql_query ("select * from categorias", $connect);
// MODIFICACION
if(isset($_GET['ID']))  {
	
	$id =  $_GET['ID'];
	$productUpdate = mysql_query ("SELECT * FROM productos WHERE id='".$id."' " , $connect);
    $data = mysql_fetch_array($productUpdate);
	
	$fotos = unserialize( $data[image]);
		
    ?>
    <div id="formUpdate" style="padding:10px; background:#fff;">

        	<h2>Modificación de Producto</h2>
        	<form id="formFamilias" name="form1" method="post" enctype="multipart/form-data"> 
			 <input type="hidden" name="id" value="<?=$data[id] ?>">
              <fieldset>
			<label for="selectcategoria">Categoria de Pertenencia:</label><br />
			<div class="select">
			 <select name="selectcategoria">
				<?
                while ($datac = mysql_fetch_array ($categorias))
                {														
              echo '<option  value="'.$datac[id].'"'.(($datac[id]==$data[idcategoria])?'selected="selected"':"").'>('.$datac[id].') '.$datac[nombre].'</option>';
             
			    }?>
            </select>
			</div>
   			</fieldset>
			<div>
              <fieldset style="width:49%;display: inline-block;">
           <label for="nombre">Nombre</label>
            <input name="nombre" type="text" id="nombre" value="<?=$data[nombre] ?>" size=45 required /> 
              </fieldset>
				<fieldset style="width:49%;display: inline-block;">
			<label for="subtitulo">Subtitulo</label>
            <input name="subtitulo" type="text" id="subtitulo" value="<?=$data[subtitulo] ?>" size=45  /> 
              </fieldset>
			</div>
              <fieldset>
			<label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" style="width:100%; line-height: 20px; height:300px;" rows="300"><?=$data[descripcion] ?></textarea>
            </fieldset>
              
              <fieldset> 
            <label for="imagen">Imagen</label><br />
            
				<? foreach ($fotos as $key => $foto) 
            { 
               echo '<div  id="'.$key.'"><img src="../img/uploads/productos/'.$foto.'" style="width:100px; " /><input type="hidden" name="oldimagen[]"   value="'.$foto.'" > <button type="button"  style="float:none" value="'.$key.'" id class="imageClear">Borrar Imagen</button></div>'; 
            } ?>
   			 
             <script>
			 $(document).ready(function() {
					$('.imageClear').click(function(e) { 
								
							var foto = $(this).val();
							
							$('#'+foto).remove();
							
								
					});
				});
		
					</script>
                  
            
             
			 
             <div id="InputsWrapper"><br />   
             <a href="#" id="AddButton" class="btn blue small">Agregar Imagen</a>
              </div>
             
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
 <?  } else  { ?>
        <div id='formAlta' style='padding:10px; background:#fff;'>
        	<h2>Alta de Producto </h2>
        	<form id="formFamilias" name="formAlta" method="post" enctype="multipart/form-data"> 
              <fieldset>
			<label for="selectcategoria">Categoria de Pertenencia:</label><br />
			<div class="select">
			 <select name="selectcategoria">
				<?
                while ($data = mysql_fetch_array ($categorias))
                {
                echo '<option value="'.$data[id].'">('.$data[id].') '.$data[nombre].'</option>';
                }?>
            </select>
			</div>
   			</fieldset>
              <div>	
			<fieldset style="width:49%; display: inline-block;">
           <label for="nombre">Nombre</label>
            <input name="nombre" type="text" id="nombre" value="" size=45 required /> 
              </fieldset>
			<fieldset style="width:49%;display: inline-block;">
			<label for="subtitulo">Subtitulo</label>
            <input name="subtitulo" type="text" id="subtitulo" value="" size=45  /> 
              </fieldset>
			</div>
              <fieldset>
            <label for="descripcion">Descripcion</label>
			
           <textarea name="descripcion" id="descripcion" style="width:100%; line-height: 20px;" rows="100" value=""></textarea>
            </fieldset>
              <fieldset> 
            <label for="imagen">Imagen</label>
             <div id="InputsWrapper">
   			 <input id="imagen" name="imagen[]" size="30" type="file"  required />
             </div>
             <a href="#" id="AddButton" class="btn blue small">Agregar  Otra Imagen</a>
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
<script>
$(document).ready(function() {

var MaxInputs       = 8; //maximum input boxes allowed
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddButton"); //Add button ID

var x = InputsWrapper.length; //initlal text box count
var FieldCount=1; //to keep track of text box added

$(AddButton).click(function (e)  //on add input button click
{
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++; //text box added increment
            //add input box
            $(InputsWrapper).append('<div><input type="file" name="imagen[]" id="imagen_'+ FieldCount +'"  /><a href="#" class="removeclass">&times;</a></div>');
            x++; //text box increment
        }
return false;
});

$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
                $(this).parent('div').remove(); //remove text box
                x--; //decrement textbox
        }
return false;
}) 

});
</script>
 