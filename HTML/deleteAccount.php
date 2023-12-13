<html>
    <body>
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
            $_SESSION["username"] = $_GET["username"];
            $_SESSION["password"] = $_GET["password"];
            
            if ($_SESSION["password"] == "password"){
                if ($_SESSION["username"] == "customer") {
                    $ID = 1;
                } elseif ($_SESSION["username"] == "staff") {
                    header("Location: "."index.html");
                    die();
                } elseif ($_SESSION["username"] == "manager") {
                    header("Location: "."index.html");
                    die();
                } elseif ($_SESSION["username"] == "executive") {
                    header("Location: "."index.html");
                    die();
                } else {
                    header("Location: "."index.html");
                    die();
                }
            } else {
                header("Location: "."index.html");
                die();
            }

            deleteCustomerData($ID);

            echo '<p>Account has been successfully deleted</p>';
            echo '<p><a href="index.html">Back to login page</a></p>';

        ?>
    </body>

    <?php

    function deleteCustomerData($id) {
        global $mysql;
        $query = $mysql->prepare("CALL deleteCustomerAccount(:Id);");
        $query->bindParam(':Id', $id, PDO::PARAM_INT);
        $query->execute();
    }

?>

</html>