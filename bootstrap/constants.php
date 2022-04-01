<?php

// Program title
define('PROGRAM_TITLE', 'مدیریت کارهای روزانه');

// Program base url
$program_uri_name = '/todo/'; // It can be changed
$program_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $program_uri_name;
define('BASE_URL', $program_url);

// Program base url
$program_folder_name = '/todo/'; // It can be changed
$program_path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . $program_folder_name;
define('BASE_PATH', $program_path);
