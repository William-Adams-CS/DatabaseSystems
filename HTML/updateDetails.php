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
            $_SESSION["firstname"] = $_GET["firstname"];
            $_SESSION["lastname"] = $_GET["lastname"];
            $_SESSION["phone"] = $_GET["phone"];
            
            if ($_SESSION["password"] == "password"){
                if ($_SESSION["username"] == "customer") {
                    $ID = 1;
                } elseif ($_SESSION["username"] == "staff") {
                    $ID = 2;
                } elseif ($_SESSION["username"] == "manager") {
                    $ID = 14;
                } elseif ($_SESSION["username"] == "executive") {
                    $ID = 10;
                } else {
                    header("Location: "."index.html");
                    die();
                }
            } else {
                header("Location: "."index.html");
                die();
            }

            if(str_contains('=', $_SESSION["firstname"]) || str_contains('+', $_SESSION["firstname"]) || str_contains('*', $_SESSION["firstname"]) || str_contains('-', $_SESSION["firstname"]) || str_contains('%', $_SESSION["firstname"])) {
                echo '<p>Error with first name as it contained invalid characters</p>';
            }
            elseif(str_contains('=', $_SESSION["lastname"]) || str_contains('+', $_SESSION["lastname"]) || str_contains('*', $_SESSION["lastname"]) || str_contains('-', $_SESSION["lastname"]) || str_contains('%', $_SESSION["lastname"])) {
                echo '<p>Error with last name as it contained invalid characters</p>';
            }
            elseif(str_contains('=', $_SESSION["phone"]) || str_contains('+', $_SESSION["phone"]) || str_contains('*', $_SESSION["phone"]) || str_contains('-', $_SESSION["phone"]) || str_contains('%', $_SESSION["phone"])) {
                echo '<p>Error with phone number as it contained invalid characters</p>';
            }
            else {
                if ($_SESSION["username"] == "customer") {
                    updateCustomerData($ID, $_SESSION["firstname"], $_SESSION["lastname"], $_SESSION["phone"]);
                } elseif ($_SESSION["username"] == "staff" || $_SESSION["username"] == "manager" || $_SESSION["username"] == "executive") {
                    updateStaffData($ID, $_SESSION["firstname"], $_SESSION["lastname"], $_SESSION["phone"]);
                }

                echo '<p>Details have been changed successfully</p>';
            }

            echo '<p><a href="index.html">Back to login page</a></p>';

        ?>
    </body>

    <?php

    function updateCustomerData($id, $firstName, $lastName, $phone) {
        global $mysql;
        $query = $mysql->prepare("CALL updateCustomerData(:Id,:firstName,:lastName,:phone);");
        $query->bindParam(':Id', $id, PDO::PARAM_INT);
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_INT);
        $query->execute();
    }

    function updateStaffData($id, $firstName, $lastName, $phone) {
        global $mysql;
        $query = $mysql->prepare("CALL updateStaffInfo(:Id,:firstName,:lastName,:phone);");
        $query->bindParam(':Id', $id, PDO::PARAM_INT);
        $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_INT);
        $query->execute();
    }
?>

</html>