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
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                  <a href="#" class="btn btn-primary my-2">Products</a>
                  <a href="#" class="btn btn-secondary my-2">Orders</a>
                </p>
              </div>
            </div>
          </section>

          <div class="album py-5 bg-body-tertiary">
            <div class="container">
        
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                  <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <img src="WhatsApp Image 2023-11-14 at 05.52.56_b46eaf9c.jpg" alt="" width="400px" height="200px">
                  </a>
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>
        
                <div class="col">
                  <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        </div>
          


    </main>

    <footer>

    </footer>


    <?php

    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";

    $customerId = 1; //Customer ID of John Smith for use in the code.

    try {
        $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
        echo "Successful Connection";
    } catch(Exception $e) {
        echo $e;
    }

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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
