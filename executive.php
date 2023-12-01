<?php
  session_start();
  if ($_SESSION["username"] != "executive") {
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
    <title>BIOSHOCK</title>
    </head>

    <body>
        <header class="sticky-top">
            <nav class="navbar bg-primary" data-bs-theme="dark">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="WhatsApp Image 2023-11-14 at 05.52.56_b46eaf9c.jpg" alt="" width="400px" height="200px">
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end" >
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Login</a>
                      </li>
                        
                      <li class="nav-item">
                        <a class="nav-link" href="#gameplay">Products</a>
                      </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="#development">
                              Development
                            </a>
                      </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="#Staff">Staff
                            </a>                      
                      </li>
                      
                        <li class="nav-item">
                            <a class="nav-link" href="#managers">
                              Managers
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item nav-link active" href="#reception">Critical Response</a></li>
                              <li><a class="dropdown-item nav-link active" href="#reception">Awards</a></li>
                              <li><a class="dropdown-item nav-link active" href="#reception">Sales</a></li>
                              <li><a class="dropdown-item nav-link active" href="#reception">PC technical issues and DRM</a></li>
                            </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#legacy"> Administartive view </a>
                      </li>
                      </header>
    <main>
        <body class="bg-body-tertiary">
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
              <symbol id="check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
              </symbol>
              <symbol id="circle-half" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
              </symbol>
              <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
              </symbol>
              <symbol id="sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
              </symbol>
            </svg>
        
            <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
              <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
                      id="bd-theme"
                      type="button"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      aria-label="Toggle theme (auto)">
                <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                  </button>
                </li>
              </ul>
            </div>
        
            
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Offcanvas navbar</a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Notifications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Switch account</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        
        <div class="nav-scroller bg-body shadow-sm">
          <nav class="nav" aria-label="Secondary navigation">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            <a class="nav-link" href="#">
              Friends
              <span class="badge text-bg-light rounded-pill align-text-bottom">27</span>
            </a>
            <a class="nav-link" href="#">Explore</a>
            <a class="nav-link" href="#">Suggestions</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
          </nav>
        </div>
        
       
          


    </main>

    <footer>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php

    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";

    $staffId = 22; //Staff ID for Robbie Coltrane, who is the ceo.
    
    try {
      $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
      echo "Successful Connection";
    } catch(Exception $e) {
        echo $e;
    }
    
    // Function to read staff data (reused from the Staff and Manager pages)
    function readStaffData($staffId) {
        global $mysql;
        $query = $mysql->prepare("SELECT * FROM Staff WHERE StaffID = :staffId");
        $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    // Function to read staff salary
    function readStaffSalary($staffId) {
        $staffData = readStaffData($staffId);
        return $staffData['Salary'];
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
        $query = $mysql->query("SELECT * FROM Product WHERE StockQuantity > 0");
        $inStock = $query->fetchAll(PDO::FETCH_ASSOC);
    
        $query = $mysql->query("SELECT * FROM Product WHERE StockQuantity = 0");
        $outOfStock = $query->fetchAll(PDO::FETCH_ASSOC);
    
        return array('inStock' => $inStock, 'outOfStock' => $outOfStock);
    }
    ?>

</body>
</html>