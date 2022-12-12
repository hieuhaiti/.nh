<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";

require abs_path('db/db_helper.php');
require abs_path('helpers/delete_file.php');
?>

<?php
$current_chapter_id = $_GET['chapter_id'];
$current_course_id = $_GET['course_id'];
?>

<?php
// Delete video lecture of chapter
$sql = "SELECT lecture_video FROM chapter, lecture
WHERE chapter.chapter_id = $current_chapter_id
AND chapter.chapter_id = lecture.chapter_id";
$data_temps = executeResult($sql);

foreach ($data_temps as $temp) {
    $video_name = $temp['lecture_video'];
    $video_path = 'video/lecture/' . $video_name;
    delete_file($video_path);
}


// Delete chapter
$sql = "DELETE FROM chapter WHERE chapter_id = $current_chapter_id";
excute($sql);
header("Location: ./view.php?course_id=$current_course_id");
?>