<?php
require ('db_helper.php');
require ('db_connect.php');

    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $sql = "UPDATE course_rate SET content = '$comment' WHERE user_id = '$user_id' AND course_id = '$course_id'";
if ($conn->query($sql)===true) {
    header('location: http://localhost:3000/coures4u/hien_thi_rate.php');
} $comment = $_POST['comment'];

?>