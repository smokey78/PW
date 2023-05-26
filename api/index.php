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
        default:
            dieWithError("Unknown api call $api", 400);
    }
} catch (Exception  $ex) {
    dieWithError($ex->getMessage() . "\n" . $ex->getTraceAsString());
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

