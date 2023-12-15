<?php
    require_once "../classes/Database.php";

    session_name('BreakTimeSESS');
    session_start();
    if (isset($_SESSION["email"]))
        header("Location: /BreakTime/");

    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;

    $error = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        try {
            $result = $connection -> query("
                select * from admin where email = '$email'
            ");

            if ($result -> num_rows == 0) {
                throw new Exception("Incorrect Email!");
            }

            foreach ($result as $row) {
                $admin = $row;
                break;
            }

            $match = password_verify($password, $admin["password"]);

            if ($match) {
                session_name('BreakTimeSESS');
                session_start();
                $_SESSION["email"] = $email;
                header("Location: /BreakTime/");
            } else {
                throw new Exception("Incorrect Password!");
            }
        } catch (Exception $e) { 
            http_response_code(400);
            $error = $e -> getMessage();
        }
    }
?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://website71293.nicepage.io/Page-10.html?version=a3d807fa-1ae9-4540-b47b-81e2049aee83 -->
<html style="font-size: 16px;" class="u-responsive-xl">

    <?php require_once "../components/haed.php" ?>

    <body class="u-body" data-new-gr-c-s-check-loaded="14.1048.0" data-gr-ext-installed="">

        <section class="u-align-right u-clearfix u-section-2" id="carousel_0f8b">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div
                    class="u-absolute-hcenter-xs u-expanded-height u-opacity u-opacity-60 u-palette-3-base u-shape u-shape-rectangle u-shape-1">
                </div>
                <h1 class="u-custom-font u-font-playfair-display u-text u-text-1">BreakTime</h1>
                
                <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-1"
                                src="">
                                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                                    <header>
                                        <h2>Login</h2>
                                    </header>
                                    <form method="post">
                                        <div>
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="<?= $email ?? '' ?>">
                                        </div>

                                        <div>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" value="<?= $password ?? '' ?>">
                                        </div>

                                        <div>
                                            <input type="submit" name="login" value="Login">
                                        </div>
                                    </form>
                                    <?=  $error ? "<p>$error</p>" : "" ?>
                                </div>
                            </div>
                            <div class="u-container-style u-image u-layout-cell u-size-20 u-image-1" src="">
                                <div class="u-container-layout u-container-layout-2"></div>
                            </div>
                            <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-3" src="">
                                <div class="u-container-layout u-valign-bottom u-container-layout-3">
                                    <img class="u-expand-resize u-expanded-width u-image u-image-2" src="../images/2.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

</html>