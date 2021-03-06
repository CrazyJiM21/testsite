<?php

class myIterator implements Iterator {

    private $position = 0;
    private $array = 'Tra-ta-ta';

    function rewind() {
        var_dump(__METHOD__);
        $this->position = 0;
    }

    function current() {
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    function key() {
        var_dump(__METHOD__);
        return $this->position;
    }

    function next() {
        var_dump(__METHOD__);
        ++$this->position;
    }

    function valid() {
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }
}

$new = new myIterator();
foreach($new as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}