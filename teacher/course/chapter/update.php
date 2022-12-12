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
                    $sql = "SELECT course_name FROM course WHERE course_id=$current_course_id";
                    $course_name = executeResult($sql, $onlyOne = true)['course_name'];
                    ?>
                    <h6 style="margin: 5px;"><i>Course ID: <?= $current_course_id ?></i></h6>
                    <h6 style="margin: 5px;"><i>Course Name: <?= $course_name ?></i></h6>
                    <a href=<?= abs_url('teacher/course/my_course.php') ?> class="return_page-text">Back to Courses</a>

                    <div class="accordion accordion-flush" id="sidebar--left">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo--left">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo--left" aria-expanded="false" aria-controls="flush-collapseTwo--left">
                                    Chapter
                                </button>
                            </h2>
                            <div id="flush-collapseTwo--left" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo--left" data-bs-parent="#sidebar--left">
                                <div class="accordion-collapse__elements">
                                    <a href="">Create Chapter</a>
                                    <form action="view.php">
                                        <a href=<?= abs_url('teacher/course/chapter/view.php?course_id=' . $current_course_id) ?>>View All Chapter</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <!-- FORM CREATE-->
                    <form action="" method="POST">
                        <h3>Chapter Create</h3>
                        <hr>
                        <?php
                        $sql = "SELECT chapter_title, chapter_id FROM chapter WHERE chapter_id = '$current_chapter_id'";
                        $chapter_title_result = executeResult($sql, $onlyOne = true);
                        ?>
                        <!-- Chapter ID -->
                        <div class="row">
                            <h5>Chapter ID</h5>
                            <input name="chapter_id" class="form-control" type="number" value="<?= $chapter_title_result['chapter_id'] ?>" readonly>
                        </div><br>
                        <!-- Chapter title -->
                        <div class="row">
                            <h5>Chapter Title</h5>
                            <input name="chapter_title" class="form-control" type="text" value="<?= $chapter_title_result['chapter_title'] ?>">
                        </div><br>
                        <input class="btn btn-success w-30" type="submit" value="Update" name="create_chapter"><br><br>
                    </form>

                    <?php
                    if (isset($_POST['create_chapter'])) {
                        $chapter_title = $_POST['chapter_title'];
                        require abs_path('db/db_connect.php');
                        $chapter_title = mysqli_real_escape_string($conn, $chapter_title);

                        $sql = "UPDATE `chapter` SET `chapter_title`='$chapter_title' WHERE chapter_id = $current_chapter_id";

                        // mysqli_query($conn, $sql);
                        excute($sql);
                        echo "<p>Updated Success Chapter Title:<br> $chapter_title";
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

</html>