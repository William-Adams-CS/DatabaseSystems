<html>
    <body>
        <?php
            session_start();
            $_SESSION["username"] = $_GET["username"];
            $_SESSION["password"] = $_GET["password"];
            
            if ($_SESSION["password"] == "password"){
                if ($_SESSION["username"] == "customer") {
                    header("Location: "."customer.php");
                    die();
                } elseif ($_SESSION["username"] == "staff") {
                    header("Location: "."staff.php");
                    die();
                } elseif ($_SESSION["username"] == "manager") {
                    header("Location: "."manager.php");
                    die();
                } elseif ($_SESSION["username"] == "executive") {
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