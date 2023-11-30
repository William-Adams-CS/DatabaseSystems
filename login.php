<html>
    <body>
        <?php
            $username = $_GET["username"];
            $password = $_GET["password"];
            
            if ($password == "password"){
                if ($username == "customer") {
                    header("Location: "."customer.php");
                    die();
                } elseif ($username == "staff") {
                    header("Location: "."staff.php");
                    die();
                } elseif ($username == "manager") {
                    header("Location: "."manager.php");
                    die();
                } elseif ($username == "executive") {
                    header("Location: "."executive.php");
                    die();
                } else {
                    header("Location: "."index.html");
                    die();
                }
            } else {
                header("Location: "."index.html");
                die();
            }
        ?>
    </body>
</html>