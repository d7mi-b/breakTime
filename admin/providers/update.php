<?php

    require_once "../../classes/Database.php";
    require_once "../../classes/ProvidersManger.php";

    session_name('BreakTimeSESS');
    session_start();
    if (!isset($_SESSION["email"]))
        header("Location: /BreakTime/");

    $id = $_GET["id"] ?? null;

    $provider = null;

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $error = null;

    if ($_SERVER["REQUEST_METHOD"] === "GET" && $id) {
        $provider = ProvidersManger::get($id);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!$name || !$email || !$phone) {
            throw new Exception("You must fill all fields!");
        }

        try {
            $result = ProvidersManger::update(
                $id, $name, $email, $phone
            );

            if ($result === true) {
                header("Location: /BreakTime/provider.php?id=$id");
            } else {
                $error = $result;
            }
        } catch (Exception $e) {
            $error = $e -> getMessage();
        }

    }
?>

<!DOCphone html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "../../components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">
        <?php require_once "../../components/navbar.php" ?>

        <main class=" u-section-2" id="carousel_0f8b">
            <div class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1"></div>

            <header>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">Update Provider</h1>
            </header>

            <section class="add-recipe">
                <form method="post">
                    <div>
                        <label for="name">name</label>
                        <input type="text" name="name" required value="<?= $provider["name"] ?? "" ?>">
                    </div>

                    <div>
                        <label for="email">email</label>
                        <input type="email" name="email" required value="<?= $provider["email"] ?? "" ?>">
                    </div>

                    <div>
                        <label for="phone">phone</label>
                        <input type="tel" name="phone" required value="<?= $provider["phone"] ?? "" ?>">
                    </div>

                    <div>
                        <input type="submit" name="save" value="Save">
                    </div>
                </form>
                <?=  $error ? "<p>$error</p>" : "" ?>
            </section>
        </main>

        <?php require_once '../../components/footer.php' ?>
    </body>

</html>