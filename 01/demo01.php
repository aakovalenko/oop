<?php

namespace lesson02\demo01;

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;

    public static $val = 0;

    private $lastName;
    private $firstName;
    private $type = self::TYPE_OCHN;

    private $attributes = [];

    public static function createOchn($lastName,$firstName)
    {
        return new self($lastName, $firstName, self::TYPE_OCHN);
    }


    public static function createZaOchn($lastName, $firstName)
    {
        return new self($lastName, $firstName, self::TYPE_ZAOCHN);
    }

    public static function typesList()
    {
        return [
            self::TYPE_OCHN => 'Очный',
            self::TYPE_ZAOCHN => 'Заочный',
        ];
    }

    public function __construct($lastName, $firstName, $type = null)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->type = $type ? $type : self::TYPE_OCHN;
    }

    public function __call($name, $args)
    {
        echo 'Call ' . $name . PHP_EOL;
        print_r($args);
    }

    public function __invoke()
    {
        echo 'Invoke' . PHP_EOL;
    }

    public function __get($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

    public function __unset($name)
    {
        unset($this->attributes[$name]);
    }

    public function __toString()
    {
        return $this->getFullName();
    }

    public function rename($lastName, $firstName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }
    //--------------------------------------------------------
    public function rename(string $lastname)
    {
        $this->lastName = $lastname;                         //если число то вызов где int, строка вызов где string
    }

    public function rename(int $lastname)
    {
        $this->lastName = $lastname;
    }
//--------------------------------------------------------

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

// ==============================

$student = new Student('Sidorov', 'Petya', Student::TYPE_ZAOCHN);

$student1 = Student::createOchn('Sidorov', 'Petya');
$student2 = Student::createZaOchn('Sidorov', 'Petya');
echo Student::TYPE_OCHN . PHP_EOL;
Student::$val = 10;

echo $student->getFullName() . PHP_EOL;

// ===============================