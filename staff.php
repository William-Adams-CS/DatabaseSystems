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
            <th>Customer</th>
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
        // Assuming you have already established a database connection
        // Replace the placeholders with your actual database credentials
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "Coral-Cove-Database";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to retrieve staff information
        function getStaffInfo($staffId) {
            global $conn;

            $sql = "SELECT * FROM Staff WHERE StaffID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $staffId); // "i" represents integer type
            $stmt->execute();
            
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        // Function to update staff information
        function updateStaffInfo($staffId, $firstName, $lastName, $email, $phone) {
            global $conn;

            $sql = "UPDATE Staff SET FirstName=?, LastName=?, Email=?, Phone=? WHERE StaffID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $firstName, $lastName, $email, $phone, $staffId); // "s" represents string, "i" represents integer
            $stmt->execute();

            return $stmt->affected_rows > 0;
        }

        // Function to retrieve customer information
        function getCustomerInfo() {
            global $conn;

            $sql = "SELECT * FROM Customers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $customers = array();
                while ($row = $result->fetch_assoc()) {
                    $customers[] = $row;
                }
                return $customers;
            } else {
                return null;
            }
        }

        // Function to retrieve order information
        function getOrderInfo() {
            global $conn;

            $sql = "SELECT * FROM OrderInfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $orders = array();
                while ($row = $result->fetch_assoc()) {
                    $orders[] = $row;
                }
                return $orders;
            } else {
                return null;
            }
        }

        // Function to retrieve delivery information
        function getDeliveryInfo() {
            global $conn;

            $sql = "SELECT * FROM Deliveries";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $deliveries = array();
                while ($row = $result->fetch_assoc()) {
                    $deliveries[] = $row;
                }
                return $deliveries;
            } else {
                return null;
            }
        }

        // Function to retrieve product information
        function getProductInfo() {
            global $conn;

            $sql = "SELECT * FROM Product";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $products = array();
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
                return $products;
            } else {
                return null;
            }
        }

        // Function to retrieve products that are in and out of stock
        function getStockInfo() {
            global $conn;

            $sql = "SELECT Product.ProductID, Product.ProductName, Stock.StockQuantity
                    FROM Product
                    LEFT JOIN Stock ON Product.ProductID = Stock.ProductID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $stockInfo = array();
                while ($row = $result->fetch_assoc()) {
                    $stockInfo[] = $row;
                }
                return $stockInfo;
            } else {
                return null;
            }
        }

        // Close the database connection
        $conn->close();
    ?>

</body>
</html>