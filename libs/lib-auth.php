<?php

// Getting current user
function Get_Current_User_id()
{
    return Get_Logged_In_user()->id ?? null;
}

// Submmiting inserted user
function User_register($username, $useremail, $userpassword)
{
    global $pdo;
    // Checking submitted data
    if (empty($username) && empty($useremail) && empty($userpassword)) {
        $input_error = "هیچ یک از مقادیر ورودی نمی توانند خالی باشند";
        echo $input_error;
        die();
    } else {
        // Checking if useremail valid
        echo Is_Email_valid($useremail);
        // Checking if userpassword good & safe
        echo Is_Password_strength($userpassword);
    }
    $hashed_password = password_hash($userpassword, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:username, :useremail, :userpassword)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username, ':useremail' => $useremail, ':userpassword' => $hashed_password]);
    return $stmt->rowCount() ? true : false;
}

// checking is user logged in
function Is_User_Logged_in()
{
    return isset($_SESSION['login']) ? true : false;
}

// Getting logged in user
function Get_Logged_In_user()
{
    return $_SESSION["login"] ?? null;
}

// Getting inserted user if exist
function Get_User_By_email($useremail)
{
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :useremail";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':useremail' => $useremail]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records[0] ?? null;
}

// logging user into it's panel
function User_login($useremail, $userpassword)
{
    $user = Get_User_By_email($useremail);
    if (is_null($user)) {
        return false;
    }
    // Check the inserted password
    if (password_verify($userpassword, $user->password)) {
        // Set a session if email & password is correct
        $_SESSION['login'] = $user;
        return true;
    }
    return false;
}

// Logging out the user fron it's panel
function User_logout()
{
    unset($_SESSION["login"]);
}
