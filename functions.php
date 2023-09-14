<?php
    function addCourse($conn, $course_name, $course_id, $course_level){
        $sql = "INSERT INTO courses (course_name, course_id, course_level) VALUES ('$course_name', '$course_id', '$course_level') ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: courses.php?added');
        exit();
    }

    function editCourse($conn, $id, $course_name, $course_id, $course_level){
        $sql = "UPDATE courses SET course_name = '$course_name', course_id = '$course_id', course_level = '$course_level' WHERE id = $id";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: courses.php?edited');
        exit();
    }

    function deleteCourse($conn, $id){
        $sql = "DELETE FROM courses WHERE id = $id";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: courses.php?deleted');
        exit();
    }
?>