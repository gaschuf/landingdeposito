<footer class="row">
    <article class="grid_12"><br /><br /></article>
</footer>


<!-- Scripts -->
<script type="text/javascript" src="js/amazium.js"></script>

<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<script>
$( "#form1" ).validate({
  rules: {
    imagen: {
      required: true,
      accept: "image/*",
	 
    }	
  },
  messages: {
    imagen: {
      required: "Imagenes Admitidas .jpg .png o .gif",
     
    }	
  },
  	
});
</script>


</body>
</html>
