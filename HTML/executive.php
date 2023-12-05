<?php
  $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
  $username = "admin";
  $password = "Password123";
  $dbname = "coral-cove-database";

  $staffId = 10; //Staff ID for Robbie Coltrane, who is the ceo.

  try {
    $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
    echo "<script>console.log('Successful Connection');</script>";
  } catch(Exception $e) {
      echo $e;
  }
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
                        <a class="nav-link active" aria-current="page" href="Staff.html">Executive</a>
                    </li>            
                </ul>
            </div>
        </div>
    </nav>

    <section>
    <?php $data = readStaffData($staffId); ?>
        <div class="container py-3">            
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo $data["FirstName"], " ", $data["LastName"] ?></h5>
                            <button type="button" class="btn btn-primary">Update Details</button>                                                        
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Staff ID</p>
                                    <?php echo $data["StaffID"]; ?>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Email</p>
                                    <?php echo $data["Email"]; ?>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                    <?php echo $data["Phone"]; ?>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Position</p>
                                    <?php echo $data["Position"]; ?>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Salary</p>
                                    <?php echo "£", $data["Salary"]; ?>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Branch</p>
                                    <?php echo $data["BranchName"]; ?>
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
       
    </section>
    

    <section class="profits">
    <?php
      $profitData = readBranchProfit();
      foreach ($profitData as $profitValue) {
        echo '<div class="container mt-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title branch name">', $profitValue["BranchName"], '</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Sales</h6>
                            <p> £', $profitValue["Sales"], '</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Expenses</h6>
                            <p> £', $profitValue["Expenses"], '</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Profit</h6>
                            <p> £', $profitValue["Profit"], '</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
      }
    ?>
        

            <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Total Profit </h5>
                  <p>ss</p>
                </div>
            </div>
          </div>
        

    </section>

    <div class="container mt-4">
        <div class="card mb-4 p-3">
        <h2>Payroll</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Staff ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Position</th>
              <th>Salary</th>
              <th>Branch</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <!-- Data rows would go here -->
          </tbody>
        </table>
        </div>
      </div>

      <?php

        // Function to read staff data (reused from the Staff and Manager pages)
        function readStaffData($staffId) {
            global $mysql;
            $query = $mysql->prepare("CALL readStaffData(:staffId);");
            $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        // Function to read staff salary
        function readStaffSalary($staffId) {
            $staffData = readStaffData($staffId);
            return $staffData['Salary'];
        }

        // Function to read branch profit
        function readBranchProfit() {
            global $mysql;
            $query = $mysql->prepare("CALL ReadBranchProfit();");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        // Function to read total profit
        function readTotalProfit() {
            global $mysql;
            $query = $mysql->prepare("CALL ReadTotalProfit();");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        // Function to read profit by month at each branch
        function ReadProfitByMonth() {
            global $mysql;
            $query = $mysql->prepare("CALL ReadProfitByMonth();");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        // Function to read sales by branch and profit by branch or total profit
        function readSalesAndProfit($branchName = null) {
            global $mysql;

            $salesQuery = "SELECT BranchName, SUM(TotalCost) AS TotalSales FROM OrderInfo GROUP BY BranchName";
            $profitQuery = "SELECT BranchName, SUM(TotalCost - CostPerUnit * QuantityOrdered) AS TotalProfit FROM OrderInfo 
                            JOIN SupplierItem ON OrderInfo.OrderDate = SupplierItem.DateOrdered GROUP BY BranchName";

            if ($branchName !== null) {
                $salesQuery .= " WHERE BranchName = :branchName";
                $profitQuery .= " WHERE BranchName = :branchName";
            }

            $salesStatement = $mysql->prepare($salesQuery);
            $profitStatement = $mysql->prepare($profitQuery);

            if ($branchName !== null) {
                $salesStatement->bindParam(':branchName', $branchName, PDO::PARAM_STR);
                $profitStatement->bindParam(':branchName', $branchName, PDO::PARAM_STR);
            }

            $salesStatement->execute();
            $profitStatement->execute();

            $salesResult = $salesStatement->fetchAll(PDO::FETCH_ASSOC);
            $profitResult = $profitStatement->fetchAll(PDO::FETCH_ASSOC);

            return array('sales' => $salesResult, 'profit' => $profitResult);
        }

        // Function to read sales by month and by branch
        function readSalesByMonthAndBranch() {
            global $mysql;

            $query = "SELECT EXTRACT(MONTH FROM OrderDate) AS Month, BranchName, SUM(TotalCost) AS TotalSales 
                      FROM OrderInfo GROUP BY EXTRACT(MONTH FROM OrderDate), BranchName";

            $statement = $mysql->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to read products that are in and out of stock (reused from the Manager page)
        function determineStockStatus() {
            global $mysql;
            $query = $mysql->query("CALL determineStockStatus();");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }
      ?>
</body>
</html>