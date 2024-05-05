<?php
class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function getUser(String $id)
    {
        return $this->userRepository->getUser($id);
    }

    public function updateUser(array $data)
    {
        return $this->userRepository->updateUser($data);
    }
}
