<?php

require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/', function () {
echo "SlimProdutos ";
});

$app->get('/categorias','getCategorias');

$app->run();

function getConn()
{
return new PDO('mysql:host=localhost;dbname=SlimProdutos',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

}

function getCategorias()
{
$stmt = getConn()->query("SELECT * FROM Categorias");
$categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
echo "{categorias:".json_encode($categorias)."}";
}