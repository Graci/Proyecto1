<html>
<head>

<meta http-equiv="Content-Type" content="text/html;" charset=utf-8" />
	<link href="/assets/css/softblue.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/scroll.css" rel="stylesheet" type="text/css">
	<script src="/assets/jquery.js"></script>
	<script src="/assets/validacion/jquery.validate.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	
	<!--ACEPTAR SOLO NUMEROS O LETRAS -->
	<script src="/assets/validacion/validacion_nl.js" type="text/javascript"></script>

	<!--MOSTRAR ERRORES-->
	<link rel="stylesheet" href="/assets/validacion/errores.css" type="text/css">
	
	<script type="text/javascript">

	$.validator.setDefaults({
		submitHandler:	function submitform()
	{
	  document.myform.submit();
	}
	});

		$().ready(function() {
			var validator = $("#texttests").bind("invalid-form.validate", function() {
				$("#summary").html("Your form contains " + validator.numberOfInvalids() + " errors, see details below.");
			}).validate({
				debug: true,
				errorElement: "em",
				errorContainer: $("#warning, #summary"),
				errorPlacement: function(error, element) {
					error.appendTo( element.parent("td").next("td") );
				},
				success: function(label) {
					label.text("").addClass("success");
				},
				rules: {
					nombre:{
					required:true
					}		
				}
			});
		});
	</script>

</head>

<body>

<form id='texttests' name='myform' action='/formulario.php' method='post'>
			
	<br><br>
	Nombre:<input id="nombre" type="text" name="nombre" maxlength="200"  size="50" onkeypress="return letras(event)" title="Ingrese el nombre de la Universidad"/>
	<br><br>
	
	Edad:<input id="nombre" type="text" name="edad" maxlength="200"  size="50" onkeypress="return numeros(event)" title="Ingrese el nombre de la Universidad"/>
	<br><br>
	
	<button text style="font-weight:bold;" onClick="submit()" class="btn btn-success" value="Guardar Cambios"/>Enviar</button>
</form>

<?php 

if (isset($_POST['nombre']) && isset($_POST['edad']) )

{
$fp=fopen("archivo.dat","a");
fwrite($fp,"\n");
fwrite($fp,$_POST['nombre']);
fwrite($fp,"<br>");
fwrite($fp,$_POST['edad']);
fwrite($fp,"<br>");
fclose($fp);

}

$filename = "archivo.dat";
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
echo $contents;
fclose($handle);

?>
</body>

</html>