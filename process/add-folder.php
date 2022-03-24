<?php

// Including init file
require_once '../bootstrap/init.php';

// Cheking if request is ajax
if (!Is_Ajax_request()) {
    Die_page('درخواست به صورت ایجکس نمی باشد');
}

// Cheking if action set or not
if (!isset($_POST['action']) || empty($_POST['action'])) {
    echo Json_message('عملیاتی تنظیم نشده است');
    die();
}

// Cheking if user insert name of the folder
if (!isset($_POST['folder_name']) || strlen($_POST['folder_name']) < 1) {
    echo Json_message('نام پوشه مدنظر خود را بنویسید');
    die();
}

// Cheking is action valid and add folder into database
if ($_POST['action'] != 'add_folder') {
    echo Json_message('عملیات معتبر نمی باشد');
    die();
} else {
    $add_folder = Add_folder($_POST['folder_name']);
    // Getting last inserted folder to show
    function Last_Inserted_folder()
    {
        global $pdo, $add_folder;
        $current_user_id = Get_Current_User_id();
        $sql = "SELECT * FROM folders WHERE user_id = $current_user_id AND id = $add_folder";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $records;
    };
    $last_inserted_folder = Last_Inserted_folder();
    // Sending data as json for ajax
    echo json_encode($last_inserted_folder);
}
