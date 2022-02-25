<?php

// Including init file
require_once '../bootstrap/init.php';

// Cheking if request is ajax
if (!Is_Ajax_request()) {
    Die_page("درخواست به صورت ایجکس نمی باشد");
}

// Cheking if action set or not
if (!isset($_POST['action']) || empty($_POST['action'])) {
    echo Json_message('عملیاتی تنظیم نشده است');
    die();
}

// Putting some of sent information in a special variable
$task_title = $_POST['task_title'];
$folder_id = $_POST['folder_id'];

// Cheking if user insert title of the task
if (empty($folder_id)) {
    echo Json_message('یک پوشه جهت ایجاد تسک انتخاب کنید');
    die();
}

// Cheking if user insert title of the task
if (!isset($task_title) || strlen($task_title) < 1) {
    echo Json_message('تسک مدنظر خود را بنویسید');
    die();
}

// Cheking is action valid and add task into database
if ($_POST['action'] != 'add_task') {
    echo Json_message('عملیات معتبر نمی باشد');
    die();
} else {
    $add_task = Add_task($task_title, $folder_id);
    function Last_Inserted_task()
    {
        global $pdo, $add_task, $folder_id;
        $current_user_id = Get_Current_User_id();
        $sql = "SELECT * FROM tasks WHERE user_id = $current_user_id AND id = $add_task AND folder_id = $folder_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;
    };
    $last_inserted_task = Last_Inserted_task();
    echo json_encode($last_inserted_task);
}
