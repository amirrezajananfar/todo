<?php

// Including init file
require "bootstrap/init.php";

// Cheking if user logged in
if (!Is_User_Logged_in()) {
    redirect(Site_url('auth.php'));
}

// Checking if user wants to delete a folder and calling it's function
if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $delete_folder = Delete_folder($_GET['delete_folder']);
}

// Checking if user wants to delete a task and calling it's function
if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    // Getting selectd folder url
    $referer_url = $_SERVER['HTTP_REFERER'];
    $delete_task = Delete_task($_GET['delete_task']);
    // Prevent of changing current url
    redirect($referer_url);
}

// Getting folders from database
$folders = Get_folders();

// Getting tasks from database
$tasks = Get_tasks();

// Including index file from tpl folder
require "tpl/tpl-index.php";
