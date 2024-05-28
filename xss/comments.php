<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Manejar el cierre de sesión
if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// Manejar el envío del comentario
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (ya proporcionado)
    
    // Validar y guardar el comentario en la base de datos
    $comment = $_POST['comment'];
    $comment = strip_tags($comment); // Eliminar etiquetas HTML y PHP
    $comment = htmlspecialchars($comment); // Escapar caracteres especiales HTML

    // Evitar inyección SQL utilizando consultas preparadas (ya proporcionado)
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <style>
        body {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .comment-container {
            background-color: #e1f3d8;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
        }

        textarea {
            margin-bottom: 10px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .logout-form {
            margin-top: 20px;
        }

        .logout-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="comment-container">
        <h2>Agregar Comentario</h2>
        <form method="post" action="post.php">
            Comentario: <br>
            <textarea name="comment" rows="5" cols="50"></textarea><br>
            <input type="submit" value="Enviar Comentario">
        </form>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="logout-form">
            <input type="submit" name="logout" value="Cerrar Sesión" class="logout-button">
        </form>
    </div>
</body>
</html>
