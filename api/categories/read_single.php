<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    include_once '../../config/Database.php';
    include_once '../../models/category.php';

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate Category object
    $category = new Category($db);

    // GET ID
    $category -> id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get category 
    $category -> read_single();

    // Create array
    $category_arr = array(
        'id' => $category -> id,
        'category' => $category -> category
    );

    // Make JSON
    print_r(json_encode($category_arr));
exit();