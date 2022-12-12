<?php
    // The function excutes select query types
    function executeResult($sql, $onlyOne = false) {
        require "db_connect.php";
        mysqli_set_charset($conn, 'utf8');
        $result = $conn->query($sql);

        if ($onlyOne) {
            $data = $result->fetch_assoc();
        } else {
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // store the rows of the database into the $data array 
                    $data[] = $row;
                }
            }
        }
        return $data;

        $conn->close();
    }

    // The function excutes insert, delete and update types
    function excute($sql) {
        require "db_connect.php";
        mysqli_set_charset($conn, 'utf8');

        // Excute the query
        mysqli_query($conn, $sql);
    }
?>