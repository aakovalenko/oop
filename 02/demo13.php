<?php

namespace lesson02\example\demo13;

// XML repository

class Student
{
    public $lastName;
    public $firstName;
    public $birthDate;

    public function __construct($lastName, $firstName, $birthDate) {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthDate = $birthDate;
    }

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }
}

abstract class StudentRepository
{
    abstract public function findAll();
}

class TXTStudentRepository extends StudentRepository
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function findAll() {
        $rows = file($this->file);
        $students = [];
        foreach ($rows as $row) {
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values[0], $values[1], $values[2]);
        }
        return $students;
    }
}

class XMLStudentRepository extends StudentRepository
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function findAll() {
        $rows = simplexml_load_file($this->file);
        $students = [];
        foreach ($rows->student as $row) {
            $students[] = new Student($row->lastName, $row->firstName, $row->birthDate);
        }
        return $students;
    }
}

// ============================================

if ($type = 'txt') {
    $studentRepository = new TXTStudentRepository(__DIR__ . '/list.txt');
} else {
    $studentRepository = new XMLStudentRepository(__DIR__ . '/list.xml');
}

// --------------------------------------------

/** @var StudentRepository $studentRepository */

$students = $studentRepository->findAll();

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

// ============================================