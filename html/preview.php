
<?php require "vendor/autoload.php"; ?>
<?php require "include/functions.php"; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invia una cartolina</title>

        <!-- Bootstrap CSS -->
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <h1>POSTCARD SERVICE</h1>

            <h2>Ecco l'anteprima della tua cartolina</h2>

            <form action="sendmail.php" method="post">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">

                            <?php
                            if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>

                                <?php
                                $name = $_POST["name"] ?? "";
                                $recipient = $_POST["recipient"] ?? "";
                                $email = $_POST["email"] ?? "";
                                $topic = $_POST["topic"] ?? "";
                                $message = $_POST["message"] ?? "";

                                $clientId = "tk1_9I6QC-kmi65PGr9EGAuLphOjEBr3AII4x2RI4D8";

                                try {
                                    $photos = getPhotosFromUnsplashAPI($clientId);

                                    $photo = $photos[0]["urls"]["small"];
                                } catch (Exception $e) {
                                    echo $e;
                                    $photo = "noimage.jpg";
                                }

                                ?>

                                <div class="card" style="width: 18rem;">
                                    <img src="<?php echo $photo ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Felice <?php echo $topic ?>, <?php echo $recipient ?></h5>
                                        <p class="card-text"><?php echo $message ?></p>
                                        <p class="card-text">un saluto da</p>
                                        <h4><?php echo $name ?></h4>
                                    </div>

                                    <input type="hidden" name="name" value="<?php echo $name; ?>" />
                                    <input type="hidden" name="recipient" value="<?php echo $recipient; ?>" />
                                    <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                    <input type="hidden" name="topic" value="<?php echo $topic; ?>" />
                                    <input type="hidden" name="message" value="<?php echo $message; ?>" />
                                    <input type="hidden" name="photo" value="<?php echo $photo; ?>" />
                                </div>
                                <?php
                            } else {
                                header("Location: postcard.php");
                            }
                            ?>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mt-5">Invia la cartolina a <?php echo $email ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>
