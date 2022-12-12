<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";

require abs_path('student/HIEU/db/db_helper.php');

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

    <style>
        .grid-4column {
            display: grid;
            padding: 50px;
            grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
            column-gap: 1%;
            row-gap: 30px;
            font-size: 1.5em;
        }

        .grid-4column__title {
            margin-top: 3%;
            grid-column: 1/-1;
            /* text-align: center; */
            font-size: 2em;
        }

        .grid-4column__box--color1 {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            width: 100%;
            min-height: 25vh;
            text-align: center;
            background-image: linear-gradient(to bottom right, #1b76ab, #f05053, #F56217);
            color: aliceblue;
        }

        .grid-4column__box--color2 {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            width: 100%;
            min-height: 25vh;
            word-wrap: break-word;
            text-align: center;
            background-image: linear-gradient(to bottom right, #e96443, #904e95);
            color: aliceblue;
        }

        .grid-4column__box--color3 {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            width: 100%;
            min-height: 25vh;
            word-wrap: break-word;
            text-align: center;
            background-image: linear-gradient(to bottom right, #FC466B, #3F5EFB);
            color: aliceblue;
        }

        .grid-4column__box--color4 {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            width: 100%;
            min-height: 25vh;
            text-align: center;
            background-image: linear-gradient(to bottom right, #03001e, #7303c0, #ec38bc);
            color: aliceblue;
        }

        .grid-4column__box--color5 {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            width: 100%;
            min-height: 25vh;
            text-align: center;
            background-image: linear-gradient(to bottom right, #37638f, #FD746C);
            color: aliceblue;
        }

        .paragraph {
            padding-top: 1em;
            padding-bottom: 1em;
        }

        div#card3 {
            width: 25vw;
            margin-right: 8%;
            margin-left: 8%;
        }

        div#card2__left {
            width: 25vw;
            margin-left: 29.5%;
            margin-right: 14.9%;
        }

        div#card2__right {
            width: 25vw;
            margin-left: 14.9%;
            margin-right: 29.5%;
        }

        div#card1 {
            width: 25vw;
            margin-left: 36%;
            margin-right: 36%;
        }

        .rating__star {
            cursor: pointer;
            color: orange;
        }

        .grid-4column__box {
            display: grid;
            grid-template-rows: 1fr 18vh 18vh;
            width: 100%;
            min-height: 25vh;
            color: black;
        }

        a {
            text-decoration: none;
        }

        .grid-4column__box--img {
            text-align: center;
            width: 100%;
            color: black;
            padding-top: 20px;
        }

        .grid-4column__box--name {
            text-decoration: none;
            color: black;
        }

        .grid-4column__box--inf {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            grid-template-rows: 19% 25% 25% 25%;
        }

        .grid-4column__box--inf--meter {
            grid-column: 1/-1;
        }

        .grid-4column__box--inf--name {
            grid-column: 1/-1;
        }

        .grid-4column__box--inf-left {
            color: black;
        }

        .grid-4column__box--inf-right {
            text-align: right;
            color: black;
        }


        .fa-star-o {
            color: orange
        }

        .checked {
            color: orange;
        }
    </style>
</head>


<body>

    <!-- BODY -->
    <div class="grid-4column">
        <div class="grid-4column__title">
            My learning
        </div>
        <?php
        if (isset($_SESSION['email'])) {
            $sql_process = "SELECT user_id, course_id, process FROM course_student WHERE user_id = (SELECT user_id FROM user WHERE email =  '" . $CURRENT_USER_EMAIL . "')";
            $process_course = executeResult($sql_process);
            $course_id = [];
            $process = [];


            foreach ($process_course as $value) {
                $course_id[] = $value['course_id'];
                $process[] = $value['process'];
            }
            foreach ($course_id as $key => $value) {
                $sql_course = "SELECT user_id, course_id, course_name, course_img FROM course WHERE course_id = '" . $value . "'";
                $infor_course = executeResult($sql_course);
                $sql_user = "SELECT real_name FROM user WHERE user_id = '" . $infor_course[0]['user_id'] . "'";
                $infor_user = executeResult($sql_user);
                $process_course[$key]['course_name'] = $infor_course[0]['course_name'];
                $process_course[$key]['course_img'] = $infor_course[0]['course_img'];
        ?>
                <div class="grid-4column__box">
                    <a href=<?= abs_url('student/learning/course.php?course_id=' . $infor_course[0]['course_id']) ?>>
                        <div class="grid-4column__box--img">
                            <img src="<?= abs_url('assets/img/course/' . $infor_course[0]['course_img']); ?>" width=100% alt="">
                        </div>
                        <div class="grid-4column__box--name">
                            <em>
                                <?php echo ($infor_course[0]['course_name']) ?>
                            </em>
                        </div>
                    </a>
                    <div class="grid-4column__box--inf">
                        <div class="grid-4column__box--inf--name">
                            <p style="font-size:15px">
                                <?php echo ($infor_user[0]['real_name']) ?>
                            </p>
                        </div>
                        <div class="grid-4column__box--inf--meter">
                            <meter style="width:100%" value="<?php echo ($process[$key]); ?>" min="0" max="1"></meter>
                        </div>
                        <div class="grid-4column__box--inf-left">
                            <p style="font-size:11px">
                                <?php echo ($process[$key]) * 100; ?>% complete
                            </p>
                        </div>
                        <div></div>
                        <div class="grid-4column__box--inf-right">
                            <div style="height:100%;font-size:15px">
                                <?php
                                $sql_rate = "SELECT * FROM course_rate WHERE user_id = (SELECT user_id FROM user WHERE email =  '" . $CURRENT_USER_EMAIL . "') AND course_id = '" . $value . "'";
                                $rate = executeResult($sql_rate);
                                if ($rate != []) {
                                    for ($i = 0; $i < $rate[0]['rate']; $i++) {
                                        echo "<span class='fa fa-star checked'></span>";
                                    }
                                    for ($i = 0; $i < 5 - $rate[0]['rate']; $i++) {
                                        echo "<span class='fa fa-star-o '></span>";
                                    } ?>
                                    <br><a data-bs-toggle="modal" data-bs-target="#rating<?= $infor_course[0]['course_id'] ?>" style="font-size:11px;background-color:white;border:none;">
                                        edit your rating
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="rating<?= $infor_course[0]['course_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">How would you rate this
                                                        course?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="./db/insert_change_my_learning.php" method="post">
                                                    <div class="modal-body" style="text-align: center">
                                                        <input type="radio" style='font-size:32px' name="rating_value" value="5">
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <br><input type="radio" style='font-size:32px' name="rating_value" value="4">
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <br><input type="radio" style='font-size:32px' name="rating_value" value="3">
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <br><input type="radio" style='font-size:32px' name="rating_value" value="2">
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <br><input type="radio" style='font-size:32px' name="rating_value" value="1">
                                                        <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <br><input type="radio" style='font-size:32px' name="rating_value" value="0">
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                        <input type="hidden" name="course_id" value="<?= $infor_course[0]['course_id'] ?>">
                                                        <textarea rows=10 cols=50 name="content" required><?= $rate[0]['content'] ?></textarea>
                                                        <input type="hidden" name="user_id" value="<?= $infor_course[0]['user_id'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button submit" class="btn btn-secondary" name="delete">Delete</button>
                                                        <button type="button submit" name="form_submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php } else {
                                    for ($i = 0; $i < 5; $i++) {
                                        echo "<span class='fa fa-star-o'></span>";
                                    } ?>
                            <a data-bs-toggle="modal" data-bs-target="#rating<?= $infor_course[0]['course_id'] ?>" style="font-size:11px;background-color:white;border:none;">
                                rating
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="rating<?= $infor_course[0]['course_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">How would you rate this course?
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="db/insert_change_my_learning.php" method="post">
                                            <div class="modal-body" style="text-align: center">
                                                <input type="radio" style='font-size:32px' name="rating_value" value="5">
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <br><input type="radio" style='font-size:32px' name="rating_value" value="4">
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <br><input type="radio" style='font-size:32px' name="rating_value" value="3">
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <br><input type="radio" style='font-size:32px' name="rating_value" value="2">
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <br><input type="radio" style='font-size:32px' name="rating_value" value="1">
                                                <div style='font-size:32px' class='rating__star fa fa-star checked'></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <br><input type="radio" style='font-size:32px' name="rating_value" value="0">
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <div style='font-size:32px' class='rating__star fa fa-star-o '></div>
                                                <input type="hidden" name="course_id" value="<?= $infor_course[0]['course_id'] ?>">
                                                <textarea rows=10 cols=50 name="content" required></textarea>
                                                <input type="hidden" name="user_id" value="<?= $process_course[0]['user_id'] ?>">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button submit" name="form_submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
    </div>
<?php } ?>


<?php } ?>
</div>
</div>



<!-- FOOTER -->
<?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>