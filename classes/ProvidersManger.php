<?php

    require_once "Database.php";

    class ProvidersManger {
        private static $offset = 0;

        public static function getAll($count = null) : array {
            global $connection;

            $providers = [];

            $result = $connection -> query ("
                select * from providers
                " . ($count ? "limit 0, $count" : '') . ";
            ");

            ProvidersManger::$offset = ProvidersManger::$offset + $count;

            foreach ($result as $row) {
                $providers[] = $row;
            }

            return $providers;
        }

        public static function get($id) {
            global $connection;

            $result = $connection -> query("
                select * from providers where id = $id
            ");

            foreach ($result as $row) {
                return $row;
            }
        }

        public static function recipes($id) {
            global $connection;

            $recipes = [];

            $result = $connection -> query("
                select recipes.id, title, descrption, type, image, providers.name, category from recipes
                inner join providers on recipes.provider_id = providers.id
                inner join categories on recipes.category_id = categories.id
                where recipes.provider_id = $id
            ");

            foreach ($result as $row) {
                $recipes[] = $row;
            }

            return $recipes;
        }

        public static function update (...$data) {
            global $connection;

            $result = $connection -> query("
                update providers set name = '$data[1]', email = '$data[2]', phone = '$data[3]'
                where id = $data[0];
            ");

            return $result;
        }

        public static function insert (...$data) {
            global $connection;

            $result = $connection -> query("
                insert into providers (name, email, phone)
                values ('$data[0]', '$data[1]','$data[2]');
            ");

            return $result;
        }

        public static function delete ($id) {
            global $connection;

            $result = $connection -> query("
                delete from providers where id = $id
            ");

            return $result;
        }
    }