<?php
    include 'head.php';
    include 'header.php';
    include_once 'db_connection.php';
    include 'functions.php';
?>

<main>
    <?php
        if (isset($_GET["add"])){
            echo '<div style="border: 1px solid black; padding: 10px; width: fit-content; margin: 0 auto;">';
            echo '<h2>Fill the information for the new course below.</h2>';
            echo 
            '<form action="handler.php" method="POST">
                 <label>Course Name:</label>
                 <input type="text" name="course_name" placeholder="Course Name" required><br>
                 <label>Course ID:</label>
                 <input type="text" name="course_id" placeholder="Course ID" required><br>
                 <label>Course Level:</label><br>';
                 for ($t = 1; $t <= 8; $t++){
                    echo '
                    <label for="course_level">'.$t.'</label>
                    <input type="radio" name="course_level" value="'.$t.'">
                    ';
                    if ($t == 4){
                        echo '<br>';
                    }
                }
            echo '
                 <br><button type="submit" name="addCourse">Add</button>
            </form>';
            echo '</div>';
        }

        if (isset($_GET["edit"])){
            $id = $_GET["edit"];
            $sql = "SELECT * FROM courses WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $row = $result->fetch_assoc();
            echo '<div style="border: 1px solid black; padding: 10px; width: fit-content; margin: 0 auto;">';
            echo '<h2>Fill the information for editing course below.</h2>';
            echo 
            '<form action="handler.php" method="POST">
                 <label>Course Name:</label>
                 <input type="text" name="course_name" value="'.$row['course_name'].'" required><br>
                 <label>Course ID:</label>
                 <input type="text" name="course_id" value="'.$row['course_id'].'" required><br>
                 <label>Course Level:</label>';
                 for ($t = 1; $t <= 8; $t++){
                    if ($row['course_level'] == $t){
                        echo '
                        <label for="course_level">'.$t.'</label>
                        <input type="radio" name="course_level" value="'.$t.'" checked>
                        ';
                    }
                    else {
                        echo '
                        <label for="course_level">'.$t.'</label>
                        <input type="radio" name="course_level" value="'.$t.'">
                        ';
                    }
                    if ($t == 4){
                        echo '<br>';
                    }
                }
            echo'
                 <br><input type="hidden" name="id" value="'.$id.'">
                 <button type="submit" name="editCourse">Edit</button>
            </form>';
            echo '</div>';
        }

        else if(isset($_GET["added"])){
            echo '<h2>Course successfully added!</h2>';
        }

        else if(isset($_GET["edited"])){
            echo '<h2>Course successfully edited!</h2>';
        }

        else if(isset($_GET["deleted"])){
            echo '<h2>Course successfully deleted!</h2>';
        }
    ?>

    <a href="courses.php?add"><button style="margin: 10px 0px; width: fit-content;">Add New Course</button></a>
    <table>
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Course ID</th>
        <th>Level</th>
    </tr>
    <?php
        $sql = "SELECT * FROM courses";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row = $result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td>'.$row['course_id'].'</td>';
                echo '<td>'.$row['course_level'].'</td>';
                echo '<td><a href="courses.php?edit='.$row['id'].'"><button>Edit</button></a></td>';
                echo '<td><a href="handler.php?deleteCourse='.$row['id'].'"><button>Delete</button></a></td>';
                echo '</tr>';
            }
        }
    ?>
    </table>
</main>

<?php
    include 'footer.php';
?>