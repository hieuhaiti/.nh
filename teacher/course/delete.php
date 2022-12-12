<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";

require abs_path('db/db_helper.php');
require abs_path('helpers/delete_file.php');
?>


<?php
$current_course_id = $_GET["course_id"];

// Delete img file of this course
$sql = "SELECT course_img, lecture_video FROM course, chapter, lecture
WHERE course.course_id = $current_course_id
AND course.course_id = chapter.course_id
AND chapter.chapter_id = lecture.chapter_id";
$data_temps = executeResult($sql);

// Delete img course
$img_name = $data_temps[0]['course_img'];
$img_path = 'img/course/' . $img_name;
delete_file($img_path);

// Delete lecture of this course
foreach ($data_temps as $temp) {
    $video_name = $temp['lecture_video'];
    $video_path = 'video/lecture/' . $video_name;
    delete_file($video_path);
}

// Delete course
$sql = "DELETE FROM course WHERE course_id = $current_course_id";
excute($sql);
header("Location: ./my_course.php");
?>