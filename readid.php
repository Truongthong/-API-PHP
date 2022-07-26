<?php
     header("Access-Control-Allow-Origin: *");
     header("Content-Type: application/json; charset=UTF-8");
     header("Access-Control-Allow_Methods: POST");
     header("Access-Control-Max-Age: 3600");
     header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,
     Authorization, X-Requested-With");
     include_once 'database.php';
     include_once 'employees.php';
     $database = new Database();
     $db = $database->getConnection();
     $items = new Empolyee($db);
     $items->id = isset($_GET['id']) ? $_GET['id'] : die();

     $items->getSingleEmployee();
     if($items->name != null){
         // create array
         $emp_arr =array(
             "id" => $items->id,
             "name" =>  $items->name,
             "email" => $items->email,
             "age" => $items->age,
             "designation" => $items->designation,
             "created" => $items->reated
         );
         http_pesponse_code(404);
         echo json_encode("Employee not found.");
     }

?>