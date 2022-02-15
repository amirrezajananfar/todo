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
    return PROGRAM_TITLE . " - $title";
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
