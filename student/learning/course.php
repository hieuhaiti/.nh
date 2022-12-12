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

    <!-- Boostrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome.com -->
    <script src="https://kit.fontawesome.com/fa1c3d5118.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- link css -->
    <link rel="stylesheet" href=<?= abs_url('assets/css/learning_page/learning_page.css') ?>>
    <?php
    $course_id = $_GET['course_id'];
    $sql = "SELECT * FROM course, language WHERE course_id = $course_id AND language.language_id = course.language_id";
    $current_course = executeResult($sql, $onlyOne = true);
    ?>
</head>

<body>
    <div class="learning_interface--layout">
        <nav class="fixed-top top-0 end-0">
            <!-- Nav elements pc -->
            <div class="nav__elements--pc">
                <div>
                    <a href=<?= abs_url('student/index.php') ?>>Courses4U</a>
                    <label class="nav_logo--vline"> | </label>

                    <a href="#"><?= $current_course['course_name'] ?></a>
                </div>
                <div>
                    <a href=<?= abs_url('student/index.php') ?>><i class="fa-solid fa-house"></i></a>
                </div>
            </div>
            <!-- Nav elements mb -->
            <div class="nav__elements--mb">
                <a href=<?= abs_url('student/index.php') ?>>Courses4U</a>
                <!-- Button offcanvas -->
                <a class="nav__btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-align-justify"></i></a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h3 class="offcanvas-title" id="offcanvasRightLabel"><?= $current_course['course_name'] ?></h3>
                        <button type="button" class="btn-close ms-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        <div class="sidebar-accordion" style="background-color: #f7f8fa">
                            <div class="courses-container accordion" id="accordionExample">
                                <!-- dropdown -->
                                <form action="" method="GET">
                                    <?php
                                    $sql = "SELECT * FROM chapter WHERE course_id = $course_id";
                                    $chapters = executeResult($sql);
                                    $count = 0;
                                    foreach ($chapters as $chapter) {
                                        $count += 1; ?>
                                        <!-- Begin Chapter loop -->
                                        <div class="accordion-item">
                                            <!-- Chapter title -->
                                            <div class="accordion-item__tittle">
                                                <h2 class="accordion-header" id="<?= 'heading' . $count ?>">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= 'collapse' . $count ?>" aria-expanded="true" aria-controls="<?= 'collapse' . $count ?>" style="background-color: #f7f8fa;">
                                                        <strong><?= $chapter['chapter_title'] ?></strong>
                                                    </button>
                                                </h2>
                                            </div>
                                            <!-- Lecture Title -->
                                            <div id="<?= 'collapse' . $count ?>" class="accordion-collapse collapse show" aria-labelledby="<?= 'heading' . $count ?>" data-bs-parent="#accordionExample">
                                                <div class="courses-content">
                                                    <!-- Begin lecture loop -->
                                                    <?php
                                                    $sql = "SELECT * FROM lecture WHERE chapter_id = $chapter[chapter_id]";
                                                    $lectures = executeResult($sql);
                                                    foreach ($lectures as $lecture) {
                                                    ?>
                                                        <div>
                                                            <a href=<?= abs_url('teacher/course/preview.php?course_id=' . $course_id . '&lecture_id=' . $lecture['lecture_id']) ?>>
                                                                <div class="courses-content__items--wrapper">
                                                                    <div>
                                                                        <i class="fa-solid fa-square-check"></i>
                                                                    </div>
                                                                    <div style="word-wrap: break-word;">
                                                                        <?= $lecture['lecture_title'] ?><br>
                                                                        <div style="margin-top: 0.5em; color: rgba(0, 0, 0, 0.7); font-size: 0.9em !important">
                                                                            <i class="fa-solid fa-circle-play" style="font-size: 0.9em !important"></i> <?= $lecture['lecture_duration'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- End lecture loop -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Chapter loop -->
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </nav>

        <div class="body-wrapper">
            <div class="body-wrapper__video">
                <video controls>
                    <?php
                    if (isset($_GET['lecture_id'])) {
                        $video_lecture_id = $_GET['lecture_id'];
                        $sql = "SELECT lecture_video FROM lecture WHERE lecture_id = $video_lecture_id";
                        $video = executeResult($sql, $onlyOne = true)['lecture_video'];
                    ?>
                        <source src="<?= abs_url('assets/video/lecture/' . $video); ?>" type="video/mp4">
                    <?php } else {
                        $sql = "SELECT lecture_video FROM lecture LIMIT 1";
                        $video = executeResult($sql, $onlyOne = true)['lecture_video'];
                    ?>
                        <source src="<?= abs_url('assets/video/lecture/' . $video); ?>" type="video/mp4">
                    <?php } ?>
                </video>
            </div>

            <!-- Course summary -->
            <div class="course-summary">
                <div class="course-summary__linkbar">
                    <ul>
                        <li><a href=""><b>Overview</b></a></li>
                        <li><a href=""><b>Q & A</b></a></li>
                        <li><a href=""><b>Notes</b></a></li>
                        <li><a href=""><b>Annotations</b></a></li>
                        <li><a href=""><b>Reviews</b></a></li>
                        <li><a href=""><b>Learning tools</b></a></li>
                    </ul>
                </div>
                <div class="course-summary__overview">
                    <ul>
                        <li class="overview__title" style="list-style-type: none;">
                            <h3>About this course</h3>
                            <p><?= $current_course['course_title'] ?></p>
                        </li>
                        <li class="overview__byTheNumbers">
                            <p>By the numbers</p>
                            <?php
                            $sql = "SELECT COUNT(*) AS total_student FROM `course_student` WHERE course_id = $course_id";
                            $total_student = executeResult($sql, $onlyOne = true)['total_student'];
                            ?>
                            <div>
                                <p>Students: <?= $total_student ?></p>
                                <p>Languages: <?= $current_course['language_name'] ?></p>
                            </div>
                            <div style="margin-left: 2em;">
                                <!-- total lecture -->
                                <?php
                                $sql = "SELECT COUNT(*) AS total FROM lecture WHERE chapter_id 
                                IN (SELECT chapter.chapter_id FROM chapter WHERE course_id = $course_id)";
                                $numOfLectures = executeResult($sql, $onlyOne = true)['total'];
                                ?>
                                <p>Lectures: <?= $numOfLectures ?></p>
                                <?php
                                $sql = "SELECT SUM(lecture_duration) AS total FROM lecture WHERE chapter_id 
                                IN (SELECT chapter.chapter_id FROM chapter WHERE course_id = $course_id)";
                                $sumOfLectures = executeResult($sql, $onlyOne = true)['total'];
                                ?>
                                <p>Video: <?= $sumOfLectures ?> total hours</p>
                            </div>
                        </li>
                        <li class="overview__Certificates">
                            <p>Certificates</p>
                            <p>Get Courses4U certificate by completing entire course</p>
                        </li>
                        <li class="overview__Features">
                            <p>Features</p>
                            <p>Available on iOS and Android
                                Coding exercises</p>
                        </li>
                        <li class="overview__Description" style="border: none !important;">
                            <p>Description</p>
                            <span>
                                <?= $current_course['course_description'] ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-container">

            </div>
        </footer>
    </div>
    <div class="sidebar-accordion sidebar-accordion--pc" style="background-color: #f7f8fa">
        <div class="courses-container accordion" id="accordionExample">
            <div class="sidebar-accordion__title">
                Course Contents
            </div>
            <!-- dropdown -->
            <form action="" method="GET">
                <?php
                $sql = "SELECT * FROM chapter WHERE course_id = $course_id";
                $chapters = executeResult($sql);
                $count = 0;
                foreach ($chapters as $chapter) {
                    $count += 1; ?>
                    <!-- Begin Chapter loop -->
                    <div class="accordion-item">
                        <!-- Chapter title -->
                        <div class="accordion-item__tittle">
                            <h2 class="accordion-header" id="<?= 'heading' . $count ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= 'collapse' . $count ?>" aria-expanded="true" aria-controls="<?= 'collapse' . $count ?>" style="background-color: #f7f8fa;">
                                    <strong><?= $chapter['chapter_title'] ?></strong>
                                </button>
                            </h2>
                        </div>
                        <!-- Lecture Title -->
                        <div id="<?= 'collapse' . $count ?>" class="accordion-collapse collapse show" aria-labelledby="<?= 'heading' . $count ?>" data-bs-parent="#accordionExample">
                            <div class="courses-content">
                                <!-- Begin lecture loop -->
                                <?php
                                $sql = "SELECT * FROM lecture WHERE chapter_id = $chapter[chapter_id]";
                                $lectures = executeResult($sql);
                                foreach ($lectures as $lecture) {
                                ?>
                                    <div>
                                        <a href=<?= abs_url('student/learning/course.php?course_id=' . $course_id . '&lecture_id=' . $lecture['lecture_id']) ?>>
                                            <div class="courses-content__items--wrapper">
                                                <div>
                                                    <i class="fa-solid fa-square-check"></i>
                                                </div>
                                                <div style="word-wrap: break-word;">
                                                    <?= $lecture['lecture_title'] ?><br>
                                                    <div style="margin-top: 0.5em; color: rgba(0, 0, 0, 0.7); font-size: 0.9em !important">
                                                        <i class="fa-solid fa-circle-play" style="font-size: 0.9em !important"></i> <?= $lecture['lecture_duration'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                <!-- End lecture loop -->
                            </div>
                        </div>
                    </div>
                    <!-- End Chapter loop -->
                <?php } ?>
            </form>
        </div>
    </div>


</body>

</html>