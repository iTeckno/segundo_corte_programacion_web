<?php
include 'connect.php';

if (strlen($_POST['locacion']) == 0) {
    $_SESSION['msg'] = 'Locación inválida';
    header('Location: pozos_petroleros.php');
    die;
}

if ($resultado = pg_query($con, "INSERT INTO pozos_petroleros (locacion) VALUES ('{$_POST['locacion']}')")) {
    header('Location: pozos_petroleros.php');
} else {
    $_SESSION['msg'] = pg_last_error($con);
    header('Location: pozos_petroleros.php');
}

die;

