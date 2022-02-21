<?php

// Including init file
require "bootstrap/init.php";

// Checking if user wants to delete a folder and calling it's function
if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $delete_folder = Delete_folder($_GET['delete_folder']);
}

// Getting folders from database
$folders = Get_folders();

// Including index file from tpl folder
require "tpl/tpl-index.php";
