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
    
    <script type="text/javascript" src="js/jquery-1.11.1.js"></script>
    		<link rel="stylesheet" href="../css/colorbox.css" />
    
    <script src="../js/jquery.colorbox.js"></script>
    <script>
			$(document).ready(function(){
				
				$(".pop").colorbox({
								width:"50%", 
								
				onComplete:function(){
					tinymce.init({
							init_instance_callback : function(editor) {
								console.log("Editor: " + editor.id + " is now initialized.");
							},
							selector: "textarea#descripcion",
							plugins: "textcolor",
							language : 'es_ES',
							menubar : false,
							invalid_elements :"',&#39;",
							entity_encoding : "numeric",
							fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
							style_formats: [
												{title: "Headers", items: [
													{title: "Header 1", format: "h1"},
													{title: "Header 2", format: "h2"},
													{title: "Header 3", format: "h3"},
													{title: "Header 4", format: "h4"},
													{title: "Header 5", format: "h5"},
													{title: "Header 6", format: "h6"}
												]},
											],
							toolbar: "undo redo | forecolor fontsizeselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					
					});
					
					},
				onClosed:function(){ 
       				tinymce.remove();
    				},		
				});
				
			
			});
			
		</script>
<script type="text/javascript" src="includes/tinymce/tinymce.min.js"></script>


	
</head>
<body>
<header class="row">
    <div class="grid_6 logo">
        <img src="img/logo.png" >
    </div>
	   <div class="grid_6 slogan">
        <h1>Wo Panel</h1>
        </div>
</header>