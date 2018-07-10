<?php
class User
{
    public $name;
    public $email;

    public function __construct($username, $email)
    {
        $this->name = $username;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public static function fromState($row) :User
    {
        return new self($row['name'], $row['email']);
    }
}


class UserMapper
{
    public $adapter;

    public function __construct(StorageAdapter $adapter)
    {
        return $this->adapter = $adapter;
    }

    public function findById($id) :User
    {
        $result = $this->adapter->find($id);

        if($result === null) {
            throw new \InvalidArgumentException("User #$id not found");
        }

        return $this->mapToRow($result);
    }

    private function mapToRow(array $row) :User
    {
        return User::fromState($row);
    }
}

class StorageAdapter
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function find($id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}


$storage = new StorageAdapter([
    1 => ['name' => 'dominik','email' => 'dominik@gmail.com'],
    2 => ['name' => 'sergey','email' => 'sergey@gmail.com'],
]);

$mapper = new UserMapper($storage);

$user = $mapper->findById(1);

echo $user->name;
echo "<br>";
echo $user->email;

echo "<br>";

$user = $mapper->findById(2);

echo $user->name;
echo "<br>";
echo $user->email;

echo "<br>";

$user = $mapper->findById(3);

echo $user->name;
echo "<br>";
echo $user->email;