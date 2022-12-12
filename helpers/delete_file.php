<?php

function delete_file($path) {
    $full_path = abs_path('assets/') . $path;
    if (file_exists($full_path)) {
        // @ in PHP, @ will suppress any error
        @unlink($full_path);
    } else {
        echo "<script>alert('File does not exist!)</script>";
    }
}
?>