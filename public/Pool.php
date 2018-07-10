<?php
class Pool implements \Countable
{
    private $busyWorkers = [];
    private $freeWorkers = [];

    public function get()
    {
        if (count($this->freeWorkers) == 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($worker)] = $worker;

        return $worker;
    }

    public function dispose(Worker $worker) {
        $key = spl_object_hash($worker);

        if (isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count()
    {
        return count($this->busyWorkers) + count($this->freeWorkers);
    }
}

class Worker
{
    public $createdAt;

   public function __construct()
   {
       $this->createdAt = new \DateTime();
   }

   public function run($text)
   {
       return strrev($text);
   }
}

$pool = new Pool();
$worker1 = $pool->get();
$count = $pool->count();
var_dump($count);
var_dump($worker1);

$worker2 = $pool->get();
$count = $pool->count();
var_dump($count);
var_dump($worker2);

$pool->dispose($worker2);
$count = $pool->count();
var_dump($count);
var_dump($worker2);

$worker3 = $pool->get();
var_dump($worker3);
$count = $pool->count();
var_dump($count);
