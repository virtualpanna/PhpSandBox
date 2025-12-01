<?php

require 'vendor/autoload.php'; // Load PHPMailer

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

            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = $_POST["name"] ?? "";
                $recipient = $_POST["recipient"] ?? "";
                $email = $_POST["email"] ?? "";
                $topic = $_POST["topic"] ?? "";
                $message = $_POST["message"] ?? "";
                $photo = $_POST["photo"] ?? "";

                $mail = new PHPMailer(true);

                try {
                    $mail->isSendmail(); // Set mailer to use sendmail

                    // Recipients
                    $mail->setFrom('postcard@postcard.com', 'Sender Name');
                    $mail->addAddress($email, $recipient);

                    // Attach image from URL
                    $tempImage = tempnam(sys_get_temp_dir(), 'image');
                    file_put_contents($tempImage, file_get_contents($photo));

                    $mail->addAttachment($tempImage);

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the body content of the email.';

                    $mail->send();
                    ?>
                    <div class="text-bg-success p-3">Cartolina inviata con successo</div>
                    <?php
                } catch (Exception $e) {
                    ?>
                    <div class="text-bg-danger p-3">Impossibile inviare la cartolina</div>
                    <?php

                    echo "Mailer Error: {$mail->ErrorInfo}";
                }

            } else {
                header("Location: postcard.php");
            }

            ?>

            <a href="postcard.php" type="btn" class="btn btn-primary">Invia un nuova cartolina</a>

        </div>

    </body>
</html>
