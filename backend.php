<?php

    // Allow cross-origin requests (for Postman or browser testing)
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");

    // Get the raw POST data
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if data was provided
    if (!empty($data['name']) && !empty($data['email'])) {
        $response = [
            "status" => "success",
            "message" => "Data received successfully",
            "data" => [
                "name" => htmlspecialchars($data['name']),
                "email" => htmlspecialchars($data['email'])
            ]
        ];
        http_response_code(200); // OK
    } else {
        $response = [
            "status" => "error",
            "message" => "Missing required fields: name or email"
        ];
        http_response_code(400); // Bad Request
    }

    // Return the JSON response
    echo json_encode($response);

?>
