<?php

class DB {

    public function __construct()
    {
        mysql_connect('localhost', 'root', '') or die(mysql_error());
        mysql_select_db('testsite') or die(mysql_error());
        mysql_query('SET NAMES utf8') or die(mysql_error());
    }

    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysql_query($sql);
        if (false === $res) {
            return false;
        }
        $arr = [];
        while (false !== $row = mysql_fetch_object($res, $class)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }


} 