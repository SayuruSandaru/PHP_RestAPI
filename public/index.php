<?php

require "../src/controllers/user_controller.php";
require "../src/service/user_service.php";
require "../src/repository/user_repository.php";
require_once "../src/utility/response.php";
require '../src/router/router.php';


use App\Utility\ResponseUtility;

$userRepository = new UserRepository();
$userService = new UserService($userRepository);
$userController = new UserController($userService);


$router = new Router();
$router->get('/user', function () {
    global $userController;
    ResponseUtility::sendJsonResponse($userController->getUser($_GET['id']), true);
});

$router->post('/user', function () {
    global $userController;
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data === null) {
        ResponseUtility::sendJsonResponse(['status' => 'error', 'message' => 'Invalid data, Please provide name and email'], 400, true);
        return;
    }
    ResponseUtility::sendJsonResponse($userController->updateUser($data), true);
});



$router->resolve();
