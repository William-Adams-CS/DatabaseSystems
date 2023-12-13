<?php
  session_start();
  if ($_SESSION["username"] != "customer") {
  header("Location: "."index.html");
  die();
  }

  $host = "coral-cove-database.co6e0uywsscm.us-east-1.rds.amazonaws.com";
  $username = "admin";
  $password = "Password123";
  $dbname = "coral-cove-database";

  $customerId = 1; //customer ID for john smith

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
    <title>Customer View</title>

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
    <header>
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <main>

      <section class="products">
            <div class="container mt-4">
              <h1>Products</h1>
              <div class="row border-top">
                <?php
                  $counter = 1;
                  $productData = readProductInformation();
                  foreach ($productData as $product) {
                    echo '  <div class="col-md-3 mb-5">
                              <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="', $product["ProductImageAddress"], '" alt="Card image cap" width="286" height="383">
                                <div class="card-body">
                                  <h5 id="name', "$counter", '" class="card-title">', $product["ProductName"] ,'</h5>
                                  <p id="category', "$counter", '" class="card-text">', $product["Category"] ,'</p>
                                  <p id="price', "$counter", '" class="card-text">£', $product["Price"] ,'</p>
                                  <a id=', $counter, ' href="" onclick="addToCart(this)" class="btn btn-primary">Add to cart</a>
                                </div>
                              </div>
                            </div>';
                    $counter++;
                  }
                ?>
              </div>
            </div>

        <!-- <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="', $product["ProductImageAddress"], '" alt="Card image cap">
          <div class="card-body">
            <h5 id="name', "$product", '" class="card-title">', $product["ProductName"] ,'</h5>
            <p id="category', "$product", '" class="card-text">', $product["Category"] ,'</p>
            <p id="price', "$product", '" class="card-text">', $product["Price"] ,'</p>
            <a id="$product" href="" onclick="addToCart(this)" class="btn btn-primary">Add to cart</a>
          </div>
        </div> -->
          
      </section>

 
<!-- <section class="h-100 h-custom" style="background-color: #121017;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                      <h6 class="mb-0 text-muted">1 item</h6>
                    </div>
                    <hr class="my-4">
  
                    Product 1
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                          class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted">Category</h6>
                        <h6 class="text-black mb-0">Shirt</h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2">
                        <h6 class="text-muted">ProductName</h6>
                        <h6 class="text-black mb-0">Cotton T-shirt</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class="mb-0">Price</h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="pt-5">
                      <h6 class="mb-0"><a href="#!" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items 1</h5>
                      <h5>€ 44.00</h5>
                    </div>
  
                    <h5 class="text-uppercase mb-3">Shipping</h5>
  
                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Standard-Delivery- €5.00</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                      </select>
                    </div>
  
                    <h5 class="text-uppercase mb-3">Give code</h5>
  
                    <div class="mb-5">
                      <div class="form-outline">
                        <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Examplea2">Enter your code</label>
                      </div>
                    </div>
  
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>€ 49.00</h5>
                    </div>
  
                    <button type="button" class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Register</button>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  

    </main>
    <div class="container">
      <footer class="py-5 border-top navbar-fixed-bottom">
        <row class="row mt-1">
          <div class="col-9">
            <p id="cart"><b>Cart: </b></p>
            <p id="totalItems"><b>Total Items: </b></p>
            <p id="totalPrice"><b>Total Price: </b></p>
          </div>
          <div class="col-3 position-relative">
            <button class="btn btn-primary mb-1" type="button">Check Out</button>
            <button class="btn btn-primary" type="button" onclick="removeItemsFromCart()">Remove Items From Cart</button>
          </div>
        </row>
      </footer>
    </div>

    <script>

      let cart = [];
      let totalItems = 0;
      let TotalPrice = [];

      function addToCart(element) {
        number = element.id;
        name = document.getElementById("name" + number).innerHTML;
        price = document.getElementById("price" + number).innerHTML;

        price = price.slice(1);

        cart.push(name);
        TotalPrice.push(parseFloat(price));

        updateCart();

        event.preventDefault();

      }

      function updateCart() {

        cartLength = cart.length;
        cartItems = "";
        totalCost = 0;

        for (let i = 0; i < cartLength; i++) {

          cartItems += cart[i];

          if(i != cartLength - 1){
            cartItems += ", ";
          }

        }

        for (let v = 0; v < cartLength; v++) {

          totalCost += TotalPrice[v];

        }

        totalCost = totalCost.toString()
        cartLength = cartLength.toString()

        document.getElementById("cart").innerHTML = "<b>Cart: </b>" + cartItems;
        document.getElementById("totalItems").innerHTML = "<b>Total Items: </b>" + cartLength;
        document.getElementById("totalPrice").innerHTML = "<b>Total Price: </b>" + "£" + totalCost;

        event.preventDefault();

      }

      function removeItemsFromCart() {

        cart = [];
        totalItems = 0;
        TotalPrice = [];

        updateCart();

        event.preventDefault();

      }

    </script>

    <?php
      function readProductInformation() {
        global $mysql;
        $query = $mysql->query("CALL readAvailableProducts();");
        return $query->fetchAll(PDO::FETCH_ASSOC);
      }
    ?>

</body>
</html>
