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

    // Set ID to DELETE
    $quote -> id = $data -> id;

    // DELETE quote
    if($quote -> delete()) {
        echo json_encode(
            array('Message' => 'Quote Deleted')
        );
    } else {
        echo json_encode(
            array('Message' => 'Quote Not Deleted')
        );
        exit();
    }
