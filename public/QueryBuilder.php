<?php
interface QueryBuilder
{
    public function select($columns);
    public function from($table);
    public function where($where);
    public function limit($limit);
    public function groupBy(array $fields);
    public function find();
    public function findAll($table);
}


class MySqlQueryBuilder implements QueryBuilder
{
    public $query;
    public $sql;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select($columns = ["*"])
    {
        $this->reset();
        $this->sql = "SELECT  " . implode(', ', $columns) . ' ';
        return $this;
    }

    public function from($table)
    {
        $this->sql .= 'FROM ' . $table;
        return $this;
    }

    public function where($where)
    {
        $this->sql .= $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->sql .= ' LIMIT ' . $limit;
        return $this;
    }

    public function groupBy(array $fields)
    {
        $this->sql .= ' GROUP BY ' . implode(', ', $fields);
        return $this;
    }


    public function find()
    {
        echo $this->sql;
        return $this->query;
    }

    public function findAll($table)
    {
        echo "SELECT * FROM {$table}";
        return $this->query;
    }
}

class PostgresSqlQueryBuilder implements QueryBuilder
{
    public $query;
    public $sql;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select($columns = ['*'])
    {
        $this->reset();
        $this->sql = "SELECT " . implode(', ', $columns) . ' ';
        return $this;
    }

    public function from($table)
    {
        $this->sql .= 'FROM ' . $table;
        return $this;
    }

    public function where($where)
    {
        $this->sql .= ' WHERE ' . $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->sql .= " LIMIT {$limit} OFFSET 0";
        return $this;
    }

    public function groupBy(array $fields)
    {
        $this->sql .= ' GROUP BY ' . implode(', ', $fields);
        return $this;
    }

    public function find()
    {
        echo $this->sql;
        return $this->query;
    }

    public function findAll($table)
    {
        echo "SELECT * FROM {$table}";
        return $this->query;
    }
}


$qb = (new PostgresSqlQueryBuilder())
    ->select(['id', 'user_id', 'name'])
    ->from('posts')
    ->where('is_active = true')
    ->groupBy(['user_id'])
    ->limit(1)
    ->find();

echo "<br>";


$qb2 = (new MySqlQueryBuilder())
    ->select(['id', 'title', 'user_id'])
    ->from('posts')
    ->limit(5)
    ->groupBy(['user_id'])
    ->find();

echo "<br>";


$sql = (new PostgresSqlQueryBuilder())->findAll('users');
echo "<br>";


$sql = (new MySqlQueryBuilder())->findAll('notes');
echo "<br>";