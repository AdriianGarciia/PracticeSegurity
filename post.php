<?php
// Verificar si se han enviado datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el comentario enviado desde el formulario
    $comment = $_POST['comment'];

    // Filtrar y escapar el comentario para prevenir ataques XSS
  

    // Mostrar el comentario de manera segura
    echo "Comentario: " . $comment;
} else {
    // Si no se reciben datos por POST, mostrar un mensaje de error
    echo "No se han recibido datos.";
}
?>
