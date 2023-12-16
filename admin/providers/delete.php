<?php

    require_once "././classes/Database.php";
    require_once "././classes/ProvidersManger.php";

    $id = $_GET["id"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $id) {
        $result = ProvidersManger::delete($id);

        if ($result) {
            header("Location: /BreakTime/providers");
        }
    }