<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manejar la actualización de los usuarios
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $comment = $_POST['comment'];

    $sql = "UPDATE usuarios SET user='$user', pass='$pass', comment='$comment' WHERE ID=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Obtener los usuarios
$sql = "SELECT ID, user, pass, comment FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Pass</th>
            <th>Comment</th>
            <th>Acción</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <form method='POST' action=''>
                            <td>" . $row["ID"] . "</td>
                            <td><input type='text' name='user' value='" . $row["user"] . "'></td>
                            <td><input type='text' name='pass' value='" . $row["pass"] . "'></td>
                            <td><input type='text' name='comment' value='" . $row["comment"] . "'></td>
                            <td>
                                <input type='hidden' name='id' value='" . $row["ID"] . "'>
                                <input type='submit' name='update' value='Actualizar'>
                            </td>
                        </form>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay resultados</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
