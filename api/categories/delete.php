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

    // Set ID to DELETE
  $category->id = $data->id;

  // Delete post
  $response = $category->delete();
  if($response > 0) {
    echo json_encode(
      array('id' => $category->id)
    );
  } else if($response == -1){
    echo json_encode(
      array('message' => 'Cant delete: foreign key in use')
    );
  }else {
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
  }
    exit();
