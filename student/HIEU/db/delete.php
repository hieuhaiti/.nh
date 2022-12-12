<?php
require ('db_helper.php');
require ('db_connect.php');

if (isset($_POST["xoa"])) {
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $sql = "DELETE FROM course_rate WHERE user_id = '$user_id' AND course_id = '$course_id'";
    excute($sql);
    header('location: http://localhost:3000/coures4u/hien_thi_rate.php');

}