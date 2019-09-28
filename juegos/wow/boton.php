<html>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$(document).ready(function(){ 
  
    $('#alternar-respuesta-ej5').toggle( 
  
        // Primer click
        function(e){ 
            $('#respuesta-ej5').slideDown();
            $(this).text('Ocultar respuesta');
            e.preventDefault();
        }, // Separamos las dos funciones con una coma
      
        // Segundo click
        function(e){ 
            $('#respuesta-ej5').slideUp();
            $(this).text('Ver respuesta');
            e.preventDefault();
        }
  
    );
  
});
</script>
<head>

<title></title>
</head>



</style>
<body>
<form>
<p>Pregunta... (<a href="#" id="alternar-respuesta-ej5">ver respuesta</a>)
 
<div id="respuesta-ej5" style="display:none">Respuesta... </div>
</form>
</body>
</html>