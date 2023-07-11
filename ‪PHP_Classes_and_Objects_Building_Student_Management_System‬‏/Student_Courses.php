<?php
class Student
{
    public $name;
    public $email;
    public $courses;
  
    
    public function __construct(public readonly int $id,$name,$email,$courses){
        $this->name=$name;
        $this->email=$email;
        $this->courses=$courses;

    }
    function __destruct() {
      }
}

class Course{
    public $name;
    public function __construct(public readonly int $id,$name){
        $this->name=$name;

    }
    function __destruct() {
      }
}




?>