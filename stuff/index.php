<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Deposito Norte Equipamiento para estudios</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <script type="text/javascript">
        /mobi/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
          if (!pageYOffset) window.scrollTo(0, 1);
        }, 1000);
    </script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/amazium.css">
    <link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/layout.css">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon.png">

	 <!--IMG Hover Effect -->
   	<link rel="stylesheet" type="text/css" href="css/hovereffect/style_common.css" />
	<link rel="stylesheet" type="text/css" href="css/hovereffect/style1.css" />
</head>
<body>

<header class="row">
    <div class="grid_6 logo">
        <img src="img/logo.png" >
    </div>
	   <div class="grid_6 slogan">
        <h1>Equipamiento para CATV & Estudios</h1>
        </div>
</header>
<section class="row grid-highlight">
    <article class="grid_12 slogan2"><img src="img/greenscreen.jpg" width="35%" align="left" style="margin: 0 20px 20px 0" alt="Equipamiento para estudios de TV">
    <h2>Audio, Video, e Iluminación Profesional</h2><p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p></article>
</section>
<?php
// datos de conexión
$host = "localhost"; 
$usuario = "gaston"; 
$clave = "31464028";
//conectamos a la base 
$connect=mysql_connect ($host, $usuario, $clave);
?>
<?php
//seleccionamos la base
mysql_select_db("landingDeposito",$connect);
$result = mysql_query ("select * from categorias", $connect);
// función while
?>


<section class="row products">
  <div class="grid_8">
        <div class="row"> 
			<? while ($row = mysql_fetch_array ($result))
				{
				 if($row[enable]==1) { echo '
				 <article class="grid_3">
				 			<h3>'.$row[nombre].'</h3>	
				 		  <div class="view view-first">
								<a href="#">
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
			mysql_free_result ($result);
			?>
            
        
        </div>
  </div>
  <div class="grid_4 form">
	<h1><a href="tel:11564591775">(011)156-459-1775</a></h1>
	<p>Escribinos a info@depositonorte.com.ar ó completa el siguiente formulario:</p>
	<form name="" id="formulario" method="" action="" class="">
                     <fieldset>
                <label for="text">Nombre</label>
                <input type="text" name="text" id="text"  autocomplete="on" tabindex="1" />
            </fieldset>
            <fieldset>
                <label for="text">Empresa</label>
                <input type="text" name="text" id="text"  autocomplete="on" tabindex="1" />
            </fieldset>
           <fieldset>
                <label for="tel">Tel</label>
                <input type="tel" name="tel" id="tel"  autocomplete="on" tabindex="23" pattern="[0-9\-.\(\)\+\s]+" />
            </fieldset>
            <fieldset>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autocomplete="on" tabindex="24" />
            </fieldset>
           
            <fieldset>
                <label for="message">Mensaje</label>
                <textarea name="message" id="message"  tabindex="26"></textarea>
            </fieldset>
           
            <fieldset>
                <input type="submit" name="submit" id="submitbtn" tabindex="33" value="Enviar" class="first blue" style="float:right" />
            </fieldset>
        </form>
	</div>
	
</section>


<footer class="row">
    <article class="grid_12"><br /><br /></article>
</footer>





<!-- Scripts -->
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/amazium.js"></script>

</body>
</html>
