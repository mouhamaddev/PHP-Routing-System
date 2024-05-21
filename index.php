<?php
require_once 'utils/db.php';
require_once 'router.php';
require_once 'response.php';

$router = new Router();

require_once 'config/routes.php';

try {
    $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    Response::json(['error' => $e->getMessage()], 500);
}
