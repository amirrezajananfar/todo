<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Program_title(); ?></title>
    <link href="<?php echo Site_url('assets/css/styles.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-3">
                <div class="bg-light shadow rounded my-2 p-3">
                    <div class="mb-3">
                        <h6 class="text-center">نام کاربر: <?php echo $logged_in_user->name ?? 'خطا در دریافت نام' ?></h6>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo Site_url('?logout=1') ?>">
                            <button class="btn btn-sm w-100 btn-danger">خروج از حساب</button>
                        </a>
                    </div>
                </div>
                <div class="bg-light shadow rounded my-2 p-3">
                    <div class="text-center">
                        <button class="btn btn-sm my-1 w-100 btn-secondary" data-bs-toggle="modal" data-bs-target="#folderModal">ایجاد پوشه جدید</button>
                        <button class="btn btn-sm my-1 w-100 btn-secondary" data-bs-toggle="modal" data-bs-target="#taskModal">ایجاد تسک جدید</button>
                    </div>
                </div>
                <div class="bg-light shadow rounded my-2 p-3">
                    <div class="mb-3">
                        <h6 class="text-center">لیست پوشه ها</h6>
                    </div>
                    <div id="folders">
                        <div class="w-100 rounded my-1 p-2 bg-secondary text-light">
                            <i class="bi bi-folder-fill d-inline ms-1"></i>
                            <a class="text-decoration-none" href="<?php echo Site_url(); ?>">
                                <p class="d-inline text-light">نمایش تمامی تسک ها</p>
                            </a>
                        </div>
                        <?php foreach ($folders as $folder) : ?>
                            <div class="w-100 rounded my-1 p-2 bg-secondary text-light">
                                <i class="bi bi-folder-fill d-inline ms-1"></i>
                                <a class="text-decoration-none" href="<?php echo '?folder_id=' . $folder->id; ?>">
                                    <p class="d-inline text-light"><?php echo $folder->name; ?></p>
                                </a>
                                <a class="bg-danger rounded text-decoration-none text-light px-2 float-start delete-btn" href="<?php echo '?delete_folder=' . $folder->id; ?>" onclick="return confirm('آیا از حذف این پوشه اطمینان دارید؟')">x</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="modal fade" id="folderModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3 mt-3">
                                    <input type="text" class="form-control" id="newFolder" placeholder="نام پوشه مدنظر خود را بنویسید..." name="folderName" autocomplete="off">
                                </div>
                                <button type="submit" id="newFolderButton" class="btn btn-sm btn-success w-100">ایجاد پوشه جدید</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="taskModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="mb-3 mt-3">
                                    <input type="text" class="form-control" id="newTask" placeholder="اطلاعات تسک مدنظر خود را بنویسید..." name="taskName" autocomplete="off">
                                </div>
                                <button type="submit" id="newTaskButton" class="btn btn-sm btn-success w-100">ایجاد تسک جدید</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light shadow rounded my-2 p-3">
                    <div class="mb-3">
                        <h6 class="text-center">لیست تسک ها</h6>
                    </div>
                    <div id="tasks">
                        <?php if (sizeof($tasks)) : ?>
                            <?php foreach ($tasks as $task) : ?>
                                <div class="w-100 rounded my-2 p-2 bg-secondary text-light">
                                    <i data-task-id="<?php echo $task->id ?>" class="bi <?php echo $task->is_done ? 'bi-check-square-fill' : 'bi-square' ?> ms-1 task-situation"></i>
                                    <p class="d-inline"><?php echo $task->title ?></p>
                                    <a class="bg-danger rounded text-decoration-none text-light px-2 float-start delete-btn" href="<?php echo '?delete_task=' . $task->id; ?>" onclick="return confirm('آیا از حذف این تسک اطمینان دارید؟')">x</a>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div id="noTask" class="w-100 rounded my-2 p-2 bg-secondary text-light">
                                <p class="d-inline">هیچ تسکی در این پوشه تعریف نشده است...</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="todo-pagination" style="direction: ltr !important;">
                        <nav>
                            <ul class="pagination justify-content-center text-light">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Sending inserted inforamtion from user into database with ajax
        $(document).ready(function() {
            // Inserting a new folder
            $('#newFolderButton').click(function(e) {
                let folder_name = $('#newFolder');
                $.ajax({
                    url: "<?php echo Site_url('process/add-folder.php') ?>",
                    method: "post",
                    data: {
                        action: "add_folder",
                        folder_name: folder_name.val()
                    },
                    success: function(response) {
                        let json_response = JSON.parse(response);
                        let added_folder_id = json_response[0].id;
                        let added_folder_name = json_response[0].name;
                        if (added_folder_id != null) {
                            let added_folder = '<div class="w-100 rounded my-1 p-2 bg-secondary text-light"><i class="bi bi-folder-fill d-inline ms-1"></i><a class="text-decoration-none" href="?folder_id=' + added_folder_id + '"><p class="d-inline text-light">' + added_folder_name + '</p></a><a class="bg-danger rounded text-decoration-none text-light px-2 float-start delete-btn" href="?delete_folder=' + added_folder_id + '"onclick="return confirm(' + "'" + 'آیا از حذف این تسک اطمینان دارید؟' + "'" + ')">x</a></div>'
                            $('#folders').append(added_folder);
                            folder_name.val('');
                        } else {
                            alert(json_response);
                        }
                    }
                });
            });
        });
        // Inserting a new task
        $(document).ready(function() {
            $('#newTaskButton').click(function(e) {
                let task_title = $('#newTask');
                let no_task = $('#noTask');
                $.ajax({
                    url: "<?php echo Site_url('process/add-task.php') ?>",
                    method: "post",
                    data: {
                        action: "add_task",
                        folder_id: "<?php echo !empty($_GET['folder_id']) ? $_GET['folder_id'] : '' ?>",
                        task_title: task_title.val()
                    },
                    success: function(response) {
                        let json_response = JSON.parse(response);
                        let added_task_id = json_response[0].id;
                        let added_task_title = json_response[0].title;
                        let added_task_situation = json_response[0].is_done;
                        if (added_task_id != null) {
                            let added_task = '<div class="w-100 rounded my-2 p-2 bg-secondary text-light"><i class="bi bi-square ms-1"></i><p class="d-inline"> ' + added_task_title + ' </p><a class="bg-danger rounded text-decoration-none text-light px-2 float-start delete-btn" href="?delete_task=' + added_task_id + '" onclick="return confirm(' + "'" + 'آیا از حذف این تسک اطمینان دارید؟' + "'" + ')">x</a></div>';
                            $('#tasks').append(added_task);
                            task_title.val('');
                            no_task.hide();
                        } else {
                            alert(json_response);
                        }
                    }
                });
            });
        });
        // Updating task situation
        $(document).ready(function() {
            $('.task-situation').click(function(e) {
                let task_id = $(this).attr('data-task-id');
                $.ajax({
                    url: "<?php echo Site_url('process/task-situation.php') ?>",
                    method: "post",
                    data: {
                        action: "switch_situation",
                        task_id: task_id
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>

</html>