<?php
include 'jdf.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">لیست همه تگ ها</h3>
                <a class="label label-warning" href="index.php?c=product&a=addtag" style="float: left;padding: 7px;">افزودن تگ جدید</a>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr style="background-color: #4e555b; color: white">
                        <th>آی دی </th>
                        <th>عنوان</th>
                        <th>تاریخ ثبت </th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    <?php
                    foreach ($tags as $tag){
                        ?>
                        <tr>
                            <td><?php echo $tag['id']; ?></td>
                            <td><?php echo $tag['name']; ?></td>
                            <td><?php
                                date_default_timezone_set('Asia/Tehran');
                                print jdate("y/m/d G.i:s", $tag['created_at']);?>
                            </td>
                            <td>
                                <a class="label label-primary" href="index.php?c=product&a=edittag&q=<?php echo $tag['id'];?>">ویرایش</a>
                            </td>
                            <td>
                                <a class="label label-danger" href="index.php?c=product&a=deletetag&id=<?php echo $tag['id']; ?>">حذف</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div>