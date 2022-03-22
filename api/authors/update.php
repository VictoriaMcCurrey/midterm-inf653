<?php
    include_once '../../config/Database.php';
    include_once '../../models/Author.php';
    
    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate Author object
    $author = new author($db);

    // Get Raw Data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to UPDATE
    $author -> id = $data -> id;
    $author -> author = $data -> author;
    
    // UPDATE author
    if($author -> update()) {
        echo json_encode(
            array('Message' => 'Author Updated')
        );
    } else {
        echo json_encode(
            array('Message' => 'Author Not Updated')
        );
        exit();
    }
