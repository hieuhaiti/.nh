<?php
session_start();
if (isset($_SESSION['email'])) {
    $CURRENT_USER_EMAIL = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE email = '$CURRENT_USER_EMAIL'";
    $CURRENT_USER_INFOR = executeResult($sql, $onlyOne = true);
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg text-bg-info fixed-top">
    <div class="container-fluid">
        <!-- logo -->
        <a class="navbar-brand" style="display: <?php isset($CURRENT_USER_EMAIL) ? printf("none !important") : printf(""); ?> ;" href=<?= abs_url('student/index.php') ?>>Courses4U</a>
        <!-- If email exist, show avt dropdown -->
        <div class="dropdown navbar-brand" style="display: <?php isset($CURRENT_USER_EMAIL) ? printf("") : printf("none !important"); ?> ;">
            <!-- Avatar navbar -->
            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="40px">
            </a>
            <ul class="dropdown-menu shadow">
                <li class="dropdown-header border-bottom">
                    <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="50px">
                    <label><?= $CURRENT_USER_EMAIL ?></label>
                </li>
                <li><a class="dropdown-item" href=<?= abs_url('student/HIEU/my_learning.php') ?>>My learning</a></li>
                <li><a class="dropdown-item" href=<?= abs_url('student/profile.php') ?>>Edit profile</a></li>
                <li><a class="dropdown-item" href=<?= abs_url('student/logout.php') ?>>Logout</a></li>
            </ul>
        </div>
        <!-- Button khi responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-container navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href=<?= abs_url('student/index.php') ?>>Home</a>
                </li>
                <!-- Dropwdown level 1 -->
                <li class="categories--lv1 nav-item dropdown">
                    <a class="nav-link" data-bs-auto-close="outside" href="#">Categories</a>
                    <ul class="categories__elements--lv1 dropdown-menu shadow" id="collapseExample">
                        <!-- CATEGORY-START -->
                        <?php
                        $sql = "SELECT * FROM category ORDER BY category_id ASC";
                        $categories = executeResult($sql);
                        foreach ($categories as $category) { ?>
                            <li class="categories--lv2 dropend">
                                <a href=<?= abs_url('student/course_filter.php?category_id=' . $category['category_id']) ?> class="dropdown-item dropend-wrapper d-flex justify-content-between" data-bs-auto-close="outside">
                                    <?= $category['category_name'] ?><i class="dropend-icon ti-angle-right"></i>
                                </a>
                                <ul class="categories__elements--lv2 dropdown-menu shadow">
                                    <!-- SUBCATEGORY-START -->
                                    <?php
                                    $sql = "SELECT * FROM subcategory WHERE category_id = $category[category_id] ORDER BY subcategory_id ASC";
                                    $subcategories = executeResult($sql);
                                    foreach ($subcategories as $subcategory) { ?>
                                        <li class="categories--lv3 dropend">
                                            <a href=<?= abs_url('student/course_filter.php?subcategory_id=' . $subcategory['subcategory_id']) ?> class="dropdown-item dropend-wrapper d-flex justify-content-between" data-bs-auto-close="outside">
                                                <?= $subcategory['subcategory_name'] ?><i class="dropend-icon ti-angle-right"></i></a>
                                            <ul class="categories__elements--lv3 dropdown-menu shadow">
                                                <li class="dropdown-item">
                                                    <h5>Popular topics</h5>
                                                </li>
                                                <!-- TOPIC-START -->
                                                <?php
                                                $sql = "SELECT * FROM subcategory_topic, topic 
                                                    WHERE subcategory_id = $subcategory[subcategory_id]
                                                    AND topic.topic_id = subcategory_topic.topic_id";
                                                $topics = executeResult($sql);
                                                foreach ($topics as $topic) { ?>
                                                    <li><a href=<?= abs_url('student/course_filter.php?topic_id=' . $topic['topic_id']) ?> class="dropdown-item"><?= $topic['topic_name'] ?></a></li>
                                                    <!-- TOPIC-END -->
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <!-- SUBCATEGORY-END -->
                                </ul>
                            </li>
                            <!-- CATEGORY-END -->
                        <?php } ?>
                    </ul>
                </li>

                <!-- Books -->
                <li class=" nav-item">
                    <a class="nav-link" href="/templates/books_temp/pageBooks.html">Books</a>
                </li>

                <!-- Blogs -->
                <li class="nav-item">
                    <a class="nav-link" href="/templates/blog_temp/blog_page.html">Blogs</a>
                </li>

                <!-- Login require -->
                <?php
                if (!isset($_SESSION['email'])) { ?>
                    <li class="nav-item">
                        <a style="color: blue; font-weight: bold;" class="nav-link" href=<?= abs_url('student/login.php') ?>>Login</a>
                    </li>
                <?php } ?>

                <!-- HIẾU-->
                <!-- My learning -->
                <?php
                if (isset($_SESSION['email'])) {
                    $CURRENT_USER_EMAIL = $_SESSION['email'];
                    $sql_process = "SELECT course_id, process FROM course_student WHERE user_id = (SELECT user_id FROM user WHERE email =  '" . $CURRENT_USER_EMAIL . "')";
                    $process_course = executeResult($sql_process);
                    $course_id = [];

                    foreach ($process_course as $value) {
                        $course_id[] = $value['course_id'];
                    }
                    foreach ($course_id as $key => $value) {
                        $sql_course = "SELECT course_id, course_name, course_img FROM course WHERE course_id = '" . $value . "'";
                        $infor_course = executeResult($sql_course);
                        $process_course[$key]['course_name'] = $infor_course[0]['course_name'];
                        $process_course[$key]['course_img'] = $infor_course[0]['course_img'];
                    }
                ?>

                    <li class="nav__Mylearning nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" data-bs-auto-close="outside" href=<?= abs_url('student/HIEU/my_learning.php') ?>>My learning</a>
                        <ul class="Mylearning__list dropdown-menu shadow">
                            <?php foreach ($process_course as $infor_user_course) { ?>
                                <li>
                                    <a class="nav-link" href=<?= abs_url('student/learning/course.php?course_id=' . $infor_user_course['course_id']) ?>>
                                        <div class="Mylearning__items">
                                            <img src="<?= abs_url('assets/img/course/' . $infor_user_course['course_img']); ?>" alt="img" width="80%">
                                            <div style="width:100%" class="Mylearning__items--center">
                                                <p>
                                                    <?= $infor_user_course['course_name']; ?>
                                                </p>
                                                <meter style="width:90%" id="disk_d" value="<?= $infor_user_course['process']; ?>"></meter>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                        <?php }
                        } ?>
                        </ul>
                    </li>



                    <!-- Search -->
                    <form action=<?= abs_url('student/HIEU/search_value.php') ?> class="navbar__search-container d-flex" role="search" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" list="datalistOptions" name="Search_form" required>
                        <select name="type_search" class="border-success rounded-pill">
                            <option value="course">tìm kiếm theo tên khóa học</option>
                            <option value="user">tìm kiếm theo giáo viên</option>
                        </select>

                        <button class="btn btn-success" tpe="submit" name="submit">Search</button>
                    </form><br>
                    <!-- HIẾU -->
        </div>
    </div>
</nav>