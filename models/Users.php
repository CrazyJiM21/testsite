<?php

class Users extends AbstractModel {

    public $id;
    public $nickname;
    public $password;
    public $about;

    protected static $table = 'users';
    protected static $class = 'Users';

} 