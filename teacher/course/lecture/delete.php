<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";
require abs_path('db/db_helper.php');
require abs_path('helpers/upload_file.php');
require abs_path('helpers/delete_file.php');
?>

<?php
$current_chapter_id = $_GET['chapter_id'];
$current_course_id = $_GET['course_id'];
$current_lecture_id = $_GET['lecture_id'];
?>

<?php
// Delete lecture video
$sql = "SELECT lecture_video FROM lecture
WHERE lecture_id = $current_lecture_id";
$video_name = executeResult($sql, $onlyOne=True)['lecture_video'];
$video_path = 'video/lecture/' . $video_name;
delete_file($video_path);



$sql = "DELETE FROM lecture WHERE lecture_id = $current_lecture_id";
excute($sql);
header("Location: ./view.php?course_id=$current_course_id&chapter_id=$current_chapter_id");
?>
