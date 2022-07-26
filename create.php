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
     $data = json_decode(file_get_contents("php://input"));
     $items->name = $data-name;
     $items->email = $data-email;
     $items->age = $data-age;
     $items->designation= $data-designation;
     $items->created = $data('Y-m-d H:i:s');
     if($items->createEmployee()){
         echo 'Employee created successfully.';
     } else{
         echo 'Employee could not be created.';
     }
?>
