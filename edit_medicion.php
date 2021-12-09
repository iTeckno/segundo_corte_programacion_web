<?php
include 'connect.php';

if ($resultado = pg_query($con, "UPDATE mediciones SET medicion = '{$_POST['medicion']}', fecha = '{$_POST['fecha']}' WHERE id = '{$_POST['id']}'")) {
    header('Location: pozos_petroleros.php');
} else {
    $_SESSION['msg'] = pg_last_error($con);
    header('Location: pozos_petroleros.php');
}

die;

