<?php

// Including init file
require_once '../bootstrap/init.php';

// Cheking if request is ajax
if (!Is_Ajax_request()) {
    Die_page("درخواست به صورت ایجکس نمی باشد");
}

// Putting some of sent information in a special variable
$task_id = $_POST['task_id'];

// Checking if task id set
if (!isset($task_id) || !is_numeric($task_id)) {
    echo "آیدی تسک معتبر نمی باشد";
    die();
}

// Cheking is action valid and update task situation
if ($_POST['action'] != 'switch_situation') {
    echo Json_message('عملیات معتبر نمی باشد');
    die();
} else {
    $update_task = Update_Task_situation($task_id);
}
