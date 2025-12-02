<?php

require "vendor/autoload.php"; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

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

            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = $_POST["name"] ?? "";
                $recipient = $_POST["recipient"] ?? "";
                $email = $_POST["email"] ?? "";
                $topic = $_POST["topic"] ?? "";
                $message = $_POST["message"] ?? "";
                $photo = $_POST["photo"] ?? "";

                $phpmailer = new PHPMailer(true);

                try {
                    $phpmailer->isSMTP();
                    $phpmailer->Host = "sandbox.smtp.mailtrap.io";
                    $phpmailer->SMTPAuth = true;
                    $phpmailer->Port = 2525;
                    $phpmailer->Username = "40d888e03bfadc";
                    $phpmailer->Password = "83656ae6c68a0a";

                    // Recipients
                    $phpmailer->setFrom("postcard@postcard.com", $name);
                    $phpmailer->addAddress($email, $recipient);

                    // Attach image from URL
                    $tempImage = tempnam(sys_get_temp_dir(), "image") . ".jpg";
                    file_put_contents($tempImage, file_get_contents($photo));

                    $phpmailer->addAttachment($tempImage);

                    // Content
                    $phpmailer->isHTML(true);
                    $phpmailer->Subject = "Felice $topic,  $recipient!";
                    $phpmailer->Body = "$message <br /><br /> Un saluto, $name";

                    $phpmailer->send();?>
                    <h2 class="text-bg-success p-3">Cartolina inviata con successo</h2>
                    <?php
                } catch (Exception $e) {
                    ?>
                    <div class="text-bg-danger p-3">Impossibile inviare la cartolina</div>
                    <?php echo "Mailer Error: {$phpmailer->ErrorInfo}";
                }
            } else {
                header("Location: index.php");
            } ?>

            <a href="index.php" type="btn" class="btn btn-primary">Invia un nuova cartolina</a>

        </div>

    </body>
</html>
