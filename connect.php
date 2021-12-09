<?php 
session_start();
$con = pg_connect(getenv('DATABASE_URL')) or exit("ERROR");