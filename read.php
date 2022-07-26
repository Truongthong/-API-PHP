<?php
      header("Access-Control-Allow-Origin: *");
      header("Content-Type: application/json: charse=UTF_8");

      include_once 'database.php';
      include_once 'employees.php';
      //create database object
      $database = new Database();
      //call the function
      $db = $database->getConnection();
      $items = new Empolyee($db);
      $stmt = $items->getEmployees();
      $itemsCount = $stmt->rowCount();

      echo json_encode($itemsCount);
      if($itemsCount > 0){

          $employeeArr = array();
          $employeeArr["body"] = array();
          $employeeArr["itemsCount"] = $itemsCount;
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $e = array(
                  "id" => $id,
                  "name" => $name,
                  "eamil" => $email,
                  "age" => $age,
                  "designation" => $designation,
                  "created" => $created
              );
              array_push($employeeArr["body"], $e);
          }
          echo json_encode($employeeArr);
      }
      else{
          http_response_code(404);
          echo json_encode(
              array("message" => "No recode found.")
          );
      }
?>