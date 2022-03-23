<?php
    include_once '../../config/Database.php';
    include_once '../../models/Quote.php';

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate quote object
    $quote = new Quote($db);

    // Get Raw Data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to UPDATE
    $quote -> id = $data -> id;
    $quote -> quote = $data -> quote;
    $quote -> authorId = $data -> authorId;
    $quote -> categoryId = $data -> categoryId;

    // Check for  missing parameters
    if($quote -> id == null) {
        echo json_encode(
            array('Message' => 'Missing Required Parameters'));
            exit();
    } elseif ($quote -> quote == null) {
        echo json_encode(
            array('Message' => 'Missing Required Parameters'));
            exit();
    } elseif ($quote -> authorId == null) {
        echo json_encode(
            array('Message' => 'authorId Not Found'));
            exit();
    } elseif ($quote -> categoryId == null) {
        echo json_encode(
            array('Message' => 'categoryId Not Found'));
            exit();
    } 
    
    // UPDATE quote
    if($quote -> update()) {
        echo json_encode(
            array('id' => $db->lastInsertId(),
                  'quote' => $quote->quote,
                  'authorId' => $quote->authorId,
                  'categoryId' => $quote->categoryId 
            ));
    } else {
        echo json_encode(
            array('message' => 'No Quotes Found')
        );
    }
    exit();
