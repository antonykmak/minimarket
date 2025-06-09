<?php
include 'conexion.php'; // tu archivo de conexión PDO o mysqli

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $usuario = $_POST["usuario"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hashea la contraseña
    $rol = $_POST["rol"];
    $estado = 1;

    $sql = "INSERT INTO usuario (nombre_completo, dni, usuario, contraseña, rol, estado) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$nombre, $dni, $usuario, $password, $rol, $estado]);

    if ($result) {
        echo json_encode(["success" => true, "message" => "Usuario registrado con éxito."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al registrar."]);
    }
}
?>