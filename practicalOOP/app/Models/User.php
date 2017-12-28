<?php

namespace Todo\Models;

interface AuthenticatableInterface
{
    public function getPassword();
    public function setPassword($password);
}

trait Authenticatable
{
    public function getPassword()
    {
        //
    }


    public function setPassword($password)
    {
        //
    }

    public function sayHelloWorld()
    {
        return 'Hello world';
    }
}



class User implements AuthenticatableInterface
{
    use Authenticatable;

    public static $username = 'Jhon';

    public function ouput()
    {
        return $this->sayHelloWorld();
    }

}

class Admin implements AuthenticatableInterface
{
    use Authenticatable;
}