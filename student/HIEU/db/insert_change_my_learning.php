<?php
require ('db_helper.php');
require ('db_connect.php');


    if (isset($_POST['form_submit'])) {
        $rating_value = $_POST['rating_value'];
        $course_id = $_POST['course_id'];
        $content = $_POST['content'];
        $user_id = $_POST['user_id'];
        echo ($user_id);
        $sql = "SELECT * FROM course_rate WHERE user_id = '". $user_id ."' AND course_id = '" . $course_id . "'";
        $sql_result = executeResult($sql, $onlyOne = true);

        if ($sql_result != []) {
            $sql = "UPDATE course_rate SET content = '" . $content . "', rate= '" . $rating_value . "' WHERE user_id = '" . $user_id . "' AND course_id = '" . $course_id . "'";
            if ($conn->query($sql)===true) {
                header('Location: http://localhost:3000/HUMG_A1_EXAM/coures4u/student/HIEU/my_learning.php');

            }

        } else {
            $sql = "INSERT INTO course_rate(course_id, content, rate, user_id) VALUES ('" . $course_id . "','" . $content . "','" . $rating_value . "','" . $user_id . "')";
        if ($conn->query($sql)===true) {
                header('Location: http://localhost:3000/HUMG_A1_EXAM/coures4u/student/HIEU/my_learning.php');
            }
        }
    }
    elseif (isset($_POST['delete'])) {
        $course_id = $_POST['course_id'];
        $user_id = $_POST['user_id'];
        $sql = "DELETE FROM course_rate WHERE user_id = '" . $user_id . "' AND course_id = '" . $course_id . "'";
        $result = $conn->query($sql);
        if ($conn->query($sql)===true) {
            header('Location: http://localhost:3000/HUMG_A1_EXAM/coures4u/student/HIEU/my_learning.php');
        }
    }
?>