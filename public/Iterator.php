<?php
class User
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
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
}


class UserIterator implements Countable, Iterator
{
    protected $users = [];
    private $index = 0;

    public function addUser(User $user)
    {
        $this->users[] = $user;
    }

    public function removeUser(User $user)
    {
        foreach ($this->users as $k => $u) {
            if ($u->getName() === $user->getName() && $u->getEmail() === $user->getEmail()) {
                unset($this->users[$k]);
            }
        }
    }

    public function count()
    {
        return count($this->users);
    }

    public function current()
    {
        return $this->users[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return (isset($this->users[$this->index]));
    }


    public function rewind()
    {
        $this->index = 0;
    }
}

$iterator = new UserIterator();
$iterator->addUser(new User('Sergey', 'sergey@gmail.com'));
$iterator->addUser(new User('Ivan', 'ivan@gmail.com'));
$user =  new User('Gregory', 'gregory@gmail.com');
$iterator->addUser($user);

echo 'Count :' . $iterator->count();
echo "<br>";

foreach($iterator as $user) {
    echo $user->getName() . ' ' . $user->getEmail;
    echo "<br>";
}


$iterator->removeUser($user);
echo 'Count :' . $iterator->count();