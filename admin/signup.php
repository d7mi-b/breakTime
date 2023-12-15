<?php 
    require_once "../classes/Database.php";

    session_start();
    session_regenerate_id();
    if(!isset($_SESSION['email'])) {    // if there is no valid session
        throw new Exception("Not Authorized!");
    }

    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
            if (!$email || !$password) {
                http_response_code(400);
                throw new Exception("All fields must fill!");
            }

            $password = password_hash($password, PASSWORD_DEFAULT);

            $result = $connection -> query("
                insert into admin (email, password)
                values ('$email', '$password');
            ");

            if ($result) {
                session_name('BOXAUTH');
                session_start();
            } else {
                throw new Exception("Somthing Wrrong, try again!");
            }

        } catch (Exception $e) { 
            http_response_code(400);
            echo json_encode(["message" => $e -> getMessage()]);
        }
    }
?>