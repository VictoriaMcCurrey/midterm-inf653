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

    $category -> id = $data -> id;
    $category -> category = $data -> category;

    // Create category
    if($category -> create()) {
        echo json_encode(
            array('Message' => 'Category Created')
        );
    } else {
        echo json_encode(
            array('Message' => 'Category Not Created')
        );
    exit();
    }
