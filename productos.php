<?  
include 'includes/head.php'; 
include 'includes/conn.php'; 
?>

<?php
$idfamilia = $_GET["idfamilia"];
$idcategoria = $_GET["idcategoria"];
$productos = mysql_query ("select * from productos where idcategoria = ".$idcategoria." ", $connect);
$nombrefamilia = $_GET["nombrefamilia"];
$nombrecategoria = $_GET["nombrecategoria"];


// función while
?>


<section class="row products">
  <div class="grid_8">
		<div class="row breadcrumbs" style="display:block"> 
		<a href="index.php"><h2>HOME ></h2></a><a href="categoria.php?idfamilia=<?=$idfamilia?>&nombrefamilia=<?=$nombrefamilia ?>"><h2><?= $nombrefamilia ?>  ></h2></a><h2><?= $nombrecategoria ?></h2>
		</div>
        <div class="row"> 
			<? while ($row = mysql_fetch_array ($productos))
				{
					$fotos = array();
					$fotos = unserialize( $row[image]);
				 if($row[enable]==1) { ?>
				 <article class="grid_3">
				 			<h3><?=$row[nombre] ?></h3>	
				 		  <div class="view view-first">
								<a href="producto.php?idfamilia=<?=$idfamilia?>&idcategoria=<?=$idcategoria ?>&nombrecategoria=<?=$nombrecategoria ?>&nombrefamilia=<?=$nombrefamilia?>&idproducto=<?=$row[id]?>">
								
								<? foreach ($fotos as $key => $foto) 
								{ 
									if ($key == 0) {
										echo '<img src="img/uploads/'.$foto.'" alt="Imagen '.$foto.'">';
									}
									
								}?> 
								<div class="mask">
									<!--<h2>Hover Style #1</h2>-->
									<p><?=$row[descripcion] ?></p>
									<span class="ver">+ VER</span>
								</div>
								</a>
						</div>
						</article>
				<? }
				}?> 
			
			<?
			mysql_free_result ($productos);
			?>
            
        
        </div>
  </div>
  <div class="grid_4 form">
		<?  include 'includes/form.php'; ?>
	</div>
	
</section>
<?  include 'includes/foot.php'; ?>
