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

// Inserta los datos en la base de datos sin cifrar la contraseña
$sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario registrado";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
