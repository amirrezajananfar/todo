<?php

// Declaring a function to get the folders from database
function Get_folders()
{
    global $pdo;
    $current_user_id = Get_Current_User_id();
    $sql = "SELECT * FROM folders WHERE user_id = $current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

// Declaring a function to delete folder from database
function Delete_folder($folder_id)
{
    global $pdo;
    $sql = "DELETE FROM folders WHERE id = $folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

// Declaring a function to add folder into database
function Add_folder($folder_name)
{
    global $pdo;
    $current_user_id = Get_Current_User_id();
    $sql = "INSERT INTO folders (name, user_id) VALUES (:folder_name, :user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':folder_name' => $folder_name, ':user_id' => $current_user_id]);
    return $pdo->lastInsertId();
}
