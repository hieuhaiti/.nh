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
</head>

<body>
    <div class="learning_interface--layout">
        <!-- NAV -->
        <?php require abs_path('teacher/layout/nav.php'); ?>

        <!-- BODY -->
        <div class="body-wrapper">
            <div class="body-wrapper__content row">
                <div class="col-3">
                    <h5><a href="">Course</a></h5>
                </div>

                <div class="col-9">
                    <h3><b>My Course</b></h3>
                    <!-- PAGING PROCESS -->
                    <?php
                    // Get total records
                    $sql = "SELECT COUNT(*) AS total_records FROM `course` WHERE user_id = $CURRENT_USER_INFOR[user_id]";
                    $total_records = executeResult($sql, $onlyOne = True)['total_records'];

                    // Set number of records per page
                    $limit = 5;

                    // Calculate the number of pages needed
                    $total_pages = ceil($total_records / $limit);

                    // Get current page number
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Calculate start pointer
                    $start = ($current_page - 1) * $limit;

                    // $sql = "SELECT * FROM `course` 
                    //     WHERE user_id = $CURRENT_USER_INFOR[user_id]
                    //     LIMIT $start, $limit";

                    if (!isset($_GET['search']) || $_GET['search_txt'] == "") {
                        $sql = "SELECT * FROM `course` 
                                WHERE user_id = $CURRENT_USER_INFOR[user_id]
                                LIMIT $start, $limit";
                    } else {
                        $kw = $_GET['search_txt'];
                        $sql = "SELECT * FROM `course`, `language`
                        WHERE user_id = $CURRENT_USER_INFOR[user_id]
                        AND course.language_id = language.language_id
                        AND (course_name LIKE '%$kw%' OR course_title LIKE '%$kw%' OR language_name LIKE '%$kw%')
                        LIMIT $start, $limit;";
                    }

                    $my_courses = executeResult($sql);
                    ?>

                    <form action="" class='search-form'>
                        <div class="input-group mb-3">
                            <input value="<?php isset($kw) ? printf($kw) : printf("") ?>" style="width: 50% !important;" class="form-control" placeholder="Input course name, title, language,..." name="search_txt">
                            <select class="form-select" id="inputGroupSelect01" style="width: 20% !important;">
                                <option selected>Choose...</option>
                                <option value="course_name">Course Name</option>
                                <option value="course_title">Course Title</option>
                                <option value="language_name">Language Name</option>
                            </select>
                            <input style="width: 8rem !important;" type="submit" class="btn btn-success" value="Search" name="search">
                        </div>
                    </form>

                    <table class="table table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Img</th>
                            <th>Action</th>
                        </tr>
                        <!-- Table data -->
                        <?php
                        foreach ($my_courses as $mycourse) { ?>
                            <tr>
                                <td><?= $mycourse['course_id'] ?></td>
                                <td><?= $mycourse['course_name'] ?></td>
                                <td>
                                    <img src="<?= abs_url('assets/img/course/' . $mycourse['course_img']); ?>" style="width: 50px;">
                                </td>
                                <td>
                                    <a href=<?= abs_url('teacher/course/preview.php?course_id=' . $mycourse['course_id']) ?> class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                                    <a href=<?= abs_url('teacher/course/update.php?course_id=' . $mycourse['course_id'])  ?> class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href=<?= abs_url('teacher/course/delete.php?course_id=' . $mycourse['course_id']) ?> class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <!-- Paging -->
                    <ul class="pagination" style="float: right;">
                        <!-- First page -->

                        <li class="page-item" style="<?php $current_page == 1 ? printf('display: none;') : printf('')  ?>">
                            <a class="page-link" href="my_course.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <!-- Page -->
                        <?php
                        for ($page = 1; $page <= $total_pages; $page++) { ?>
                            <li class="page-item <?php $page == $current_page ? printf('active') : printf('') ?>">
                                <a class="page-link" href="my_course.php?page=<?= $page ?>"><?= $page ?></a>
                            </li>
                        <?php } ?>

                        <!-- End page -->
                        <li class="page-item" style="<?php $current_page == $total_pages ? printf('display: none;') : printf('')  ?>">
                            <a class="page-link" href="my_course.php?page=<?= $total_pages ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer></footer>
    </div>

    <!-- SIDEBAR -->
    <?php require abs_path('teacher/layout/sidebar.php'); ?>
</body>

</html>