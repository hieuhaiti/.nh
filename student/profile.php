<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";
require abs_path('db/db_helper.php');
require abs_path('helpers/upload_file.php');
require abs_path('helpers/delete_file.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses4U | Register</title>
    <!-- Import css & script link -->
    <?php require abs_path('student/layout/css_link.php'); ?>
    <link rel="stylesheet" href=<?= abs_url('assets/css/form.css') ?>>
</head>

<body>
    <!-- NAVBAR -->
    <?php require abs_path('student/layout/nav.php'); ?>

    <div class="form-wrapper">
        <h4 class="form-wrah4per__title"><b>Update Profile</b></h4>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <!-- Full Name -->
                <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="full_name" id="full_name" value="<?= $CURRENT_USER_INFOR['real_name'] ?>">
                </div>
                <br><br>
                <!-- email -->
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="<?= $CURRENT_USER_INFOR['email'] ?>">
                </div>
                <br><br>
                <!-- password -->
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="<?= $CURRENT_USER_INFOR['password'] ?>">
                </div>
                <br><br>
                <!-- phone -->
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone_number" id="phone" value="<?= $CURRENT_USER_INFOR['phone_number'] ?>">
                </div>
                <br><br>
                <!-- Avatar -->
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>
                <br><br><br>
                <!-- submit -->
                <input class="form-submit" type="submit" value="Update" name="update_profile">
            </div>
        </form>
        <?php
        if (isset($_POST['update_profile'])) {
            // Delete the old file
            $path = 'img/avatar/' . $CURRENT_USER_INFOR['avatar'];
            delete_file($path);

            $real_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];

            if (isset($_FILES['avatar'])) {
                $file = $_FILES['avatar'];
                $new_file_name = date('dmYHis') . $file["name"];
                $folder = 'img/avatar';
                $file_types = array('jpg', 'png', 'jpeg', 'gif');
                upload_file($file, $new_file_name, $folder, $file_types);

                require abs_path('db/db_connect.php');
                // fix sql injection error with '
                $new_file_name = mysqli_real_escape_string($conn, $new_file_name);

                $sql = "UPDATE `user` SET `real_name`='$real_name',`email`='$email',`password`='$password',`phone_number`='$phone_number',`avatar`='$new_file_name'
                            WHERE user_id=$CURRENT_USER_INFOR[user_id]";

                excute($sql);
            }
        }
        ?>
    </div>

    <!-- FOOTER -->
    <?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>