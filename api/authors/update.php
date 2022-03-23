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

    // Check for  missing parameters
    if($author -> id == null) {
        echo json_encode(
            array('Message' => 'Missing Required Parameters'));
            exit();
    } elseif ($author -> author == null) {
        echo json_encode(
            array('Message' => 'Missing Required Parameters'));
            exit();
    }
    
    // UPDATE author
    if($author -> update()) {
        echo json_encode(
            array('id' => $db->lastInsertId(),
                  'author' => $author -> author
            ));
    } else {
        echo json_encode(
            array('Message' => 'Missing Required Parameters')
        );
    }
    exit();
