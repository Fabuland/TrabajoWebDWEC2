<?php
header('Content-Type: application/json;  charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

require_once '../configuracion.php'; 

$conn = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $password);
$conn->exec("set names utf8");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT id,nombre,direccion,email FROM editorial WHERE direccion LIKE '%".$_POST['direccion']."%'");
$stmt->execute();
$juegosmesa = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($juegosmesa);
?>