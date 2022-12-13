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
                                    <form action="create.php">
                                        <a href=<?= abs_url('teacher/course/lecture/create.php?chapter_id=' . $current_chapter_id . '&course_id=' . $current_course_id) ?>>Create lecture</a>
                                    </form>
                                    <a href="">View All Lecture</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <h3>Lecture View</h3>
                    <?php
                    $total_records = 0;
                    $kw = "";
                    $search_type = "";

                    // Get total records
                    if (isset($_GET['keyword'])) {
                        $kw = $_GET['keyword'];
                        $search_type = $_GET['search_option'];
                        $sql = "SELECT COUNT(*) AS all_records FROM lecture WHERE chapter_id = $current_chapter_id AND $search_type LIKE '%$kw%'";
                        // Get total record
                        $total_records = executeResult($sql, $onlyOne = True)['all_records'];
                    } else {
                        $sql = "SELECT COUNT(*) AS all_records FROM lecture WHERE chapter_id = $current_chapter_id";
                        // Get total record
                        $total_records = executeResult($sql, $onlyOne = True)['all_records'];
                    }

                    // Set number of records per page
                    $limit = 5;

                    // Calculate the number of pages needed
                    $total_pages = ceil($total_records / $limit);


                    // Get current page number
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate start pointer
                    $start = ($current_page - 1) * $limit;

                    // Paging with LIMIT clause
                    if (isset($_GET['keyword'])) {
                        $sql = "SELECT * FROM lecture WHERE chapter_id = $current_chapter_id AND $search_type LIKE '%$kw%'
                        ORDER BY chapter_id ASC
                        LIMIT $start, $limit;";
                    } else {
                        $sql = "SELECT * FROM lecture WHERE chapter_id = $current_chapter_id
                            ORDER BY chapter_id ASC
                            LIMIT $start, $limit";
                    }

                    $lectures = executeResult($sql);
                    ?>
                    <!-- Search form -->
                    <form action="" class='search-form'>
                        <div class="input-group mb-3">
                            <input type="hidden" name="course_id" value="<?= $current_course_id ?>">
                            <input type="hidden" name="chapter_id" value="<?= $current_chapter_id ?>">

                            <input name="keyword" value="<?php isset($kw) ? printf($kw) : printf("") ?>" style="width: 50% !important;" class="form-control" placeholder="Type Chapter Title,...">
                            <select class="form-select" id="inputGroupSelect01" style="width: 20% !important;" name="search_option">
                                <option value="lecture_title" <?php isset($_GET['search_option']) ? ($search_type == 'lecture_title' ? printf('selected') : '') : '' ?>>Lecture Title</option>
                                <option value="lecture_id" <?php isset($_GET['search_option']) ? ($search_type == 'lecture_id' ? printf('selected') : '') : '' ?>>Lecture ID</option>
                            </select>

                            <!-- submit search form -->
                            <input style="width: 8rem !important;" type="submit" class="btn btn-success" value="Search" name="search">
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-success table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Lecture ID</th>
                                    <th>Lecture Title</th>
                                    <th>Video</th>
                                    <th>Chapter ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lectures as $lecture) { ?>
                                    <tr>
                                        <td><?= $lecture['lecture_id'] ?></td>
                                        <td><?= substr($lecture['lecture_title'], 0, 20) . '...' ?></td>
                                        <td><?= substr($lecture['lecture_video'], 0, 20) ?></td>
                                        <td><?= $current_chapter_id ?></td>
                                        <td>
                                            <div>
                                                <!-- Edit Chapter -->
                                                <a class="btn btn-warning" href=<?= abs_url('teacher/course/lecture/update.php?chapter_id=' . $current_chapter_id . '&course_id=' . $current_course_id . '&lecture_id=' . $lecture['lecture_id']) ?>>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <!-- Delete Chapter -->
                                                <a class="btn btn-danger" href=<?= abs_url('teacher/course/lecture/delete.php?chapter_id=' . $current_chapter_id . '&course_id=' . $current_course_id . '&lecture_id=' . $lecture['lecture_id']) ?>>
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Paging -->
                    <ul class="pagination" style="float: right;">
                        <!-- First page -->
                        <li class="page-item" style="<?php $current_page == 1 ? printf('display: none;') : ''  ?>">
                            <a class="page-link" href="view.php?course_id=<?= $current_course_id ?>&page=1<?php isset($_GET['keyword']) ? printf('&keyword=' . $kw . '&search_option=' . $search_type) : '' ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <!-- Page loop -->
                        <?php
                        for ($page = 1; $page <= $total_pages; $page++) { ?>
                            <li class="page-item <?php $page == $current_page ? printf('active') : '' ?>">
                                <a class="page-link" href="view.php?course_id=<?= $current_course_id ?>&page=<?= $page ?><?php isset($_GET['keyword']) ? printf('&keyword=' . $kw . '&search_option=' . $search_type) : '' ?>"><?= $page ?></a>
                            </li>
                        <?php } ?>
                        <!-- End page -->
                        <li class="page-item" style="<?php ($current_page == $total_pages || $total_pages == 0) ? printf('display: none;') : ''  ?>">
                            <a class="page-link" href="view.php?course_id=<?= $current_course_id ?>&page=<?= $total_pages ?><?php isset($_GET['keyword']) ? printf('&keyword=' . $kw . '&search_option=' . $search_type) : '' ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
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