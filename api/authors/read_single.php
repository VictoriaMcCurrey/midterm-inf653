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

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate Author object
    $author = new Author($db);

    // GET ID
    $author -> id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Author 
    $author -> read_single();

    // Create array
    $author_arr = array(
        'id' => $author -> id,
        'author' => $author -> author
    );

    // Make JSON
    print_r(json_encode($author_arr));
exit();