<?php
class UserRepository
{
    private $username = 'John Doe';
    private $email = 'johndoe@gmail.com';

    public function getUser(String $id)
    {
        return [
            'name' => $this->username,
            'email' => $this->email,
        ];
    }

    public function updateUser(array $data)
    {
        $this->username = $data['name'];
        $this->email = $data['email'];
        return [
            'name' => $this->username,
            'email' => $this->email,
        ];
    }
}
