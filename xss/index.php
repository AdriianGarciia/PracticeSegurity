<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: comments.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuarios";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar las credenciales
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Evitar inyección SQL utilizando consultas preparadas
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE user=? AND pass=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Credenciales válidas, establecer sesión y redireccionar
        $_SESSION['username'] = $username;
        header("Location: comments.php");
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #e1f3d8;
            padding: 100px;
            border-radius: 10px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
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
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Usuario"><br>
            <input type="password" name="password" placeholder="Contraseña"><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>