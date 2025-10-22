<?php

    header("Content-Type: application/json");

    /*
        GET: Retrieve a resource.
        POST: Create a new resource.
        PUT: Update an existing resource (replaces the entire resource).
        DELETE: Remove a resource.
    */

    $response = [];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $response = [
             "status" => "success",
             "message" => "You issued a GET request",
        ];
        http_response_code(200); // OK

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        $response = [
             "status" => "success",
             "message" => "You issued a POST request",
             "data" => [
                "name" => htmlspecialchars($data['name'])
             ]
        ];
        http_response_code(200); // OK

    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);

        $response = [
             "status" => "success",
             "message" => "You issued a PUT request",
             "data" => [
                "name" => htmlspecialchars($data['name'])
             ]
        ];
        http_response_code(200); // OK

    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $data = json_decode(file_get_contents("php://input"), true);

        $response = [
             "status" => "success",
             "message" => "You issued a DELETE request",
             "data" => [
                "name" => htmlspecialchars($data['name'])
             ]
        ];
        http_response_code(200); // OK

    } else {
        $response = [
             "status" => "error",
             "message" => "Unrecognized request"
        ];
        http_response_code(400); // Bad request
    }

    // Return the JSON response
    echo json_encode($response);

?>
