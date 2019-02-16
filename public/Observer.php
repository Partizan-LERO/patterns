<?php
class Job implements SplSubject
{
    private $observers = [];

    public $job;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function addJob(string $title)
    {
        $this->job = $title;
        $this->notify();
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class UserObserver implements SplObserver
{
    private $changedUsers = [];

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update(SplSubject $subject)
    {
        echo "Hi, user {$this->name}! New job has been posted: " . $subject->job . "\n";
        echo "<br>\n";
        $this->changedUsers[] = clone $subject;
    }

    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }
}

    $observer = new UserObserver('Sergey');
    $observer2 = new UserObserver('Ivan');
    $observer3 = new UserObserver('Gregory');

    $job = new Job();
    $job->attach($observer);
    $job->attach($observer2);
    $job->attach($observer3);
    $job->addJob('Middle PHP Developer');

    $job = new Job();
    $job->attach($observer3);
    $job->addJob('Middle Fullstack Developer');