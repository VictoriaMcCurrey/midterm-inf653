<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Author.php';

    // Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate author object
    $author = new Author($db);

    // author Query
    $result = $author -> read();

    // Get Row Count
    $num = $result -> rowCount();

    // Check if any Authors
    if($num > 0) {
        // author array
        $author_arr = array();
        $author_arr['data'] = array();

        while($row = $result -> fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $author_item = array(
                'id' => $id,
                'author' => $author
            );

            // Push to 'data'
            array_push($author_arr['data'], $author_item);
        }

        // Turn to JSON & output
        echo json_encode($author_arr);

    } else {
        // No categories
        echo json_encode(
            array('Message' => 'No Author Found')
        );
    }<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'OPTIONS') {
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Access-Control-Allow-Headers: Origin, Accept, Content-Type, X-Requested-With');
    }
    
    include_once '../../config/Database.php';
    include_once '../../models/Author.php';
    
    //Instantiate DB & Connect
    $database = new Database();
    $db = $database -> connect();

    // Instantiate author object
    $author = new Author($db);

    // author Query
    $result = $author -> read();

    // Get Row Count
    $num = $result -> rowCount();

    // Check if any Authors
    if($num > 0) {
        // author array
        $author_arr = array();
        $author_arr['data'] = array();

        while($row = $result -> fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $author_item = array(
                'id' => $id,
                'author' => $author
            );

            // Push to 'data'
            array_push($author_arr['data'], $author_item);
        }

        // Turn to JSON & output
        echo json_encode($author_arr);

    } else {
        // No categories
        echo json_encode(
            array('Message' => 'No Author Found')
        );
        exit();
    }