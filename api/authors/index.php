<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    include_once '../../config/Database.php';
    include_once '../../models/Author.php';
    
    if ($method == 'GET') {
        include 'read_single.php';
    } elseif ($method == 'POST') {
        include 'create.php';
    } elseif ($method == 'PUT') {
        include 'update.php';
    } elseif ($method == 'DELETE') {
        include 'delete.php';
    } 
