<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo Program_title('ثبت نام و ورود'); ?></title>
    <link href="<?php echo Site_url('assets/css/styles.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-sm-6">
                <div class="bg-light shadow rounded m-2 p-3">
                    <div class="text-center">
                        <h5 class="py-2">
                            ورود به حساب کاربری
                        </h5>
                        <p class="py-2">
                            لطفا اطلاعات خود را برای ورود به حساب کاربری وارد نمائید
                        </p>
                    </div>
                    <div class="m-4 p-4 shadow-sm rounded">
                        <form action="<?php echo Site_url('auth.php?action=login') ?>" method="post">
                            <div class="py-3">
                                <label for="useremail" class="form-label">آدرس ایمیل:</label>
                                <input type="email" class="form-control" id="useremail" placeholder="آدرس ایمیل خود را بنویسید" name="useremail" required>
                            </div>
                            <div class="py-3">
                                <label for="userpassword" class="form-label">رمز عبور:</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="رمز عبور خود را بنویسید" name="userpassword" autocomplete="off" required>
                            </div>
                            <div class="py-3 text-start">
                                <button type="submit" class="btn btn-success w-100">ورود به حساب</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bg-light shadow rounded m-2 p-3">
                    <div class="text-center">
                        <h5 class="py-2">
                            ایجاد حساب کاربری
                        </h5>
                        <p class="py-2">
                            لطفا اطلاعات خود را جهت ایجاد حساب کاربری وارد نمائید
                        </p>
                    </div>
                    <div class="m-4 p-4 shadow-sm rounded">
                        <form action="<?php echo Site_url('auth.php?action=register') ?>" method="post">
                            <div class="py-3">
                                <label for="username" class="form-label">نام:</label>
                                <input type="text" class="form-control" id="username" placeholder="نام خود را کامل بنویسید" name="username" autocomplete="off" required>
                            </div>
                            <div class="py-3">
                                <label for="useremail" class="form-label">آدرس ایمیل:</label>
                                <input type="email" class="form-control" id="useremail" placeholder="آدرس ایمیل خود را بنویسید" name="useremail" autocomplete="off" required>
                            </div>
                            <div class="py-3">
                                <label for="userpassword" class="form-label">رمز عبور:</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="رمز عبور خود را بنویسید" name="userpassword" autocomplete="off" required>
                            </div>
                            <div class="py-3 text-start">
                                <button type="submit" class="btn btn-primary w-100">ایجاد حساب</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>