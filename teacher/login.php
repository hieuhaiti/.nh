<!-- Load helper files -->
<?php
require "C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/config.php";

require abs_path('db/db_helper.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses4U | Teacher-Login</title>
    <!-- Import css & script link -->
    <?php require abs_path('student/layout/css_link.php'); ?>
    <link rel="stylesheet" href=<?= abs_url('assets/css/form.css') ?>>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['email'])) {
        header('location: index.php');
    }
    ?>

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require abs_path('db/db_connect.php');
        $sql = "SELECT email, password, role_id FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // Check email exists or not
        if (($result->num_rows == 0) || ($row['role_id'] != 2)) {
            echo "<script>alert('This email is not registered!');</script>";
        } else {
            // Row is currently at email = $email, then get the password
            if ($password == $row['password']) {
                // Save email session before page redirect
                $_SESSION['role_id'] = $row['role_id'];
                $_SESSION['email'] = $email;
                header("Location: index.php");
            } else {
                echo "<script>alert('The password you entered is incorrect!');</script>";
            }
        }
    };
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Course4U | Teacher</a>
        </div>
    </nav>

    <div class="form-wrapper">
        <h4 class="form-wrah4per__title"><b>Login to the teacher page</b></h4>
        <form method="POST">
            <div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Email" required></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <p style="text-align:center">Or <a href="#">Forgot Password</a></p>
            <input class="form-submit" type="submit" value="Login" name="login">
        </form>
    </div>

    <!-- FOOTER -->
    <?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>