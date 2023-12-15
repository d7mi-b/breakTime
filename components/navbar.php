<header>
    <nav class="navbar">
        <ul class="nav-list">
            <li>
                <a href="/BreakTime/"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-1">
                    BreakTime
                </a>
            </li>

            <li>
                <a href="/BreakTime/recipes.php"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-1">
                    Recipes
                </a>
            </li>

            <li>
                <a href="/BreakTime/providers.php"
                    class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                    Providers
                </a>
            </li>

            <?php
                if (isset($_SESSION["email"])) {
            ?>
                <li>
                    <a href="/BreakTime/admin/Recipes/add.php"
                        class="u-link u-no-underline u-text-black u-text-hover-palette-2-base u-link-2">
                        Add Recipes
                    </a>
                </li>

                <li>
                    <a href="/BreakTime/admin/Providers/add.php"
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