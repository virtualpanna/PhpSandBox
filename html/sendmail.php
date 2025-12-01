<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $recipient = $_POST["recipient"];
    $email = $_POST["email"];
    $topic = $_POST["topic"];
    $message = $_POST["message"];
}
