<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html;" charset=utf-8" />
	<link href="/assets/css/softblue.css" rel="stylesheet" type="text/css">
	<link href="../../assets/css/scroll.css" rel="stylesheet" type="text/css">
	<script src="/assets/jquery.js"></script>
	<script src="/assets/validacion/jquery.validate.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="/assets/bootstrap/css/amelia.css">
	
	<!--ACEPTAR SOLO NUMEROS O LETRAS -->
	<script src="/assets/validacion/validacion_nl.js" type="text/javascript"></script>

	<!--MOSTRAR ERRORES-->
	<link rel="stylesheet" href="/assets/validacion/errores.css" type="text/css">
	
	<style>
	
	.contenedor1{
			margin:1% 20% 10%;
			top:0px;
			border:1px solid gray;
			text-align:center;
			font-size:14px;
			-webkit-border-radius: 6px;
			-moz-border-radius: 6px;
			border-radius: 0px;
		}
	
	</style>
	
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
<?php 
$archivo2=fopen("contador.dat","a");
fwrite($archivo2,"1");
fclose($archivo2);

$filename = "contador.dat";
$handle = fopen($filename, "rb");
fwrite($handle,"1");
$contents = fread($handle, filesize($filename));
echo "<b>Contador de Visitas: ".strlen($contents)."</b>";
fclose($handle);
?>

<center>

<form id='texttests' name='myform' action='/formulario.php' method='post'>
			
	<br><br>
	Nombre:<input id="nombre" type="text" name="nombre" maxlength="200"  size="50" onkeypress="return letras(event)" title="Ingrese el nombre de la Universidad"/>
	<br><br>
	
	Comentario:<br><textarea type="text" name="comentario" cols="130" class="field span10" rows="7"/></textarea><br><br>
	
	<button text style="font-weight:bold;" onClick="submit()" class="btn btn-success" value="Guardar Cambios"/>Enviar</button>
</form>
</center>

<?php 

if (isset($_POST['nombre']) && isset($_POST['comentario']) )
{
$fp=fopen("archivo.dat","a");
fwrite($fp,"<tr>");
fwrite($fp,"<td>Autor:</td><td>".$_POST['nombre']);
fwrite($fp,"</td>");
fwrite($fp,"<tr>");
fwrite($fp,"<td>Comentario:</td><td>".$_POST['comentario']);
fwrite($fp,"</td></tr>");
fwrite($fp,"\n");
fclose($fp);
}

echo "<div class='contenedor1'><table class='table table-striped'>";

$filename = "archivo.dat";
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
echo $contents;
fclose($handle);

echo "</table></div>";

?>
</body>

</html>