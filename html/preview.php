
<?php function getPhotosFromUnsplashAPI($url)
{
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        throw new Exception("cURL Error: " . curl_error($ch));
    }

    // Close cURL session
    curl_close($ch);

    // Decode and return the response
    return json_decode($response, true)["results"];
} ?>

<html>
    <head></head>

    <body>
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>
        <form action="sendmail.php" method="post">
            <?php
            $name = $_POST["name"];
            $recipient = $_POST["recipient"];
            $email = $_POST["email"];
            $topic = $_POST["topic"];
            $message = $_POST["message"];

            // Process the form data here
            echo "Name: $name<br>";
            echo "Recipient: $recipient<br>";
            echo "Email: $email<br>";
            echo "Topic: $topic<br>";
            echo "Message: $message<br>";

            // Example usage
            $url =
                "https://api.unsplash.com/search/photos?query=dogs&client_id=tk1_9I6QC-kmi65PGr9EGAuLphOjEBr3AII4x2RI4D8"; // Replace with specific endpoint if needed

            try {
                $photos = getPhotosFromUnsplashAPI($url);
                // print_r($photos); // Handle the photos as needed
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>


            <?php echo $photos[0]["urls"]["small"]; ?>
            <img src="<?php echo $photos[0]["urls"]["small"]; ?>">

            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="recipient" value="<?php echo $recipient; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="topic" value="<?php echo $topic; ?>">
            <input type="hidden" name="message" value="<?php echo $message; ?>">

            <input type="submit" value="Invia">
        </form>
    <?php } else {header("Location: postcard.php");} ?>

</body>

</html>
