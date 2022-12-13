<?php
function abs_url($path)
{
    return 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/HUMG_A1_EXAM/coures4u/' . $path;
}

function abs_path($path)
{
    return 'C:/xampp/htdocs/HUMG_A1_EXAM/coures4u/' . $path;
}
?>
hieu