<?  
include 'includes/head.php'; 
include 'includes/conn.php'; 
?>

<?php
$familias = mysql_query ("select * from familias", $connect);
?>


<section class="row products">
  <div class="grid_8 col">
        <div class="row" style="margin-bottom:20px;"> 
			<? while ($row = mysql_fetch_array ($familias))
				{
				 if($row[enable]==1) { echo '
				 		<article class="grid_3">
				 			<h3>'.$row[nombre].'</h3>	
				 		  <div class="view view-first">
								<a href="categoria.php?idfamilia='.$row[id].'&nombrefamilia='.$row[nombre].'">
								<img src="img/uploads/familias/'.$row[image].'" alt="Imagen '.$row[nombre].'">
								<div class="mask">
									<!--<h2>Hover Style #1</h2>-->
									<p>'.$row[descripcion].'</p>
									<span class="ver">+ VER</span>
								</div>
								</a>
						</div>
						</article>';}
				}?> 
			
			<?
			mysql_free_result ($familias);
			?>
    
        </div>
         <div class="row" style="margin-bottom:20px;"> <a href="http://www.depositonorte.com.ar" target="_blank"><img src="img/descarga.jpg" width="100%"  alt="Equipamiento para CATV" /></a> </div>
         <div class="row" > <img src="img/asesoramiento.jpg" width="100%"  alt="Equipamiento para CATV" /> </div>
  </div>
   
  <div class="grid_4 form col">
	<?  include 'includes/form.php'; ?>

	</div>
    

     

</section>
  

<?  include 'includes/foot.php'; ?>