<?php 
    require_once "classes/RecipesManager.php";

    session_name('BreakTimeSESS');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $result = RecipesManager::getAll(10);
    }
?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">
        <?php require_once "components/navbar.php" ?>

        <main class="u-clearfix u-section-2" id="carousel_0f8b">
            <div class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1"></div>

            <header>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Recipes</h1>
            </header>

            <section class="recipes-container">
                <?php 
                    if ($result) {
                        foreach ($result as $row) {
                ?>
                            <a class="recipe" href="/BreakTime/recipe.php?id=<?= $row["id"] ?>">
                                <section class="image">
                                    <img src="<?= $row["image"] ?>" alt="<?= $row["title"] ?> image">
                                </section>
                                <header>
                                    <h2><?= $row["title"] ?></h2>
                                </header>
                            </a>
                <?php
                        }
                    }
                ?>
            </section>
        </main>

        <?php require_once 'components/footer.php' ?>
    </body>

</html>