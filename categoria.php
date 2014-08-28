<?  
include 'includes/head.php'; 
include 'includes/conn.php'; 
?>

<?php
$idfamilia = $_GET["idfamilia"];
$categoria = mysql_query ("select * from categorias where idfamilia = ".$idfamilia." ", $connect);

$nombrefamilia = $_GET["nombrefamilia"];


// función while
?>


<section class="row products">
  <div class="grid_8">
		<div class="row breadcrumbs" style="display:block"> 
		<a href="familias.php"><h2>HOME ></h2></a><h2><?= $nombrefamilia ?></h2>
		</div>
        <div class="row"> 
			<? while ($row = mysql_fetch_array ($categoria))	
				{
				 if($row[enable]==1) { echo '
				 <article class="grid_3">
				 			<h3>'.$row[nombre].'</h3>	
				 		  <div class="view view-first">
								<a href="productos.php?idcategoria='.$row[id].'&nombrefamilia='.$nombrefamilia.'&nombrecategoria='.$row[nombre].'&idfamilia='.$idfamilia.'">
								<img src="img/uploads/categorias/'.$row[image].'" alt="Imagen '.$row[nombre].'">
								<div class="mask">
									<!--<h2>Hover Style #1</h2>-->
									<p>'.$row[descripcion].'</p>
									<span class="ver">+ VER</span>
								</div>
								</a>
						</div>
						</article>
				';}
				}?> 
			
			<?
			mysql_free_result ($categoria);
			?>
            
        
        </div>
  </div>
  <div class="grid_4 form">
		<?  include 'includes/form.php'; ?>
	</div>
	
</section>
<?  include 'includes/foot.php'; ?>
