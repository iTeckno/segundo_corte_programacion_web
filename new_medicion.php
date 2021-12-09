<?php
include 'connect.php';

if ($resultado = pg_query($con, "INSERT INTO mediciones (medicion, fecha, pozo) VALUES ('{$_POST['medicion']}', '{$_POST['fecha']}', '{$_POST['pozo']}')")) {
    header('Location: pozos_petroleros.php');
} else {
    $_SESSION['msg'] = pg_last_error($con);
    header('Location: pozos_petroleros.php');
}

die;

