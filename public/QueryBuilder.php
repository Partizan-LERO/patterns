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
    public $fields;
    public $from;
    public $where;
    public $limit;
    public $groupByFields;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select($columns = ["*"])
    {
        $this->reset();
        $this->fields = $columns;
        return $this;
    }

    public function from($table)
    {
        $this->from = $table;
        return $this;
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function groupBy(array $fields)
    {
        $this->groupByFields = $fields;
        return $this;
    }

    public function find()
    {
        $this->query = sprintf(
            'SELECT %s FROM %s',
            join(', ', $this->fields),
            $this->from
        );

        if ($this->where) {
         $this->query .= ' WHERE '. $this->where;
        }

        if ($this->groupByFields) {
            $this->query .= ' GROUP BY (' . join(', ', $this->groupByFields) . ')';
        }

        if ($this->limit) {
            $this->query .= ' LIMIT '. $this->limit;
        }

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
    public $fields;
    public $from;
    public $where;
    public $limit;
    public $groupByFields;
    public $offset = 0;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select($columns = ["*"])
    {
        $this->reset();
        $this->fields = $columns;
        return $this;
    }

    public function from($table)
    {
        $this->from = $table;
        return $this;
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function groupBy(array $fields)
    {
        $this->groupByFields = $fields;
        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function find()
    {
        $this->query = sprintf(
            'SELECT %s FROM %s',
            join(', ', $this->fields),
            $this->from
        );

        if ($this->where) {
            $this->query .= ' WHERE '. $this->where;
        }

        if ($this->groupByFields) {
            $this->query .= ' GROUP BY (' . join(', ', $this->groupByFields) . ')';
        }

        if ($this->limit) {
            $this->query .= ' LIMIT '. $this->limit . ' OFFSET ' . $this->offset;
        }

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

echo $qb;
echo "<br>";


$qb2 = (new MySqlQueryBuilder())
    ->select(['id', 'title', 'user_id'])
    ->from('posts')
    ->limit(5)
    ->groupBy(['user_id'])
    ->find();

echo $qb2;
echo "<br>";


$sql = (new PostgresSqlQueryBuilder())->findAll('users');
echo "<br>";


$sql = (new MySqlQueryBuilder())->findAll('notes');
echo "<br>";