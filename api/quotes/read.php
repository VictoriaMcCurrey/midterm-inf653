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

    // quote Query
    $result = $quote -> read();

    // Get Row Count
    $num = $result -> rowCount();

    // Check if any categories
    if($num > 0) {
        // quote array
        $quote_arr = array();
        $quote_arr['data'] = array();

        while($row = $result -> fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $quote_item = array(
                'id' => $id,
                'quote' => $quote,
                'author' => $author,
                'category' => $category
            );

            // Push to 'data'
            array_push($quote_arr['data'], $quote_item);
        }

        // Turn to JSON & output
        echo json_encode($quote_arr);

    } else {
        // No categories
        echo json_encode(
            array('Message' => 'Quote Not Found')
        );
        exit();
    }