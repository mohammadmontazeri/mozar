<?php
session_start();
require_once "model/user.php";
$class = new User();
$user = $class->registerAuth($_POST['email']);
if (isset($_POST['btn'])){
    $_SESSION['login'] = $_POST;
    $_SESSION['userpanel'] = $user['id'];
    header("location:index.php?c=user&a=login");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../ghaleb/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../ghaleb/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../ghaleb/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>صفحه</b>ورود</a>
    </div><!-- /.login-logo -->
    <?php
    if (isset($_GET['error'])){
       switch ($_GET['error']){
            case 'incorrectpass':
            echo "پسورد شما اشتباه است";
            break;
            case 'noregister':
            echo "اطلاعات را به درستی وارد کنید";
            break;
            case 'permissionError':
            echo "شما اجازه دسترسی  ندارید";
            break;
        }
    }





    ?>
    <div class="login-box-body">
        <p class="login-box-msg">اطلاعات کاربری</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="ایمیل" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="پسورد" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn">ورود</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> ورود با اکانت فیسبوک</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>  ورود با اکانت گوگل</a>
        </div><!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="../ghaleb/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.4 -->
<script src="../ghaleb/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../ghaleb/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
