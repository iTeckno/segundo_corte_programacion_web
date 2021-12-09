<?php
include 'connect.php';

if ($resultado = pg_query($con, "DELETE FROM mediciones WHERE id = '{$_GET['id']}'")) {
    header('Location: pozos_petroleros.php');
} else {
    $_SESSION['msg'] = pg_last_error($con);
    header('Location: pozos_petroleros.php');
}

die;
