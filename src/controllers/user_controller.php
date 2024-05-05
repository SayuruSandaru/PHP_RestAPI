<?php
class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function getUser(String $id)
    {
        return $this->userService->getUser($id);
    }

    public function updateUser($data)
    {
        if ($data == null || !array_key_exists('name', $data) || !array_key_exists('email', $data)) {
            return ['status' => 'error', 'message' => 'Invalid data, Please provide name and email'];
        }
        return $this->userService->updateUser($data);
    }
}
