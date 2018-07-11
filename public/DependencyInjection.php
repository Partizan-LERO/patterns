<?php
class UserRepository
{
    public static function findAll()
    {
        return 'I will find you all!';
    }
}

class UserController
{
    public $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository::findAll();
    }
}


$user = new UserController(new UserRepository());
echo $user->index();