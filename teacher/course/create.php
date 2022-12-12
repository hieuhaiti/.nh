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
    <!-- CK-Editer -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
</head>

<body>
    <div class="learning_interface--layout">
        <!-- NAV -->
        <?php require abs_path('teacher/layout/nav.php'); ?>

        <!-- BODY -->
        <div class="body-wrapper">
            <div class="body-wrapper__content row">
                <div class="col-3">
                    <h5><a href="../index.php">Course</a></h5>
                </div>
                <div class="col-9">
                    <!-- FORM -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h3>Course Create</h3>
                        <hr>
                        <!-- Input course name -->
                        <div class="row">
                            <h5>Course Name</h5>
                            <input name="course_name" class="form-control" type="text">
                        </div><br>
                        <!-- Input course title -->
                        <div class="row">
                            <h5>Course Title</h5>
                            <input name="course_title" class="form-control" type="text">
                        </div><br>
                        <!-- Select course language -->
                        <div class="row">
                            <h5>Language</h5>
                            <select name="language" class="form-select form-select mb-3">
                                <?php
                                $sql = "SELECT * FROM `language`";
                                $languages = executeResult($sql);
                                foreach ($languages as $lang) {
                                    echo "<option value='$lang[language_id]'>$lang[language_name]</option>";
                                }
                                ?>
                            </select>
                        </div><br>
                        <!-- Select sub topic -->
                        <div class="row">
                            <h5>Topic</h5>
                            <select name="sub_topic" class="form-select form-select mb-3">
                                <?php
                                $sql = "SELECT sub_topic_id, category.category_name, subcategory.subcategory_name, topic.topic_name
                                FROM category, subcategory, topic, subcategory_topic 
                                WHERE category.category_id = subcategory.category_id 
                                AND topic.topic_id = subcategory_topic.topic_id 
                                AND subcategory.subcategory_id = subcategory_topic.subcategory_id 
                                ORDER BY `category`.`category_id` ASC";
                                $sub_topic_lst = executeResult($sql);
                                foreach ($sub_topic_lst as $sub_topic) {
                                    echo "<option value='$sub_topic[sub_topic_id]'>
                                    $sub_topic[category_name] - $sub_topic[subcategory_name] - $sub_topic[topic_name]
                                    </option>";
                                }
                                ?>
                            </select>
                        </div><br>
                        <!-- Input course target -->
                        <div class="ckediter-textarea">
                            <h5>Course Target</h5>
                            <textarea name="course_target" class="form-control ckeditor" rows="5"></textarea>
                        </div><br>
                        <!-- Input course description -->
                        <div class="ckediter-textarea">
                            <h5>Course Description</h5>
                            <textarea name="course_description" class="form-control ckeditor" rows="10"></textarea>
                        </div><br>
                        <!-- Input course cover img-->
                        <div class="row">
                            <h5>Course cover image</h5>
                            <input name="course_img" class="form-control" type="file" id="formFile">
                        </div><br>

                        <input class="btn btn-success w-30" type="submit" value="Create" name="create_course"><br><br>
                    </form>
                    <!-- FORM CONTROL -->
                    <?php
                    if (isset($_POST['create_course'])) {
                        $course_name = $_POST['course_name'];
                        $course_title = $_POST['course_title'];
                        $language_id = $_POST['language'];
                        $sub_topic_id = $_POST['sub_topic'];
                        $course_target = $_POST['course_target'];
                        $course_description = $_POST['course_description'];
                        require abs_path('db/db_connect.php');
                        // fix sql injection error with '
                        $course_target = mysqli_real_escape_string($conn, $course_target);
                        $course_description = mysqli_real_escape_string($conn, $course_description);

                        if ($_FILES['course_img']['name'] != "") {
                            $file = $_FILES['course_img'];
                            $new_file_name = date('dmYHis') . $file["name"];
                            $folder = 'img/course';
                            $file_types = array('jpg', 'png', 'jpeg', 'gif');
                            upload_file($file, $new_file_name, $folder, $file_types);

                            $sql = "INSERT INTO `course`(`course_name`, `course_title`, `course_target`, `course_description`, `course_img`, `language_id`, `user_id`, `sub_topic_id`) 
                                VALUES ('$course_name','$course_title','$course_target','$course_description','$new_file_name','$language_id',$CURRENT_USER_INFOR[user_id],$sub_topic_id)";

                            // mysqli_query($conn, $sql);
                            excute($sql);
                        } else {
                            $sql = "INSERT INTO `course`(`course_name`, `course_title`, `course_target`, `course_description`, `course_img`, `language_id`, `user_id`, `sub_topic_id`) 
                                VALUES ('$course_name','$course_title','$course_target','$course_description',NULL,'$language_id',$CURRENT_USER_INFOR[user_id],$sub_topic_id)";

                            // mysqli_query($conn, $sql);
                            excute($sql);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer></footer>
    </div>

    <!-- SIDEBAR -->
    <?php require abs_path('teacher/layout/sidebar.php'); ?>
</body>
<script>
    ClassicEditor.defaultConfig = {
        toolbar: ['heading', '|', 'bold', 'italic', 'custombutton', 'BlockQuote', 'undo',
            'redo', 'link', 'bulletedList', 'numberedList', 'indent'
        ],

        // This value must be kept in with the language defined in webpack.config.js.
        language: 'en'
    };



    // CKEditer select class
    window.editors = {};

    document.querySelectorAll('.ckeditor').forEach((node, index) => {
        ClassicEditor
            .create(node, {})
            .then(newEditor => {
                window.editors[index] = newEditor
            });
    })
</script>

</html>