<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="boxicons.min.css">
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
        <form action="">
        <h1>Login</h1>

        <div class="input-box">
        <input type="text" placeholder="Username" required>
        <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" placeholder="password" required>
            <i class='bx bxs-lock'></i>
            </div>

            <button type="submit" class="btn"> Login  </button>

            <div class="register-link">
                <p>Dont have an account? <a href="#"> Register </a>
                </p>
                 </div>
                 </form>


    </div>
</div>
</div>
</div>



    </main>
    
</body>
</html>