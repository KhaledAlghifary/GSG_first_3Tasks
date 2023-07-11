<?php

namespace Task3\StudentCourse;

class Student
{
    public $name;
    public $email;
    public $courses;
    public readonly int $id;
    
    public function __construct(int $id, $name, $email, $courses)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->courses = $courses;
    }
}

class Course
{
    public $name;
    public readonly int $id;
    
    public function __construct(int $id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
?>
