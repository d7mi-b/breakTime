<?php

    require_once "Database.php";

    class RecipesManager {
        private static $offset = 0;

        public static function getAll($count) : array {
            global $connection;

            $recipes = [];

            $result = $connection -> query ("
                select recipes.id, title, descrption, type, image, providers.name, category from recipes
                inner join providers on recipes.provider_id = providers.id
                inner join categories on recipes.category_id = categories.id
                limit 0, $count;
            ");

            RecipesManager::$offset = RecipesManager::$offset + $count;

            foreach ($result as $row) {
                $recipes[] = $row;
            }

            return $recipes;
        }

        public static function get($id) {
            global $connection;

            $result = $connection -> query("
                select recipes.*, providers.name, category from recipes
                inner join providers on recipes.provider_id = providers.id
                inner join categories on recipes.category_id = categories.id
                where recipes.id = $id
            ");

            foreach ($result as $row) {
                return $row;
            }
        }

        public static function update (...$data) {
            global $connection;

            $result = $connection -> query("
                update recipes set 
                title = '$data[1]', descrption = '$data[2]', type = '$data[3]',
                category_id = $data[4], provider_id = $data[5], image = '$data[6]'
                where id = $data[0];
            ");

            return $result;
        }

        public static function insert (...$data) {
            global $connection;

            try {
                $result = $connection -> query("
                    insert into recipes (title, descrption, type, category_id, provider_id, image)
                    values ('$data[0]', '$data[1]', '$data[2]', $data[3], $data[4], '$data[5]');
                ");

                return $result;
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        public static function delete ($id) {
            global $connection;

            $result = $connection -> query("
                delete from recipes where id = $id
            ");

            return $result;
        }
    }