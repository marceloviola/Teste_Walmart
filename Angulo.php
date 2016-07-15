<?php

require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


function getResultado($id)

{
$conn = getConn();
$sql = "SELECT * FROM Resultado WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam("id",$id);
$stmt->execute();
$produto = $stmt->fetchObject();

//Angulo
$sql = "SELECT * FROM Ângulo WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam("id",$Resultado->Id);
$stmt->execute();
$produto->categoria = $stmt->fetchObject();

echo json_encode($Resultado);
}

