<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";
require abs_path('db/db_helper.php');
require abs_path('helpers/upload_file.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses4U | Teacher</title>
    <!-- Import css & script link -->

    <?php require abs_path('teacher/layout/css_link.php'); ?>

    <?php
    $current_chapter_id = $_GET['chapter_id'];
    $current_course_id = $_GET['course_id'];
    ?>
</head>

<body>
    <div class="learning_interface--layout">
        <!-- NAV -->
        <?php require abs_path('teacher/layout/nav.php'); ?>

        <!-- BODY -->
        <div class="body-wrapper">
            <div class="body-wrapper__content row">
                <div class="col-3 bg-light">
                    <?php
                    $sql = "SELECT chapter_title FROM chapter WHERE chapter_id=$current_chapter_id";
                    $chapter_title = executeResult($sql, $onlyOne = true)['chapter_title'];
                    ?>
                    <h6 style="margin: 5px;"><i>Chapter ID: <?= $current_chapter_id ?></i></h6>
                    <h6 style="margin: 5px;"><i>Chapter Name: <?= $chapter_title ?></i></h6>
                    <a href=<?= abs_url('teacher/course/my_course.php') ?> class="return_page-text">Back to Courses</a>
                    <a href=<?= abs_url('teacher/course/chapter/view.php?course_id=' . $current_course_id) ?> class="return_page-text">Back to Chapters</a>

                    <div class="accordion accordion-flush" id="sidebar--left">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo--left">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo--left" aria-expanded="false" aria-controls="flush-collapseTwo--left">
                                    Lecture
                                </button>
                            </h2>
                            <div id="flush-collapseTwo--left" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo--left" data-bs-parent="#sidebar--left">
                                <div class="accordion-collapse__elements">
                                    <a href="">Create lecture</a>
                                    <form action="view.php">
                                        <a href=<?= abs_url('teacher/course/lecture/view.php?chapter_id=' . $current_chapter_id . '&course_id=' . $current_course_id) ?>>View All Lecture</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <!-- FORM -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h3>Lecture Create</h3>
                        <hr>
                        <div class="row">
                            <h5>Lecture Title</h5>
                            <input name="lecture_title" class="form-control" type="text">
                        </div><br>
                        <div class="row">
                            <h5>Lecture Video</h5>
                            <input name="lecture_video" class="form-control" type="file" id="formFile" onchange="handleChange(event)">
                            <i id="duration_text"></i>
                            <!-- When add video, act function handleChange() and return value to hideen input has name = lecture_duration -->
                            <input type="hidden" id="duration" name="lecture_duration">
                        </div><br>
                        <div class="row">
                            <h5>Lecture Assignment</h5>
                            <input name="lecture_assignment" class="form-control" type="text" placeholder="Link assignment">
                        </div><br>

                        <input class="btn btn-success w-30" type="submit" value="Create" name="create_lecture"><br><br>
                    </form>
                    <?php
                    if (isset($_POST['create_lecture'])) {
                        $lecture_title = $_POST['lecture_title'];
                        $lecture_duration = $_POST['lecture_duration'];
                        $lecture_assignment = $_POST['lecture_assignment'];
                        require abs_path('db/db_connect.php');
                        // fix sql injection error with '
                        $lecture_title = mysqli_real_escape_string($conn, $lecture_title);
                        $lecture_assignment = mysqli_real_escape_string($conn, $lecture_assignment);

                        if ($_FILES['lecture_video']['name'] != "") {
                            $file = $_FILES['lecture_video'];
                            $new_file_name = date('dmYHis') . $file["name"];
                            $folder = 'video/lecture';
                            $file_types = array('mp4', 'flv', 'wmv', 'mov');
                            upload_file($file, $new_file_name, $folder, $file_types, $max_file_size = 80000000);

                            $sql = "INSERT INTO `lecture`(`lecture_title`, `lecture_duration`, `lecture_video`,`chapter_id`,`assignment`) 
                                VALUES ('$lecture_title',$lecture_duration,'$new_file_name','$current_chapter_id','$lecture_assignment')";

                            // mysqli_query($conn, $sql);
                            excute($sql);
                            echo "<p>Created Success:</p>
                                    <p>Lecture Title: $lecture_title</p>
                                    <p>Lecture Duration: $lecture_duration</p>
                                    <p>Lecture File Name: $new_file_name</p>
                                    <p>Lecture Assignment: $lecture_assignment</p>
                                    ";
                        } else {
                            $sql = "INSERT INTO `lecture`(`lecture_title`, `lecture_duration`, `lecture_video`,`chapter_id`,`assignment`) 
                                VALUES ('$lecture_title',NULL,NULL,'$current_chapter_id','$lecture_assignment')";

                            // mysqli_query($conn, $sql);
                            excute($sql);
                            echo "<p>Created Success:</p>
                                    <p>Lecture Title: $lecture_title</p>
                                    <p>Lecture Assignment: $lecture_assignment</p>
                                    ";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <!-- <footer></footer> -->
    </div>

    <!-- SIDEBAR -->
    <?php require abs_path('teacher/layout/sidebar.php'); ?>
</body>
<script>
    var getVideoDuration = (file) =>
        new Promise((resolve, reject) => {
            var reader = new FileReader();
            reader.onload = () => {
                var media = new Audio(reader.result);
                media.onloadedmetadata = () => resolve(media.duration);
            };
            reader.readAsDataURL(file);
            reader.onerror = (error) => reject(error);
        });

    var handleChange = async (e) => {
        var duration = (parseFloat(await getVideoDuration(e.target.files[0])) / 60).toFixed(2);

        document.querySelector("#duration").value = duration;
        document.querySelector("#duration_text").innerHTML = `Duration: ${duration} minutes`;
    };
</script>

</html>