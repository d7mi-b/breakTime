<?php 
    session_name('BreakTimeSESS');
    session_start();
?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">

        <section class="u-align-right u-clearfix u-section-2" id="carousel_0f8b">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div
                    class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1">
                </div>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">BreakTime</h1>
                <p class="u-text u-text-2">Start your day with an easy pancake or omelet breakfast. Or plan a showstopping
                    brunch with quiches, waffles, casseroles, and more!</p>
                <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-1"
                                src="">
                                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                                    <a href="/BreakTime/recipes.php"
                                        class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-1">recipes</a>
                                    <a href="/BreakTime/providers.php"
                                        class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">Providers</a>
                                    <?php
                                        if (isset($_SESSION["email"])) {
                                    ?>
                                        <a href="/BreakTime/admin/Recipes/add.php"
                                            class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                                            Add Recipes
                                        </a>
                                        <a href="/BreakTime/admin/Providers/add.php"
                                            class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                                            Add Providers
                                        </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="u-container-style u-image u-layout-cell u-size-20 u-image-1" src="">
                                <div class="u-container-layout u-container-layout-2"></div>
                            </div>
                            <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-3" src="">
                                <div class="u-container-layout u-valign-bottom u-container-layout-3">
                                    <img class="u-expand-resize u-expanded-width u-image u-image-2" src="./images/2.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php require_once 'components/footer.php' ?>

    </body>

</html>