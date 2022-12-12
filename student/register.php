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
    <title>Courses4U | Register</title>
    <!-- Import css & script link -->
    <?php require abs_path('student/layout/css_link.php'); ?>
    <link rel="stylesheet" href=<?= abs_url('assets/css/form.css') ?>>
</head>

<body>
    <?php
    if (isset($_POST['register'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_number = $_POST['phone_number'];

        require abs_path('db/db_connect.php');
        // Check email already exists
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            // If the email already exists, check the phone number 
            $sql = "SELECT phone_number FROM user WHERE phone_number = $phone_number";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                // Phone number does not exist, insert data
                $sql = "INSERT INTO user (real_name, email, password, phone_number) VALUES (N'$full_name', '$email', '$password', $phone_number)";
                excute($sql);
                header("Location: login.php");
            } else {
                echo "<script>alert('This phone number already exists!');</script>";
            }
        } else {
            echo "<script>alert('This email already existst!');</script>";
        }
    }
    ?>

    <!-- NAVBAR -->
    <?php require abs_path('student/layout/nav.php'); ?>

    <div class="form-wrapper">
        <h4 class="form-wrah4per__title"><b>Sign up and start learning</b></h4>
        <form method="POST">
            <div class="mb-3"><input class="form-control" type="text" name="full_name" placeholder="Full Name" required></div>
            <div class="mb-3"><input class="form-control" type="phone" name="email" placeholder="Email" required></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="mb-3"><input class="form-control" type="number" name="phone_number" placeholder="Phone Number" required></div>
            <p style="text-align:center">By signing up, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
            <input class="form-submit" type="submit" value="Register" name="register">
        </form>
        <p style="text-align:center; margin-top: 1vw;">Already have an account <a href="./login.php"><b>Login</b></a>
        <p>
    </div>

    <!-- FOOTER -->
    <?php require abs_path('student/layout/footer.php'); ?>
</body>

</html>