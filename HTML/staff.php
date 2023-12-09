<?php
    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";

    $staffId = 2; //Staff ID for James Smith, who works at the Dundee branch.

    try {
        $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
        echo "<script>console.log('Successful Connection')</script>";
    } catch(Exception $e) {
        echo $e;
    }
  session_start();
  if ($_SESSION["username"] != "staff") {
    header("Location: "."index.html");
    die();
  }

  $staffData = readStaffData($staffId);

  $productData = readProductInformation();

  $stockStatus = determineStockStatus();
  $stockStatus = $stockStatus["inStock"];

  $stockStatusInBranch = [];
  
  foreach ($stockStatus as $stockValues) {
    if($stockValues["StockBranchName"] == $staffData["BranchName"]) {
        array_push($stockStatusInBranch, $stockValues);
    }
  }

  $orderData = readOrderInformation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <!-- CDN Links -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>
<style></style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2" data-bs-theme="dark">
        <img src="Coral Cove Fisheries Logo - Transparent PNG.png" style="width: 15%;" alt="">
        <div class="container-fluid">            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Staff.html">Staff</a>
                    </li>            
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container py-5">            
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo $staffData["FirstName"], " ", $staffData["LastName"] ?></h5>
                            <button type="button" class="btn btn-primary">Update Details</button>                                                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Staff ID:</p>
                                    <p class="mb-0"><?php echo $staffData["StaffID"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Email:</p>
                                    <p class="mb-0"><?php echo $staffData["Email"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone:</p>
                                    <p class="mb-0"><?php echo $staffData["Phone"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Position:</p>
                                    <p class="mb-0"><?php echo $staffData["Position"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Salary:</p>
                                    <p class="mb-0"><?php echo $staffData["Salary"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Branch:</p>
                                    <p class="mb-0"><?php echo $staffData["BranchName"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="container mt-4">
            <div class="card mb-4 p-3">
            <h2>Product Inventory</h2>
            <table class="table">
              <thead class="blue-header">
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Stock Quantity</th>
                  <th scope="col">Branch</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach ($productData as $productField => $productData) {
                        echo "<tr>
                                <td>", $productField + 1,"</td>
                                <td>", $productData['ProductName'] ,"</td>
                                <td>", $productData['Price'] ,"</td>
                                <td>", $stockStatusInBranch[$productField]["StockQuantity"], "</td>
                                <td>", $staffData["BranchName"] ,"</td>
                            </tr>";
                    }
                ?>
              </tbody>
            </table>
            </div>
          </div>

        <div class="container mt-4 pt-3">
            <div class="card mb-4 p-3">
            <h2>Customer Order Information</h2>
            <table class="table">
              <thead class="blue-header">
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Total Cost</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Expected Delivery Date</th>
                  <th scope="col">Delivery Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach ($orderData as $orderInformation) {
                        echo "<tr>
                                <td>", $orderInformation["OrderID"] ,"</td>
                                <td>", $orderInformation["CustomerFirstName"] ,"</td>
                                <td>", $orderInformation["CustomerLastName"] ,"</td>
                                <td>", $orderInformation["TotalCost"] ,"</td>
                                <td>", $orderInformation["OrderDate"] ,"</td>
                                <td>", $orderInformation["ExpectedDeliveryDate"] ,"</td>
                                <td>", $orderInformation["DeliveryStatus"] ,"</td>
                            </tr>";
                    }
                ?>
              </tbody>
            </table>
          </div>
          </div>
    </section>
    </section>
</body>
<?php

// Function to read staff data
function readStaffData($staffId) {
    global $mysql;
    $query = $mysql->prepare("CALL readStaffData(:staffId);");
    $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);   //remember to bind parameters for all fields above
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Function to update staff information
function updateStaffInfo($staffId, $firstName, $lastName, $email, $phone, $position, $salary, $Branchname) {
    global $mysql;
    $query = $mysql->prepare("CALL updateStaffInfo(:staffId,:firstName,:lastName,:email,:phone,:position,:salary,:Branchname);");
    $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);
    $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':position', $position, PDO::PARAM_STR);
    $query->bindParam(':salary', $salary, PDO::PARAM_INT);
    $query->bindParam(':Branchname', $Branchname, PDO::PARAM_INT);
    //add branchName bind param
    $query->execute();
}

// Function to read customer information
// function readCustomerInformation() {
    // global $mysql;
    // $query = $mysql->query("SELECT * FROM Customers");
    // return $query->fetchAll(PDO::FETCH_ASSOC);
//}

// Function to read order information
function readOrderInformation() {
    global $mysql;
    $query = $mysql->query("CALL readOrderInformation();");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to read delivery information
//function readDeliveryInformation() {
    //global $mysql;
    //$query = $mysql->query("SELECT * FROM Location");
    //return $query->fetchAll(PDO::FETCH_ASSOC);
//}

// Function to read product information
function readProductInformation() {
    global $mysql;
    $query = $mysql->query("CALL readAvailableProducts();");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to determine products that are in and out of stock
function determineStockStatus() {
    global $mysql;
    $query = $mysql->query("CALL determineStockStatus();");
    $inStock = $query->fetchAll(PDO::FETCH_ASSOC);  
    return array('inStock' => $inStock);
}
?>
</html>