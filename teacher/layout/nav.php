<?php
session_start();
if (isset($_SESSION['email']) AND $_SESSION['role_id']==2) {
    $CURRENT_USER_EMAIL = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE email = '$CURRENT_USER_EMAIL'";
    $CURRENT_USER_INFOR = executeResult($sql, $onlyOne = true);
} else {
    unset($_SESSION['email']);
    $login_url = abs_url('teacher/login.php');
    header("location: $login_url");
}
?>

<nav class="fixed-top top-0 end-0">
    <!-- Nav elements pc -->
    <div class="nav__elements--pc">
        <div>
            <a href=<?= abs_url('teacher/index.php') ?> class="on-hover">Courses4U</a>
            <label class="nav_logo--vline"> | </label>
            <a href="" class="on-hover">Teacher</a>
        </div>
        <div>
            <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                if ($CURRENT_USER_INFOR['avatar'] == NULL) { ?>
                    <img src="<?= abs_url('assets/img/default_avatar.jpeg') ?>" class="rounded-circle" alt="Courses4U" width="50px">
                <?php } else { ?>
                    <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="50px">
                <?php } ?>
            </a>
            <!-- begin drop down avt icon -->
            <ul class="dropdown-menu dropdown-menu-dark">
                <li class="dropdown-header border-bottom">
                    <?php
                    if ($CURRENT_USER_INFOR['avatar'] == NULL) { ?>
                        <img src="<?= abs_url('assets/img/default_avatar.jpeg') ?>" class="rounded-circle" alt="Courses4U" width="50px">
                    <?php } else { ?>
                        <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="50px">
                    <?php } ?>
                    <label><?= $CURRENT_USER_EMAIL ?></label>
                </li>
                <li><a class="dropdown-item" href=<?= abs_url('teacher/profile.php') ?>>Edit Profile</a></li>
                <li><a class="dropdown-item" href=<?= abs_url('teacher/logout.php') ?>>Logout</a></li>
            </ul>
            <!-- end drop down avt icon -->
        </div>
    </div>
    <!-- Nav elements mb -->
    <div class="nav__elements--mb">
        <!-- btn drop down avt icon -->
        <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if ($CURRENT_USER_INFOR['avatar'] == NULL) { ?>
                <img src="<?= abs_url('assets/img/default_avatar.jpeg') ?>" class="rounded-circle" alt="Courses4U" width="50px">
            <?php } else { ?>
                <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="50px">
            <?php } ?>
        </a>
        <!-- begin drop down avt icon -->
        <ul class="dropdown-menu dropdown-menu-dark">
            <li class="dropdown-header border-bottom">
                <?php
                if ($CURRENT_USER_INFOR['avatar'] == NULL) { ?>
                    <img src="<?= abs_url('assets/img/default_avatar.jpeg') ?>" class="rounded-circle" alt="Courses4U" width="50px">
                <?php } else { ?>
                    <img src="<?= abs_url('assets/img/avatar/' . $CURRENT_USER_INFOR['avatar']) ?>" class="rounded-circle" alt="Courses4U" width="50px">
                <?php } ?>
                <label><?= $CURRENT_USER_EMAIL ?></label>
            </li>
            <li><a class="dropdown-item" href=<?= abs_url('teacher/profile.php') ?>>Edit Profile</a></li>
            <li><a class="dropdown-item" href=<?= abs_url('teacher/logout.php') ?>>Logout</a></li>
        </ul>
        <!-- end drop down avt icon -->
        <a href=<?= abs_url('teacher/index.php') ?> class="on-hover">Courses4U</a>
        <!-- Button offcanvas -->
        <a class="nav__btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-align-justify"></i></a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasRightLabel">Dashboard</h3>
                <button type="button" class="btn-close ms-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Course
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-collapse__elements">
                                <a href="">My course</a>
                                <a href="">Create new course</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Comunication
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-collapse__elements">
                                <a href="">Q&A</a>
                                <a href="">Messeages</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Performance
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-collapse__elements">
                                <a href="">Students</a>
                                <a href="">Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>