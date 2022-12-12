<?php 
    $severname = "localhost";
    $user_name = "root";
    $pass_word = ""; // No password
    $db = "humg_course4u";
    // Create connnection
    $conn = new mysqli($severname, $user_name, $pass_word, $db);
    // Check connnection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>