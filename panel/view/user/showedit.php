<?php

?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">ویرایش اطلاعات کاربر</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="index.php?c=user&a=edit&id=<?php echo $user['id'];?>" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">ویرایش نام کاربری</label>
                <?php
                if (isset($_GET['q'])){
                    echo "<label style='color: #f0004c'>نام کاربری را پر کنید**</label>";
                }
                ?>
                <input type="text" class="form-control" name="name" value="<?php echo $user['name'];?>"  placeholder="نام کاربری خود را ویرایش کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ویرایش رمز عبور</label>
                <input type="password" class="form-control" name="password" placeholder="رمز عبور جدید را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ویرایش دسترسی</label>
                <select name="role">
                    <option value="admin" <?php if ($user['role']=='admin') echo 'selected'; ?>>admin</option>
                    <option value="user" <?php if ($user['role']=='user') echo 'selected'; ?>>user</option>
                </select>
            </div>
            <hr>
            <label>وضعیت کاربر</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1"  <?php if ($user['status']=='1') echo 'checked'; ?>
                <label class="form-check-label" for="exampleRadios1">
                    فعال
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" <?php if ($user['status']=='0') echo 'checked'; ?>
                <label class="form-check-label" for="exampleRadios2">
                    غیر فعال
                </label>
            </div>
            <hr>
           <!-- <div class="form-group">
                <label for="exampleInputFile">ویرایش تصویر</label>
                <input type="file" id="exampleInputFile" name="img">
            </div>-->
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="btn">ویرایش</button>
        </div>
    </form>
</div>
