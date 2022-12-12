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
    <style>
        .return_page-text {
            display: block;
            padding: 1.2vw;
            text-decoration: none;
            width: 100% !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
    </style>

    <!-- Import css & script link -->
    <?php require abs_path('teacher/layout/css_link.php'); ?>

    <?php
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
                                    <a href=<?= abs_url('teacher/course/chapter/create.php?course_id=' . $current_course_id) ?>>Create Chapter</a>
                                    <form action="view.php">
                                        <a href=<?= abs_url('teacher/course/chapter/view.php?course_id=' . $current_course_id) ?>>View All Chapter</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <h3>Chapter View</h3>
                    <table class="table table-success table-striped">
                        <tr>
                            <th>Chapter ID</th>
                            <th>Chapter Title</th>
                            <th>Add Lecture</th>
                            <th>Action</th>
                        </tr>
                        <!-- Table data -->
                        <?php
                        $sql = "SELECT * FROM chapter
                            WHERE chapter.course_id = $current_course_id
                            ORDER BY chapter_id ASC";
                        $chapters = executeResult($sql);
                        foreach ($chapters as $chapter) { ?>
                            <tr>
                                <td><?= $chapter['chapter_id'] ?></td>
                                <td><?= $chapter['chapter_title'] ?></td>
                                <td>
                                    <!-- Add chapter -->
                                    <a class="btn btn-info" href=<?= abs_url('teacher/course/lecture/create.php?chapter_id=' . $chapter['chapter_id'] . '&course_id=' . $current_course_id) ?>>
                                        <i class="fa-solid fa-plus"></i>
                                    </a>
                                </td>
                                <td>
                                    <p>
                                        <!-- Edit Chapter -->
                                        <a class="btn btn-warning" href=<?= abs_url('teacher/course/chapter/update.php?chapter_id=' . $chapter['chapter_id'] . '&course_id=' . $current_course_id) ?>>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <!-- Delete Chapter -->
                                        <a class="btn btn-danger" href=<?= abs_url('teacher/course/chapter/delete.php?chapter_id=' . $chapter['chapter_id'] . '&course_id=' . $current_course_id) ?>>
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
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