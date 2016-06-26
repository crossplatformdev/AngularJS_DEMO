<?php
namespace ArrayKeys;

require './src/DummyRESTApi.php';
$method = $_SERVER['REQUEST_METHOD'];
$server = new DummyRESTApi();

if($method === 'POST'){
    $server->emmitResponse();
} elseif ($method === 'GET') {
    //TODO
    $server->acceptComment();
}

?>