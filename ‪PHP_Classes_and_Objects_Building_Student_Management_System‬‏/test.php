<?php

use Task3\Manager\Manage;
require_once 'Manager.php';

$manager = new Manage();

$manager->addStudent('Khaled', 'email.com', 'Science', 'Math');
$manager->addStudent('Ahmed', 'email.com', 'Biology', 'History');
$manager->updateStudent(1, null, null, 'Math', 'History');
$manager->deleteStudent(2);

$studentArray = $manager->students;

?>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Students</h2>

<table>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Courses</th>
    </tr>
    <?php foreach ($studentArray as $student) { ?>
        <tr>
            <td><?= $student->id ?></td>
            <td><?= $student->name ?></td>
            <td><?= $student->email ?></td>
            <td><?php foreach ($student->courses as $course) {
                    echo $course->name . ', ';
                } ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>
