<?php

namespace Task3\Manager;

require_once 'Student_Courses.php';
use Task3\StudentCourse\Course;
use Task3\StudentCourse\Student;



trait Loggable {
    private $logFile = 'log.txt';

    public function log(string $message) {
        file_put_contents($this->logFile, $message . PHP_EOL, FILE_APPEND);
    }
}

 class Manage
{
    use Loggable;

    public $students = [];
    private static int $id = 1;

    public function addStudent($name, $email, ...$courses)
    {
        $coursesArr = [];
        foreach ($courses as $index => $course) {
            $coursesArr[$index] = new Course($index, $course);
        }

        $student = new Student(self::$id, $name, $email, $coursesArr);
        $this->students[self::$id] = $student;
        self::$id++;

        $this->log("Added student: ID = {$student->id}, Name = {$student->name}");

        return $this->students;
    }

    public function getStudentById($id)
    {
        return $this->students[$id] ?? null;
    }

    public function updateStudent($id, $name = null, $email = null, ...$courses)
    {
        $student = &$this->students[$id];

        if ($student != null) {
            if ($name) {
                $this->log("Updated student: ID = {$student->id}, Name = {$student->name} => Name = $name");
                $student->name = $name;
            }

            if ($email) {
                $this->log("Updated student: ID = {$student->id}, Name = {$student->name} => Email = $email");
                $student->email = $email;
            }

            if ($courses) {
                $coursesArr = [];
                foreach ($courses as $index => $course) {
                    $coursesArr[$index] = new Course($index, $course);
                }

                $this->log("Updated student: ID = {$student->id}, Name = {$student->name} => Courses");
                $student->courses = $coursesArr;
            }
        }
    }

    public function deleteStudent($id)
    {
        if (isset($this->students[$id])) {
            $student = $this->students[$id];
            unset($this->students[$id]);

            $this->log("Deleted student: ID = {$student->id}, Name = {$student->name}");
        }
    }
}
?>
