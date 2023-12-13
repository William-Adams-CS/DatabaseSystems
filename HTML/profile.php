<?php
    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";
    
    try {
        $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
        echo "<script>console.log('Successful Connection')</script>";
    } catch(Exception $e) {
        echo $e;
    }
    session_start();
    if ($_SESSION["username"] != "customer") {
        header("Location: "."index.html");
        die();
    }

    $customerData = readCustomerData(1)
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2 navbar-fixed-top" data-bs-theme="dark">
        <img src="Coral Cove Fisheries Logo - Transparent PNG.png" style="width: 15%;" alt="">
        <div class="container-fluid">            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link"  href="customer.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profile</a>
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
                            <h5 class="my-3"><?php echo $customerData["FirstName"], " ", $customerData["LastName"] ?></h5>
                            <button type="button" class="btn btn-primary" onClick="redirect()">Update Details</button>  
                            <button type="button" class="btn btn-primary bg-danger" onClick="deleteAccount()">DELETE</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email:</p>
                                    <p class="mb-0"><?php echo $customerData["Email"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Phone:</p>
                                    <p class="mb-0"><?php echo $customerData["Phone"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address:</p>
                                    <p class="mb-0"><?php echo $customerData["AddressLine1"], ", ", $customerData["AddressLine2"], ", ", $customerData["City"], ", ", $customerData["PostalCode"] ?></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Loyalty Points:</p>
                                    <p class="mb-0"><?php echo $customerData["LoyaltyPoints"] ?></p>
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
            <h2>Order Information</h2>
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
                    $orders = readCustomerOrders(1);
                    echo "<tr>
                            <td>", $orders["OrderID"] ,"</td>
                            <td>", $orders["FirstName"] ,"</td>
                            <td>", $orders["LastName"] ,"</td>
                            <td>", $orders["TotalCost"] ,"</td>
                            <td>", $orders["OrderDate"] ,"</td>
                            <td>", $orders["ExpectedDeliveryDate"] ,"</td>
                            <td>", $orders["DeliveryStatus"] ,"</td>
                        </tr>";
                ?>
              </tbody>
            </table>
            </div>
          </div>
    </section>
    </section>

    <script>

    function redirect() { 
        window.location = "/HTML/updateForm.html"; 
    }

    function deleteAccount() {
        window.location = "/HTML/deleteAccountForm.html"; 
    }


    </script>

</body>

<?php

    function readCustomerData($id) {
        global $mysql;
        $query = $mysql->prepare("CALL readCustomerData(:customerId);");
        $query->bindParam(':customerId', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function readCustomerOrders($id) {
        global $mysql;
        $query = $mysql->prepare("CALL readCustomerOrders(:customerId);");
        $query->bindParam(':customerId', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
?>

</html>