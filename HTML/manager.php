<?php
    session_start();
    if ($_SESSION["username"] != "manager") {
    header("Location: "."index.html");
    die();
    }

    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";

    $managerId = 14;
    $branchName = "";

    try {
        $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
        echo "<script>console.log('Successful Connection')</script>";
    } catch(Exception $e) {
        echo $e;
    }

    $staffData = readStaffData($managerId);

    $branchName = $staffData["BranchName"];
    $allStaffData = readAllStaffData($branchName,$managerId);
    $stock = determineStockStatusByBranch($branchName);
    $supplierInfo = readSupplierInformation();
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
                        <a class="nav-link active" aria-current="page" href="Manager.html">Manager</a>
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
            <h2>Staff Managed</h2>
            <table class="table">                
                <thead>
                <tr>
                  <th scope="col">Staff ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Position</th>
                  <th scope="col">Salary</th>
                  <th scope="col">Branch Name</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // There will need to be a foreach loop here once the allStaffData function works
                    foreach ($allStaffData as $staffMember) {
                        echo "<tr>
                                <td>", $staffMember["StaffID"], "</td>
                                <td>", $staffMember["FirstName"], "</td>
                                <td>", $staffMember["LastName"], "</td>
                                <td>", $staffMember["Email"], "</td>
                                <td>", $staffMember["Phone"], "</td>
                                <td>", $staffMember["Position"], "</td>
                                <td>", $staffMember["Salary"], "</td>
                                <td>", $staffMember["BranchName"], "</td>
                            </tr>";
                    }
                ?>
              </tbody>
            </table>
            </div>
          </div>

          <div class="container mt-4">
            <div class="card mb-4 p-3">
            <h2>Product Inventory</h2>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Cost Per Unit</th>
                  <th scope="col">Stock Status</th>
                  <th scope="col">Branch</th>
                  <th scope="col">Supplier ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $counter = 1;
                    foreach ($stock as $product) {
                        echo "<tr>
                                <td>", $counter, "</td>
                                <td>", $product["ProductName"], "</td>
                                <td>", $product["CostPerUnit"], "</td>
                                <td>", $product["StockStatus"], "</td>
                                <td>", $product["BranchName"], "</td>
                                <td>", $product["SupplierID"], "</td>
                            </tr>";
                        $counter++;
                    }
                ?>
              </tbody>
            </table>
        </div>
          </div>

          <div class="container mt-4">
            <div class="card mb-4 p-3">
            <h2>Supplier Information</h2>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Supplier ID</th>
                  <th scope="col">Supplier Name</th>
                  <th scope="col">Contact Person</th>
                  <th scope="col">Supplier Email</th>
                  <th scope="col">Supplier Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">Postal Code</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach ($supplierInfo as $supplier) {
                        echo "<tr>
                                <td>", $supplier["SupplierID"], "</td>
                                <td>", $supplier["SupplierName"], "</td>
                                <td>", $supplier["ContactPerson"], "</td>
                                <td>", $supplier["SupplierEmail"], "</td>
                                <td>", $supplier["SupplierPhone"], "</td>
                                <td>", $supplier["AddressLine1"], ", ", $supplier["AddressLine2"], "</td>
                                <td>", $supplier["PostalCode"], "</td>
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

// Function to read manager data
function readManagerData($managerId) {
    global $mysql;
    $query = $mysql->prepare("CALL readManagerData(:managerId);");
    $query->bindParam(':managerId', $managerId, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Function to read staff data (reused from the Staff page)
function readStaffData($staffId) {
    global $mysql;
    $query = $mysql->prepare("CALL readStaffData(:staffId);");
    $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

// Function to read all staff data (reused from the Staff page)
function readAllStaffData($branch,$manager) {
    global $mysql;
    $query = $mysql->prepare("CALL readBranchesStaff(:branchName,:managerId);");
    $query->bindParam(':branchName', $branch, PDO::PARAM_STR);
    $query->bindParam(':managerId', $manager, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to read products that are in and out of stock
function determineStockStatusByBranch($branch) {
    global $mysql;
    $query = $mysql->prepare("CALL determineStockStatusByBranch(:branchName);");
    $query->bindParam(':branchName', $branch, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to read supplier information
function readSupplierInformation() {
    global $mysql;
    $query = $mysql->query("CALL readSupplierInformation();");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to read product information (reused from the Staff page)
function readProductInformation() {
    global $mysql;
    $query = $mysql->query("CALL readProductInformation();");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
</html>