<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "jorgearcedev1@gmail.com";
    $subject = "Nuevo mensaje del formulario de contacto";
    $name = strip_tags($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = strip_tags($_POST["phone"]);
    $subject = strip_tags($_POST["subject"]);
    $message = strip_tags($_POST["message"]);
    
    $body = "Nombre: $name\nCorreo: $email\nTeléfono: $phone\nAsunto: $subject\nMensaje:\n$message";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Return-Path: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado exitosamente";
    } else {
        echo "Error al enviar el mensaje";
    }
}
?>
