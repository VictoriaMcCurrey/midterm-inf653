<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    include_once '../../config/Database.php';
    include_once '../../models/Quote.php';

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate quote object
    $quote = new Quote($db);

    // GET ID
    $quote -> id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get quote 
    $quote -> read_single();

    // Create array
    $quote_arr = array(
        'id' => $quote -> id,
        'quote' => $quote -> quote,
        'author' => $quote -> author,
        'category' => $quote -> category
    );

    // Make JSON
    print_r(json_encode($quote_arr));
exit();