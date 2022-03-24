<?php

// Including init file
require "bootstrap/init.php";

// Checking if one of the forms submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $user_information = $_POST;
    if ($action == 'register') {
        $auth_result = User_register(
            $user_information['username'],
            $user_information['useremail'],
            $user_information['userpassword']
        );
        // Alert inserted information has been submitted
        echo '
            <div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
                اطلاعات کاربر وارد شده با موفقیت ثبت گردید
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    } else if ($action == 'login') {
        $auth_result = User_login(
            $user_information['useremail'],
            $user_information['userpassword']
        );
        if (!$auth_result) {
            // Alert the problem while logging in
            echo '
                <div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
                    متاسفانه ایمیل و یا رمز عبور به درستی وارد نشده است!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            // if user exist & everything was correct redirect user into it's panel
            redirect(Site_url());
        }
    }
}

// Including auth file from tpl folder
require "tpl/tpl-auth.php";
