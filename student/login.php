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
    <title>Courses4U | Login</title>
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
        $sql = "SELECT email, password FROM user WHERE email = '$email'";
        $result = $conn->query($sql);

        // Check email exists or not
        if ($result->num_rows == 0) {
            echo "<script>alert('This email is not registered!');</script>";
        } else {
            // Row is currently at email = $email, then get the password
            $row = $result->fetch_assoc();
            if ($password == $row['password']) {
                // Save email session before page redirect
                $_SESSION['email'] = $email;
                $_SESSION['role_id'] = $row['role_id'];
                header("Location: index.php");
            } else {
                echo "<script>alert('The password you entered is incorrect!');</script>";
            }
        }
    };
    ?>

    <!-- NAVBAR -->
    <?php require abs_path('student/layout/nav.php'); ?>

    <div class="form-wrapper">
        <h4 class="form-wrah4per__title"><b>Log in to your Courses4U account</b></h4>
        <form method="POST">
            <div class="mb-3"><input class="form-control" type="text" name="email" placeholder="Email" required></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <p style="text-align:center">Or <a href="#">Forgot Password</a></p>
            <input class="form-submit" type="submit" value="Login" name="login">
        </form>
        <p style="text-align:center; margin-top: 1vw;">Don't have an account? <a href="./register.php"><b>Sign up</b></a>
        <p>
    </div>

    <!-- FOOTER -->
    <?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>