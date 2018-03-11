<?php

// $database = file_get_contents("../config/database.php");

ob_start();
include "../config/database.php";
$database = ob_get_clean();
ob_end_clean();

echo $database;

