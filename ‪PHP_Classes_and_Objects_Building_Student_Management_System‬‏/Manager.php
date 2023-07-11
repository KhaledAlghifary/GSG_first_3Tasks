<?php
require_once 'Student_Courses.php';
class Manage{
    public $Students=array();
    public static int $id = 1;

    public function addStudent($name,$email,...$courses){
        $coursesArr =array();

        for($i=0;$i<count($courses);$i++){
            $coursesArr[$i]=new Course($i,$courses[$i]);

        }

       
        $this->Students[Manage::$id]=new Student(Manage::$id,$name,$email,$coursesArr);
        Manage::$id++;

        return $this->Students;


    }

    public function getStudentById($id){
        return  $this->Students[$id];
        
    }

    public function updateStudent($id,$name=null,$email=null,...$courses){
        $var=& $this->Students[$id];
        if($var != null){
        if($name)
        $var->name=$name;
        if($email)
        $var->email=$email;

        if($courses){
            $coursesArr =array();

            for($i=0;$i<count($courses);$i++){
                $coursesArr[$i]=new Course($i,$courses[$i]);
    
            }

            $var->courses=$coursesArr;
        }
       
        }
        


        
    }

    public function deleteStudent($id){
        if($this->Students[$id])
        unset($this->Students[$id]);
    }
}


