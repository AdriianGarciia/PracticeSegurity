<?php
// Conectarse a la base de datos
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
// Obtener el ID de usuario y la nueva contraseña del formulario
$ID = 1; // Cambiar esto al ID del usuario real
$newPassword = "newpassword"; // Cambiar esto a la nueva contraseña real

// Preparar la consulta para actualizar la contraseña
$sql = "UPDATE usuarios SET pass = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $newPassword, $ID);

// Ejecutar la consulta
$stmt->execute();

// Verificar si la contraseña se actualizó correctamente
if ($stmt->affected_rows > 0) {
    echo "Contraseña actualizada correctamente";
} else {
    echo "Error al actualizar la contraseña";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
