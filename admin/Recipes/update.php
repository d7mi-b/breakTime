<?php

    require_once "../../classes/Database.php";
    require_once "../../classes/RecipesManager.php";
    require_once "../../classes/ProvidersManger.php";

    session_name('BreakTimeSESS');
    session_start();
    if (!isset($_SESSION["email"]))
        header("Location: /BreakTime/");

    $id = $_GET["id"] ?? null;

    $recipe = null;

    $title = $_POST['title'] ?? '';
    $descrption = $_POST['descrption'] ?? '';
    $type = $_POST['type'] ?? '';
    $category = $_POST['category'] ?? '';
    $provider = $_POST['provider'] ?? '';
    $image = $_POST['image'] ?? '';

    $error = null;

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $id) {
        $recipe = RecipesManager::get($id);

        $providers = ProvidersManger::getAll();

        $categories = $connection -> query("
            select * from categories;
        ");
    }


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!$title || !$descrption || !$type || !$category || !$provider || !$image) {
            throw new Exception("You must fill all fields!");
        }

        try {
            $result = RecipesManager::update(
                $id, $title, $descrption, $type, $category, $provider, $image
            );

            if ($result === true) {
                header("Location: /BreakTime/recipe.php?id=$id");
            } else {
                $error = $result;
            }
        } catch (Exception $e) {
            $error = $e -> getMessage();
        }

    }
?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "../../components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">
        <?php require_once "../../components/navbar.php" ?>

        <main class=" u-section-2" id="carousel_0f8b">
            <div class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1"></div>

            <header>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Update <?= $recipe["title"] ?? '' ?></h1>
            </header>

            <section class="add-recipe">
                <form method="post">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" required value="<?= $recipe["title"] ?? "" ?>">
                    </div>

                    <div>
                        <label for="descrption">Descrption</label>
                        <textarea name="descrption" required><?= $recipe["descrption"] ?? "" ?></textarea>
                    </div>

                    <div>
                        <label for="type">Type</label>
                        <select name="type" value="<?= $recipe["type"] ?? '' ?>">
                            <option <?= ($recipe["type"] === "lunch" ? "selected" : "") ?> value="lunch">lunch</option>
                            <option <?= ($recipe["type"] === "dinner" ? "selected" : "") ?> value="dinnar">dinnar</option>
                        </select>
                    </div>

                    <div>
                        <label for="category">Category</label>
                        <select name="category">
                            <option disabled>Choose category</option>
                            <?php 
                                if ($categories) {
                                    foreach($categories as $category) {
                            ?>
                                        <option <?= ($recipe["category_id"] === $category["id"] ? "selected" : "") ?> value="<?= $category["id"] ?>"><?= $category["category"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="provider">Provider</label>
                        <select name="provider">
                            <option disabled>Choose provider</option>
                            <?php 
                                if ($providers) {
                                    foreach($providers as $provider) {
                            ?>
                                        <option <?= ($recipe["provider_id"] === $provider["id"] ? "selected" : "") ?> value="<?= $provider["id"] ?>"><?= $provider["name"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="image">Image</label>
                        <input type="text" name="image" required value="<?= $recipe["image"] ?? "" ?>">
                    </div>

                    <div>
                        <input type="submit" name="save" value="save">
                    </div>
                </form>
                <?=  $error ? "<p>$error</p>" : "" ?>
            </section>
        </main>

        <?php require_once '../../components/footer.php' ?>
    </body>

</html>