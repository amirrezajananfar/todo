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
                        <h6 class="text-center">نام کاربر: امیررضا جانانفر</h6>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-sm w-100 btn-danger">خروج از حساب</button>
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
                    <div class="w-100 rounded my-1 p-2 bg-secondary text-light">
                        <i class="bi bi-folder-fill d-inline ms-1"></i>
                        <p class="d-inline">کارهای شخصی</p>
                        <a class="bg-danger rounded text-decoration-none text-light px-2 float-start" href="">x</a>
                    </div>
                    <div class="w-100 rounded my-1 p-2 bg-secondary text-light">
                        <i class="bi bi-folder-fill d-inline ms-1"></i>
                        <p class="d-inline">کار و برنامه نویسی</p>
                        <a class="bg-danger rounded text-decoration-none text-light px-2 float-start" href="">x</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="modal fade" id="folderModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="">
                                    <div class="mb-3 mt-3">
                                        <input type="text" class="form-control" id="folderName" placeholder="نام پوشه مدنظر خود را بنویسید..." name="folderName">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success w-100">ایجاد پوشه جدید</button>
                                </form>
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
                                <form action="">
                                    <div class="mb-3 mt-3">
                                        <input type="text" class="form-control" id="taskName" placeholder="اطلاعات تسک مدنظر خود را بنویسید..." name="taskName">
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success w-100">ایجاد تسک جدید</button>
                                </form>
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
                    <div class="w-100 rounded my-2 p-2 bg-secondary text-light">
                        <i class="bi bi-square ms-1"></i>
                        <p class="d-inline">اصلاح کردن موی سر به همراه ریش و سیبیل</p>
                        <a class="bg-danger rounded text-decoration-none text-light px-2 float-start" href="">x</a>
                    </div>
                    <div class="w-100 rounded my-2 p-2 bg-secondary text-light">
                        <i class="bi bi-check-square ms-1"></i>
                        <p class="d-inline">رفتن به باشگاه و انجام ورزش های مربوط به جلو بازو</p>
                        <a class="bg-danger rounded text-decoration-none text-light px-2 float-start" href="">x</a>
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
</body>

</html>