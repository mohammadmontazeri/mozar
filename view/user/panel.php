<?php
require_once "panel/model/user.php";
$class = new User();
$user = $class->registerAuth($_SESSION['user']);
?>

<div class="container">
    <div class="row" style="width: 500px;">
        <form action="index.php?c=user&a=updateuser&id=<? echo $user['id']?>" method="post">
            <div class="form-group">
                <?
                if (isset($_GET['q'])){
                    $q = $_GET['q'];
                        switch ($q){
                            case 'errorname':
                                echo "<label style='color: #f0004c;'>نام کاربری را وارد کنید</label>";
                                break;
                            case 'editok':
                                echo "<label style='color: #f0004c;'>ویرایش با موفقیت انجام شد</label>";
                                break;
                            case 'errornochange':
                                echo "<label style='color: #f0004c;'>شما تغییری برای ذخیره کردن انجام ندادید</label>";
                        break;
                        }
                    } ?>
                <label for="exampleInputEmail1">نام کاربری شما</label>
                <input type="text" style="font-family: main;" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<? echo $user['name']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">رمز عبور جدید</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
            </div>
            <button type="submit" class="btn btn-primary" name="btn" style="font-family: main;">ویرایش</button>
        </form>
    </div>
</div>
