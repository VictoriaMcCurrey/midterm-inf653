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

    $author -> author = $data -> author;

    // Create Author
    if($author -> create()) {
        echo json_encode(
            array('Message' => 'Author Created')
        );
    } else {
        echo json_encode(
            array('Message' => 'Author Not Created')
        );
        exit();
    }
