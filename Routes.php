<?php 
    require_once './classes/Application.php';

    session_name('BreakTimeSESS');
    session_start();

    $admin_routes = [
        '/BreakTime/recipe/add',
        '/BreakTime/recipe/update',
        '/BreakTime/recipe/delete',
        '/BreakTime/provider/add',
        '/BreakTime/provider/update',
        '/BreakTime/provider/delete',
    ];

    if ($_SERVER["REQUEST_URI"] !== "/BreakTime/server-down" && Application::$maintaniceMood) {
        header("Location: /BreakTime/server-down");
    } elseif ($_SERVER["REQUEST_URI"] === "/BreakTime/server-down" && !Application::$maintaniceMood) {
        header("Location: /BreakTime/");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_SESSION["email"])) {
            switch ($_SERVER["REDIRECT_URL"]) {
                case '/BreakTime/recipe/add': {
                    require_once "admin/Recipes/add.php";
                    break;
                }
                case '/BreakTime/recipe/update': {
                    require_once "admin/Recipes/update.php";
                    break;
                }
                case '/BreakTime/provider/add': {
                    require_once "admin/Providers/add.php";
                    break;
                }
                case '/BreakTime/provider/update': {
                    require_once "admin/Providers/update.php";
                    break;
                }
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_SESSION["email"]) && array_search($_SERVER["REDIRECT_URL"], $admin_routes)) {
            switch ($_SERVER["REDIRECT_URL"]) {
                case '/BreakTime/recipe/add': {
                    require_once "admin/Recipes/add.php";
                    break;
                }
                case '/BreakTime/recipe/update': {
                    require_once "admin/Recipes/update.php";
                    break;
                }
                case '/BreakTime/recipe/delete': {
                    require_once "admin/Recipes/delete.php";
                    break;
                }
                case '/BreakTime/provider/add': {
                    require_once "admin/Providers/add.php";
                    break;
                }
                case '/BreakTime/provider/update': {
                    require_once "admin/Providers/update.php";
                    break;
                }
                case '/BreakTime/provider/delete': {
                    require_once "admin/Providers/delete.php";
                    break;
                }
            }
        } elseif (!array_search($_SERVER["REDIRECT_URL"], $admin_routes)) {
            switch ($_SERVER["REDIRECT_URL"]) {
                case '/BreakTime/': {
                    require_once "index.php";
                    break;
                }
                case '/BreakTime/recipes': {
                    require_once "recipes.php";
                    break;
                }
                case '/BreakTime/recipe': {
                    require_once "recipe.php";
                    break;
                }
                case '/BreakTime/providers': {
                    require_once "providers.php";
                    break;
                }
                case '/BreakTime/provider': {
                    require_once "provider.php";
                    break;
                }
                case '/BreakTime/login': {
                    require_once "admin/login.php";
                    break;
                }
                case '/BreakTime/server-down': {
                    require_once "serverDown.php";
                    break;
                }
                default : {
                    require_once "404.php";
                    break;
                }
            }
        }
    }

?>