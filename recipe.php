<?php 
    require_once "classes/RecipesManager.php";

    $id = $_GET["id"] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $id) {
        $recipe = RecipesManager::get($id); 
        $recipe["descrption"] = str_replace("\\r\\n", "<br>", $recipe["descrption"]);
    }

    if (!$recipe) {
        header("Location: 404.php");
    }
?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">
        <?php require_once "components/navbar.php" ?>

        <main class="u-clearfix u-section-2 recipe-page" id="carousel_0f8b">
            <div class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1"></div>

            <header>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">
                    <?= $recipe["title"] ?? ''; ?>
                </h1>
                <p><?= $recipe["category"] ?? "" ?>, provided by <?= $recipe["name"] ?? "" ?></p>
                <?php
                    if (isset($_SESSION["email"])) {
                ?>
                    <p><a href="/BreakTime/recipe/update?id=<?= $recipe['id'] ?? '' ?>">Edit</a> - <a href="/BreakTime/recipe/delete?id=<?= $recipe['id'] ?? '' ?>">Delete</a></p>
                <?php
                    }
                ?>
            </header>

            <article>
                <p>
                    <?= $recipe["descrption"] ?>
                </p>
                <section class="image">
                    <img src="<?= $recipe["image"] ?>" alt="recipe">
                </section>
            </article>
        </main>

        <?php require_once 'components/footer.php' ?>
    </body>

</html>