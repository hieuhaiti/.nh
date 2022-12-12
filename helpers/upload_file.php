<?php
/*
        [file] => Array
        (
            [name] => tên file khi upload
            [type] => text/plain  (kiểu nội dung file text)
            [tmp_name] => vị trí lưu file tạm thời trên server.
            [error] => UPLOAD_ERR_OK (= 0 là không lỗi)
            [size] => (kích thước file - byte)
        )
    */
// for file upload required to use method = POST
function upload_file($file, $file_name, $folder, $allow_file_types, $max_file_size = 8000000)
{
    $folder_path = abs_path('assets/') . $folder . '/';
    $file_path = $folder_path . $file_name;
    $allowUpload = true;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION)); // Get file extension


    // Check file size default 8MB
    if ($file["size"] > $max_file_size) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $allowUpload = false;
    }

    // Allow certain file formats
    if (!in_array($file_type, $allow_file_types)) {
        echo "<script>alert('You can only upload these types of files JPG, PNG, JPEG, GIF')</script>";
        $allowUpload = false;
    }

    if ($allowUpload) {
        // Move the temporary file to the directory to be stored, using the move_uploaded_file . function
        move_uploaded_file($file["tmp_name"], $file_path);
    }
};
?>