<?php

/**
 * Fetch photos from Unsplash API.
 *
 * @param string $clientId The client Id o use with the API endpoint
 * @return array An array of photos.
 */
function getPhotosFromUnsplashAPI($clientId)
{
    $url = "https://api.unsplash.com/search/photos?query=dogs&client_id=$clientId";

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
}
