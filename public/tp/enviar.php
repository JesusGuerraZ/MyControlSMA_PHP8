<?php
$Nombre = $_POST['Nombre'];
$Gmail = $_POST['Gmail'];
$Telefono = $_POST['Telefono'];
$Direccion = $_POST['Direccion'];
$Nombre_Persona = $_POST['Nombre_Persona'];
$Parametro = $_POST['parametros'];
$Rango = $_POST['Rango'];
$Tolerancia = $_POST['Tolerancia'];
$Cantidades = $_POST['Cantidades'];
$Fleteccion = $_POST['Flete'];
$Describa = $_POST['Describa'];


$header = 'From: ' . $Gmail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$message = "Este mensaje fue enviado por: " . $Nombre . " \r\n";
$message .= "Su e-mail es: " . $Gmail . " \r\n";
$message .= "Teléfono de contacto: " . $Telefono . " \r\n";
$message .= "Enviado el: " . date('d/m/Y', time());
$message = "La direccion es: " . $Direccion . " \r\n";
$message = "Nombre del responsable: " . $Nombre_Persona . " \r\n";
$message = "Parametro del producto: " . $Parametro . " \r\n";
$message = "Rango del producto: " . $Rango . " \r\n";
$message = "Cantidades del producto: " . $Cantidades . " \r\n";
$message = "Flete: " . $Flete . " \r\n";
$message = "Descripcion del pesdido: " . $Describa . " \r\n";
$message .= "Mensaje: " . $_POST['message'] . " \r\n";

$para = 'Browin49@gmail.com';
$asunto = 'Hola';

mail($para, $asunto, utf8_decode($message), $header);

header("Location:plastico.html");
?>