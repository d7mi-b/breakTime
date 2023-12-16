<header>
    <nav class="navbar">
        <ul class="nav-list">
            <li>
                <a href="/BreakTime/"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-1">
                    <?= Application::$name ?>
                </a>
            </li>

            <li>
                <a href="/BreakTime/recipes"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-1">
                    Recipes
                </a>
            </li>

            <li>
                <a href="/BreakTime/providers"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                    Providers
                </a>
            </li>

            <?php
                if (isset($_SESSION["email"])) {
            ?>
                <li>
                    <a href="/BreakTime/recipe/add"
                        class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                        Add Recipes
                    </a>
                </li>

                <li>
                    <a href="/BreakTime/provider/add"
                        class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                        Add Providers
                    </a>
                </li>
            <?php
                }
            ?>
        </ul>
    </nav>
</header>