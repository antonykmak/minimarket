<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["pass"];

    $sql = "SELECT * FROM usuario WHERE usuario = ? AND estado = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["contraseña"])) {
        $_SESSION["usuario"] = $user["usuario"];
        $_SESSION["rol"] = $user["rol"];
        echo json_encode(["success" => true, "message" => "Login exitoso."]);
    } else {
        echo json_encode(["success" => false, "message" => "Credenciales inválidas."]);
    }
}
?>