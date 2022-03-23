<?php
    include_once '../../config/Database.php';
    include_once '../../models/Author.php';
    
    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate Author object
    $author = new Author($db);

    // Get Raw Data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to DELETE
    $author -> id = $data -> id;

    // DELETE author
    if( $author -> delete()) {
        echo json_encode(
            array('id' => $author -> id)
        );
    } else {
        echo json_encode(
            array('Message' => 'Author Not Deleted')
        );
    }
    exit();
