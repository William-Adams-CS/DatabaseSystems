<?php
  session_start();
  if ($_SESSION["username"] != "manager") {
    header("Location: "."index.html");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="cart.css">
    <title>log iun page  in html</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand" href="#">Navbar scroll</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Staff</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="#">Manager</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                  </li>
                  
                </ul>

                <li>
                    <a href=""><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                </li>
                
                  
                  <button class="btn btn-outline-success" type="submit">Login</button>
                
              </div>
            </div>
        </nav>
    </header>
    <main> 
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="wrapper">
                        <div class="small-container cart-page">
                        <table>
                            <tr>
                                <th>Product</th>
                                <th>In Stock</th>
                                <th>Staff</th>
                                <th>orders</th>
                                <th>Upcoming deliveries</th>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="fishing gear studio.jpg" alt="">
                                        <div>
                                            <p>Fishing Gear</p>
                                            <small>Price: $55</small>
                                           
                                             </div>
                                    </div>
                                </td>
                                <td> 10</td>
                                <td>Michael Johnson</td>
                                <td>2</td>
                                <td>10-02-23 by 4pm</td>
                            </tr>
                    
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="fishing gear studio.jpg" alt="">
                                        <div>
                                            <p>Fishing Gear</p>
                                            <small>Price: $55</small>
                                            
                                             </div>
                                    </div>
                                </td>
                                <td> 15</td>
                                <td>Michael Johnson</td>
                                <td>2</td>
                                <td>10-02-23 by 4pm</td>
                                
                            </tr>
                    
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="fishing gear studio.jpg" alt="">
                                        <div>
                                            <p>Fishing Gear</p>
                                            <small>Price: $55</small>
                                           
                                             </div>
                                    </div>
                                </td>
                                <td> 20</td>
                                <td>Michael Johnson</td>
                                <td>2</td>
                                <td>10-02-23 by 4pm</td>
                                
                            </tr>
                    
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="fishing gear studio.jpg" alt="">
                                        <div>
                                            <p>Fishing Gear</p>
                                            <small>Price: $55</small>
                                            
                                             </div>
                                    </div>
                                </td>
                                <td> 25</td>
                                <td>Michael Johnson</td>
                                <td>2</td>
                                <td>10-02-23 by 4pm</td>
                                
                            </tr>
                    
                            
                        </table>
                    <table>
                        <div class="total-price">
                            <tr>
                                <td>SubTotal</td>
                                <td>$200</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>$30</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>$230</td>
                            </tr>
                        </div>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php

    $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
    $username = "admin";
    $password = "Password123";
    $dbname = "coral-cove-database";

    $managerId = 29; //Manager ID for Amelia Turner, who manages the Aberdeen branch.
    
    try {
        $mysql = new PDO("mysql:host=".$host.";dbname=".$dbname,$username, $password);
        echo "Successful Connection";
    } catch(Exception $e) {
        echo $e;
    }
    
    // Function to read manager data
    function readManagerData($managerId) {
        global $mysql;
        $query = $mysql->prepare("SELECT * FROM Staff WHERE StaffID = :managerId");
        $query->bindParam(':managerId', $managerId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    // Function to read staff data (reused from the Staff page)
    function readStaffData($staffId) {
        global $mysql;
        $query = $mysql->prepare("SELECT * FROM Staff WHERE StaffID = :staffId");
        $query->bindParam(':staffId', $staffId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    // Function to read products that are in and out of stock
    function determineStockStatus() {
        global $mysql;
        $query = $mysql->query("SELECT * FROM Product WHERE StockQuantity > 0");
        $inStock = $query->fetchAll(PDO::FETCH_ASSOC);
    
        $query = $mysql->query("SELECT * FROM Product WHERE StockQuantity = 0");
        $outOfStock = $query->fetchAll(PDO::FETCH_ASSOC);
    
        return array('inStock' => $inStock, 'outOfStock' => $outOfStock);
    }
    
    // Function to read supplier information
    function readSupplierInformation() {
        global $mysql;
        $query = $mysql->query("SELECT * FROM Supplier");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Function to read product information (reused from the Staff page)
    function readProductInformation() {
        global $mysql;
        $query = $mysql->query("SELECT * FROM Product");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

</body>
</html>