<?php
  session_start();
  if ($_SESSION["username"] != "customer") {
    header("Location: "."index.html");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>coral cove fishing</title>
    </head>

    <body>
      <div class="container">
        <div class="text-center">
          <img src="Coral Cove Fisheries Logo - Transparent PNG.png" class="img-fluid" alt="Coral Cove Fisheries Logo">
        </div>
        <?php

          $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
          $username = "admin";
          $password = "Password123";
          $dbname = "coral-cove-database";

          $customerId = 1; //Customer ID of John Smith for use in the code.

          try {
              $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
              echo "<script>console.log('Connection Successful')</script>";
          } catch(Exception $e) {
              echo $e;
          }

          $array = readAvailableProducts();
          echo "<table class='table table-hover'>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                  </tr>";
          foreach ($array as $var) {
            echo "<tr><td>", $var['ProductName'], "</td><td>", $var['Price'], "</td></tr>";
          }
          echo "</table>";

          // Function to read customer data
          function readCustomerData($customerId) {
              global $mysql;
              $query = $mysql->prepare("CALL readCustomerData(:customerId);");
              $query->bindParam(':customerId', $customerId, PDO::PARAM_INT);
              $query->execute();
              return $query->fetch(PDO::FETCH_ASSOC);
          }

          // Function to update customer data
          function updateCustomerData($customerId, $firstName, $lastName, $email, $phone, $loyaltyPoints, $addressLine1, $addressLine2, $city, $postalCode) {
              global $mysql;
              $query = $mysql->prepare("CALL updateCustomerData(:customerId,:firstName,:lastName,:email,:phone,:loyaltyPoints,:addressLine1,:addressLine2,:city,:postalCode);");
              $query->bindParam(':customerId', $customerId, PDO::PARAM_INT);
              $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
              $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->bindParam(':phone', $phone, PDO::PARAM_STR);
              $query->bindParam(':loyaltyPoints', $loyaltyPoints, PDO::PARAM_INT);
              $query->bindParam(':addressLine1', $addressLine1, PDO::PARAM_INT);
              $query->bindParam(':addressLine2', $addressLine2, PDO::PARAM_INT);
              $query->bindParam(':city', $city, PDO::PARAM_INT);
              $query->bindParam(':postalCode', $postalCode, PDO::PARAM_INT);
              $query->execute();
          }

          // Function to read orders made by the customer
          function readCustomerOrders($customerId) {
              global $mysql;
              $query = $mysql->prepare("CALL readCustomerOrders(:customerId);");
              $query->bindParam(':customerId', $customerId, PDO::PARAM_INT);
              $query->execute();
              return $query->fetchAll(PDO::FETCH_ASSOC);
          }

          // Function to read products available for purchase
          function readAvailableProducts() {
              global $mysql;
              $query = $mysql->query("CALL readAvailableProducts();");
              return $query->fetchAll(PDO::FETCH_ASSOC);
          }

          // Function to delete customer account
          function deleteCustomerAccount($customerId) {
              global $mysql;
              $query = $mysql->prepare("CALL deleteCustomerAccount(:customerId);");
              $query->bindParam(':customerId', $customerId, PDO::PARAM_INT);
              $query->execute();
          }
        ?>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
