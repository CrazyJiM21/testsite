<?php

abstract class AbstractModel
{

    protected static $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __toString()
    {
        $keys = array_keys($this->data);
        $string = '';
        foreach($keys as $key) {
            $string .= $key . ' : ' . $this->data[$key] . '<br>';
        }
        return $string;
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPK($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findOneByField($field, $value)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $field . '=:value';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':value' => $value])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $ins = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        $sql = '
            INSERT INTO ' . static::$table . '
             (' . implode(', ', $cols) . ')
             VALUES
             (' . implode(', ', array_keys($data)) . ')
        ';

        $db = new DB();
        $db->execute($sql, $data);
    }

    public function update()
    {
        $cols = array_keys($this->data);
        foreach ($cols as $col) {
            $upd[] = $col . '=:' . $col;
            $data[':' . $col] = $this->data[$col];
        }
        $sql = '
            UPDATE ' . static::$table . '
             SET
             ' . implode(', ', $upd) . '
             WHERE
             id=' . $this->data['id'] . '
        ';
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $sql = '
            DELETE FROM ' . static::$table . '
             WHERE
             id=' . $this->data['id'] . '
        ';
        $db = new DB();
        $db->execute($sql);
    }
}