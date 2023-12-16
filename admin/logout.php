<?php 
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        unset($_SESSION["email"]);
        header("Location: /BreakTime/");
    }
?>