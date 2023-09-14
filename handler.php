<?php
    require_once 'db_connection.php';
    require_once 'functions.php';
    
    if (isset($_POST["addCourse"])){
        $course_name = mysqli_real_escape_string($conn, $_POST["course_name"]);
        $course_id = mysqli_real_escape_string($conn, $_POST["course_id"]);
        $course_level = mysqli_real_escape_string($conn, $_POST["course_level"]);

        addCourse($conn, $course_name, $course_id, $course_level);
    }

    if (isset($_POST["editCourse"])){
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $course_name = mysqli_real_escape_string($conn, $_POST["course_name"]);
        $course_id = mysqli_real_escape_string($conn, $_POST["course_id"]);
        $course_level = mysqli_real_escape_string($conn, $_POST["course_level"]);

        editCourse($conn, $id, $course_name, $course_id, $course_level);
    }

    if (isset($_GET["deleteCourse"])){
        $id = $_GET["deleteCourse"];
        deleteCourse($conn, $id);
    }
?>