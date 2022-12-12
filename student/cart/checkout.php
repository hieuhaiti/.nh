<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";

require abs_path('db/db_helper.php');
?>


<?php
$course_id = $_GET['course_id'];
$user_id = $_GET['user_id'];

$sql = "INSERT INTO `course_student`(`course_id`, `process`, `user_id`) VALUES ($course_id,0,$user_id)";
excute($sql);
header("Location: ../index.php");
?>