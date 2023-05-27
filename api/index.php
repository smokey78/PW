<?php
/**
 * Entry point for all API calls
 */
require_once('../config.php');
include_once "../lib/common.php";

try {
    $api = get_api_call();

    switch ($api) {
        case '/products':
            get_all_products();
            break;
        case '/login':
            user_login();
            break;
        default:
            die_with_error("Unknown api call $api", 400);
    }
} catch (Exception  $ex) {
    die_with_error($ex->getMessage() . "\n" . $ex->getTraceAsString());
}

die(); // stop here

/**
 * @OA\Get(
 *   tags={"products"},
 *   path="/products",
 *   summary="List all products in the database",
 *   @OA\Response(response=200, description="OK"),
 *   @OA\Response(response=5005, description="Internal error")
 * )
 */
function get_all_products() {
    global $db;
    
    $response = [];
    
    $result = query("select * from products");
    while ($row = mysqli_fetch_object($result)) {
        $response[] = $row;    
    }
    
    echo json_encode ($response); 
}

/**
 * @OA\Get(
 *   tags={"User login"},
 *   path="/login",
 *   summary="Use login",
 *   method="POST",
 *   @OA\Parameter(ref="username"),
 *   @QA\Parameter(ref="password"),
 *   @OA\Response(response=200, description="OK"),
 *   @OA\Response(response=401, description="Unauthorized - invalid credentials"),
 *   @OA\Response(response=405, description="Method not allowed - only POST calls are allowed")
 * )
 */
function user_login() {
    if (!is_post_call()) {
        die_with_error("Expected a post call", 405);
    }
    
    $payload = get_post_payload();
    $username = $payload->username;
    $password = $payload->password;
    
    deny("User $username not found");
    
    // TODO check db and stuff
    echo '{ "result" : true, "message" : "Login succesfull" }';
    die;
}