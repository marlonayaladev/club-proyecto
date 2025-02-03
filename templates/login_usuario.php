<?php
$servername = "localhost";
$username = "root"; //usuario SQL
$password = "fernanfloox100pre"; //contraseña
$dbname = "club"; //nombre de la BD

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión es exitosa
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Recibe los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Verifica si el correo existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, verificar la contraseña
    $user = $result->fetch_assoc();
    if ($password === $user['password']) {
        echo "Inicio de sesión exitoso";
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "El correo no está registrado";
}

// Cierra la conexión
$conn->close();
?>
