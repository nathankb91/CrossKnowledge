<?php

require_once "request.php";

try {
    $req = new SimpleJsonRequest();

    $res = $req->get('https://baconipsum.com/api', ['type' => 'meat-and-filler'], 'meat-and-filler', 5);

    header('Content-type: application/json');
    exit(json_encode([
        'data' => $res
    ]));

} catch (\Throwable $e) {
    http_response_code($e->getCode());

    exit(json_encode([
        'message' => $e->getMessage()
    ]));
}