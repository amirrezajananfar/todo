<?php

// Declaring a function to get the tasks from database
function Get_tasks()
{
    global $pdo;
    $current_user_id = Get_Current_User_id();
    $current_folder_id = $_GET['folder_id'] ?? null;
    $folder_id = '';
    if (isset($current_folder_id) && is_numeric($current_folder_id)) {
        $folder_id = "AND folder_id = $current_folder_id";
    }
    $sql = "SELECT * FROM tasks WHERE user_id = $current_user_id $folder_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

// Declaring a function to delete task from database
function Delete_task($task_id)
{
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id = $task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}

// Declaring a function to add task into database
function Add_task($task_title, $folder_id)
{
    global $pdo;
    $current_user_id = Get_Current_User_id();
    $sql = "INSERT INTO tasks (title, user_id, folder_id) VALUES (:title, :user_id, :folder_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title' => $task_title, ':user_id' => $current_user_id, ':folder_id' => $folder_id]);
    return $pdo->lastInsertId();
}

// Declaring a function to update task situation
function Update_Task_situation($task_id)
{
    global $pdo;
    $current_user_id = Get_Current_User_id();
    $sql = "UPDATE tasks set is_done = 1 - is_done WHERE user_id = :user_id AND id = :task_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':user_id' => $current_user_id, ':task_id' => $task_id]);
    return $stmt->rowCount();
}
