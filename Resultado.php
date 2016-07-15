<?php

require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {
echo "angulo";
});

$app->get('/Resultado','getResultado');

$app->run();

function getConn()
{
return new PDO('mysql:host=localhost;dbname=Cadastro',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

}

function getResultado()
{
$stmt = getConn()->query("SELECT * FROM Resultado");
$Resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
echo "{resultado:".json_encode($resultado)."}";
}