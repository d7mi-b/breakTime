<?php 
    require_once "Application.php";

    $connection = new mysqli(
        Application::$serverDB, Application::$userDB, Application::$passwordDB, Application::$database
    );

    interface Table {
        public static function getAll($count = null) : array;

        public static function get($id);

        public static function update (...$data);

        public static function insert (...$data);

        public static function delete ($id);
    }
?>