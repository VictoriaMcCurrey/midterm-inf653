<?php
    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate category object
    $category = new Category($db);

    // Get Raw Data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to UPDATE
    $category -> id = $data -> id;
    $category -> category = $data -> category;
    
    // UPDATE category
    if($category -> update()) {
        echo json_encode(
            array('Message' => 'Category Updated')
        );
    } else {
        echo json_encode(
            array('Message' => 'Category Not Updated')
        );
    exit();
    }
