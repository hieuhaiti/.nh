<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";
require abs_path('db/db_helper.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    // CSS
    require abs_path('student/layout/css_link.php');
    //NAVBAR
    require abs_path('student/layout/nav.php');
    ?>
</head>

<body>
    <header>
        <?php require abs_path('student/layout/nav.php'); ?>
    </header>


    <!-- BODY -->
    <div class="grid-4column">
        <div class="grid-4column__title">
            <?php
            $type_search = $_GET['type_search'];
            $userSearch = $_GET['Search_form'];
            if ($type_search == 'course') {
                echo ("
            <strong>
                <em>Kết quả tìm kiếm cho các khóa học tên $userSearch</em>
            </strong>
            </div>");
                $sql = "SELECT * FROM course WHERE course_name LIKE '%" . $userSearch . "%'";
                $search_results = executeResult($sql);
                if ($search_results != []) {
                    foreach ($search_results as $row) { ?>
                        <div class="wrapper">
                            <a class="nav-link" >
                            <a href=<?= abs_url('student/learning/course.php?course_id=' . $row['course_id']) ?> class="grid-4column__box--color<?php echo (random_int(1, 4)) ?>">
                                <span>

                                    <em><?php echo ($row['course_name']) ?></em><br>
                                </span>
                            </a>
                        </div>
                    <?php ;}} else {
                    echo "</div><h3 style = 'padding-left:50px;padding-bottom:50px'>Rất tiếc, chúng tôi không tìm thấy nội dung bạn muốn tìm </h3>";
                }
            }
            if ($type_search == 'user') {
                echo ("
            <strong>
                <em>Kết quả tìm kiếm cho các khóa học của $userSearch</em>
            </strong>
        </div>");
                $sql = "SELECT course.* FROM course,user WHERE user.user_id = course.user_id AND user.real_name LIKE '%" . $userSearch . "%'";
                $search_results = executeResult($sql);
                if ($search_results != []) {
                    foreach ($search_results as $row) { ?>
                        <div class="wrapper">
                            <a href=<?= abs_url('student/learning/course.php?course_id=' . $row['course_id']) ?> class="grid-4column__box--color<?php echo (random_int(1, 4)) ?>">
                                <span>

                                    <em><?php echo ($row['course_name']) ?></em><br>
                                </span>
                            </a>
                        </div>

            <?php ;}} else {
                    echo "</div><h3 style = 'padding-left:50px;padding-bottom:50px'>Rất tiếc, chúng tôi không tìm thấy nội dung bạn muốn tìm </h3>";
                }
            } ?>
        </div>
        <!-- FOOTER -->
        <?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>