<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$archivo = $_FILES['adjunto'];

if ($Nombre=='' || $Email=='' || $Mensaje==''){

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();

    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("correo@tucorreo.com"); // Dirección a la que llegaran los mensajes.
   
// Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 
        //adjuntamos un archivo
            
    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Contacto";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Email: $Email \n<br />".    
    "Mensaje: $Mensaje \n<br />";
    $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
    
    
    

// Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
    $mail->SMTPAuth = true; 
    $mail->Username = "tucorreo@gmail.com";  // Correo Electrónico
    $mail->Password = "tucontraseña"; // Contraseña
    
    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>