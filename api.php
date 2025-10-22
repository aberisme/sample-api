<?php

    header("Content-Type: application/json");

    /*
        GET: Retrieve a resource.
        POST: Create a new resource.
        PUT: Update an existing resource (replaces the entire resource).
        DELETE: Remove a resource.
    */

    $response = [];
    $data['name'] = "https://www.youtube.com/@aberisme";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $response = [
             "status" => "success",
             "message" => "You issued a GET request, sample name data is given",
             "data" => [
                "name" => htmlspecialchars($data['name'])
             ]
        ];
        http_response_code(200); // OK

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data['name'])) {
            $response = [
                 "status" => "error",
                 "message" => "You must issue the POST request without name data",
            ];
            http_response_code(400); // Bad request
        } else {
            $response = [
                 "status" => "success",
                 "message" => "You issued a POST request with the given name data",
                 "data" => [
                    "name" => htmlspecialchars($data['name'])
                 ]
            ];
            http_response_code(200); // OK
        }

    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data['name'])) {
            $response = [
                 "status" => "error",
                 "message" => "You must issue the PUT request without name data",
            ];
            http_response_code(400); // Bad request
        } else {
            $response = [
                 "status" => "success",
                 "message" => "You issued a PUT request with the given name data",
                 "data" => [
                    "name" => htmlspecialchars($data['name'])
                 ]
            ];
            http_response_code(200); // OK
        }

    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $data = json_decode(file_get_contents("php://input"), true);

        if(empty($data['name'])) {
            $response = [
                 "status" => "error",
                 "message" => "You must issue the DELETE request without name data",
            ];
            http_response_code(400); // Bad request
        } else {
            $response = [
                 "status" => "success",
                 "message" => "You issued a DELETE request on the given name data",
                 "data" => [
                    "name" => htmlspecialchars($data['name'])
                 ]
            ];
            http_response_code(200); // OK
        }

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
