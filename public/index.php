<?php

use function PHPSTORM_META\type;

require "../src/controllers/user_controller.php";
require "../src/service/user_service.php";
require "../src/repository/user_repository.php";

$userRepository = new UserRepository();
$userService = new UserService($userRepository);
$userController = new UserController($userService);

require '../src/router/router.php';

$router = new Router();

$router->get('/user', function () {
    global $userController;
    echo json_encode($userController->getUser("3"));
});

$router->post('/user', function () {
    global $userController;
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid or empty JSON data']);
        return;
    }
    echo json_encode($userController->updateUser($data));
});



$router->resolve();
