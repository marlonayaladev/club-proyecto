<?php
$servername = "localhost";
$username = "root"; //usuario sql
$password = "fernanfloox100pre"; //contraseña
$dbname = "club"; //nombre de la bd

//=== crea la conexión ===

$conn = new mysqli($servername, $username, $password, $dbname);


//=== hace la conexión ===

if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}


//=== recibe los datos del formulario ===

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];


// === inserta los datos recibidos en la bd ===

$sql = "INSERT INTO usuarios (dni, nombre, email, password) VALUES ('$dni', '$nombre', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario registrado";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//=== cierra la conexión con la base de datos ===

$conn->close();
?>
