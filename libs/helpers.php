<?php

defined('BASE_PATH') or die('شما دسترسی لازم برای ورود به این بخش را نداری!');

// Declaring site url function
function Site_url($uri = '')
{
    return BASE_URL . $uri;
}

// Declaring site path function
function Site_path($path = '')
{
    return BASE_PATH . $path;
}

// Declaring program title
function Program_title($title = "")
{
    if (strlen($title) > 0) {
        return PROGRAM_TITLE . " - $title";
    } else {
        return PROGRAM_TITLE;
    }
}

// Declaring redirection
function redirect($url)
{
    header("Location: $url");
}

// Declaring die page
function Die_page($msg)
{
    echo '<div style="padding: 15px;margin: 50px 100px;text-align: center;border: 1px solid transparent;border-radius: 4px;background-color: #f2dede;border-color: #ebccd1;color: #a94442;">' . $msg . '</div>';
    die();
}

// Declaring success msg
function Success_msg($msg)
{
    echo '<div style="padding: 15px;margin: 50px 100px;text-align: center;border: 1px solid transparent;border-radius: 4px;background-color: #dff0d8;border-color: #d6e9c6;color: #3c763d;">' . $msg . '</div>';
}

// Declaring is the sent request ajax
function Is_Ajax_request()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

// Declaring die & dump function
function dd($variable)
{
    echo '<pre style="position: relative;z-index: 999;margin: 10px;padding: 10px;color: #750822;background-color: #fff;border-left: 3px solid #750822;border-radius: 5px;">';
    var_dump($variable);
    echo '</pre>';
}

// Declaring making json messages function
function Json_message($msg)
{
    $json_msg = json_encode($msg);
    return $json_msg;
}

// Declaring a function to check if input language persian or arabic
function Is_arabic($userinput)
{
    return preg_match('/^\p{Arabic}*$/u', $userinput);
}

// Declaring a function to check user password strength
function Is_Password_strength($userpassword)
{
    if (strlen($userpassword) <= '8') {
        $userpassword_error = "رمز عبور باید حداقل حاوی 8 کاراکتر باشد!";
        return $userpassword_error;
        die();
    } else if (!preg_match("#[0-9]+#", $userpassword)) {
        $userpassword_error = "رمز عبور باید حداقل حاوی یک کاراکتر عددی باشد!";
        return $userpassword_error;
        die();
    } else if (!preg_match("#[A-Z]+#", $userpassword)) {
        $userpassword_error = "رمز عبور باید حاوی حروف بزرگ باشد!";
        return $userpassword_error;
        die();
    } else if (!preg_match("#[a-z]+#", $userpassword)) {
        $userpassword_error = "رمز عبور باید حاوی حروف کوچک باشد!";
        return $userpassword_error;
        die();
    } else if (Is_arabic($userpassword)) {
        $userpassword_error = "از زبان انگلیسی برای رمز عبور خود استفاده کنید!";
        return $userpassword_error;
        die();
    }
}

// Declaring a function to check is user email valid
function Is_Email_valid($useremail)
{
    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        $useremail_error = "آدرس ایمیل معتبر نمی باشد";
        return $useremail_error;
        die();
    }
}
