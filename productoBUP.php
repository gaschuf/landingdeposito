
   <style type="text/css">
		

			#wrapper {
				width:100%;
			}
			#carousel-wrapper {
				padding-bottom: 10px;
				position: relative;
			}
			#carousel, #thumbs {
				overflow: hidden;
			}
			#carousel-wrapper .caroufredsel_wrapper {

			}

			#carousel span, #carousel img,
			#thumbs a, #thumbs img  {
				display: block;
				float: left;
			}
			#carousel span,
			#thumbs span, #thumbs a {
				position: relative;
			}
			#carousel img,
			#thumbs img {
				border: none;
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0;
				left: 0;
			}
			#carousel img.glare,
			#thumbs img.glare {
				width: 102%;
				height: auto;
			}

			#carousel span {
				width: 554px;
				height: 313px;
			}

			#thumbs-wrapper {
				padding: 20px 40px;
				position: relative;
			}
			#thumbs a {
				border: 1px solid #CCC;
				width: 100px;
				height: 80px;
				margin: 0 10px;
				overflow: hidden;
		
				
				-webkit-transition: border-color .5s;
				-moz-transition: border-color .5s;
				-ms-transition: border-color .5s;
				transition: border-color .5s;
			}
			#thumbs a:hover, #thumbs a.selected {
				border-color: #00F;
			}
			
			#wrapper img#shadow {
				width: 100%;
				position: absolute;
				bottom: 0;
			}

			#prev, #next {
				background: transparent url('img/gui/carousel_nav.png') no-repeat 0 0;
				display: block;
				width: 19px;
				height: 20px;
				margin-top: -10px;
				position: absolute;
				top: 50%;
			}
			#prev {
				background-position: 0 0;
				left: 10px;
			}
			#next {
				background-position: -19px 0;
				right: 10px;
			}			
			#prev:hover { 
				background-position: 0 -20px;				
			}
			#next:hover {
				background-position: -19px -20px;				
			}
			#prev.disabled, #next.disabled {
				display: none !important;
			}
		
		</style>
<?  
include 'includes/head.php'; 
include 'includes/conn.php'; 
?>

<?php
$producto = mysql_query ("select * from productos where id = ".$_GET["idproducto"]." ", $connect);
$nombrefamilia = $_GET["nombrefamilia"];
$nombrecategoria = $_GET["nombrecategoria"];
$idcategoria = $_GET["idcategoria"];

// función while
?>


<section class="row products">
  <div class="grid_8">
	<div class="row breadcrumbs" style="display:block"> 
		<a href="familias.php"><h2>HOME ></h2></a><a href="categoria.php?idcategoria=<?=$idcategoria?>&nombrefamilia=<?=$nombrefamilia ?>"><h2><?= $nombrefamilia ?>  ></h2></a><a href="productos.php?idcategoria=<?=$idcategoria?>&nombrefamilia=<?=$nombrefamilia ?>&nombrecategoria=<?=$nombrecategoria ?>"><h2><?= $nombrecategoria ?></h2></a>
		</div>
        <article class="row"> 
			<? while ($row = mysql_fetch_array ($producto))
				{
				 if($row[enable]==1) {  ?>
				
				 <div class="grid_4">
					 <div id="wrapper">
							<div id="carousel-wrapper">
								<img id="shadow" src="img/gui/carousel_shadow.png" />
								<div id="carousel">
									<span id="1"><a href="img/uploads/productos/<? $row[image] ?>" class="popimage"><img src="img/uploads/productos/<? $row[image] ?>" /></a></span>
									<span id="2"><a href="img/uploads/productos/<? $row[image] ?>" class="popimage"><img src="img/uploads/productos/<? $row[image] ?>" /></a></span>
									<span id="3"><a href="img/uploads/productos/<? $row[image] ?>" class="popimage"><img src="img/uploads/productos/<? $row[image] ?>" /></a></span>
									<span id="4"><a href="img/uploads/productos/<? $row[image] ?>" class="popimage"><img src="img/uploads/productos/<? $row[image] ?>" /></a></span>


								</div>
							</div>
							<div id="thumbs-wrapper">
								<div id="thumbs">
									<a href="#1" class="selected"><img src="img/uploads/productos/<? $row[image] ?>" /></a>
									<a href="#2"><img src="img/uploads/productos/<? $row[image] ?>" /></a>
									<a href="#3"><img src="img/uploads/productos/<? $row[image] ?>" /></a>
									<a href="#4"><img src="img/uploads/productos/<? $row[image] ?>" /></a>
									
								</div>
								<a id="prev" href="#"></a>
								<a id="next" href="#"></a>
							</div>
					</div>
					
				</div>
				 <div class="grid_4">
				 <h3><? $row[nombre] ?></h3>	
				<p><? $row[image] ?></p>
				</div>
				<? }
				} ?> 
			
			<?
			mysql_free_result ($producto);
			?>
            
        
        </article>
  </div>
  <div class="grid_4 form">
		<?  include 'includes/form.php'; ?>
	</div>
	
</section>
<?  include 'includes/foot.php'; ?>
<script src="js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
<script type="text/javascript">
			$(function() {
				
			

				$('#carousel').carouFredSel({
					responsive: true,
					circular: false,
					auto: false,
					items: {
						visible: 1,
						width: 200,
						height: '56%'
					},
					scroll: {
						fx: 'directscroll'
					}
				});

				$('#thumbs').carouFredSel({
					responsive: true,
					circular: false,
					infinite: false,
					auto: false,
					prev: '#prev',
					next: '#next',
					items: {
						visible: {
							min: 2,
							max: 6
						},
						width: 150,
						height: '66%'
					}
				});

				$('#thumbs a').click(function() {
					$('#carousel').trigger('slideTo', '#' + this.href.split('#').pop() );
					$('#thumbs a').removeClass('selected');
					$(this).addClass('selected');
					return false;
				});

			});
		</script>