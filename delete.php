<?php
     header("Access-Control-Allow-Origin: *");
     header("Content-Type: application/json; charset=UTF-8");
     header("Access-Control-Allow_Methods: Delete");
     header("Access-Control-Max-Age: 3600");
     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,
     Authorization, X-Requested-With");

     include_once 'database.php';
     include_once 'employees.php';

     $database = new Database();
     $db = $database->getConnection();

     $items = new Empolyee($db);

     $data = json_decode(file_get_content("php://input"));

     $items->id = $data->id;

     if($items->deleteEmployee()){
         echo json_encode("Employee delete.");
     }else{
         echo json_encode("data could not be deleted");
     }
?>
