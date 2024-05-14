<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo MVC</title>
    <!-- PLUGINS DE CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- PLUGINS DE JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- LOGOTIPO -->
    <div class="container-fluid">
        <h3 class="text-center py-3">LOGO</h3>
    </div>
    <!-- BOTONERA -->
    <div class="container-fluid bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="registro.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ingreso.html">Ingreso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Salir</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- CONTENIDO -->
    <div class="container-fluid">
        <div class="container py-5">
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <!-- Campo Nombre vulnerable -->
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Script para ejecutar después de enviar el formulario -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<script>alert("Hacked")</script>';
    }
    ?>

</body>
</html>