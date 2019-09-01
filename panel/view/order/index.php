<?php
include 'jdf.php';
include_once 'model/order.php';
$obj = new Order();
if (!isset($_GET['page'])){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$number_of_records =$obj->numOfRec()->rowCount();
$number_result_per_pages = "2";
$number_of_pages = ceil($number_of_records/$number_result_per_pages);
$first = ($page-1)*2;
//echo $first."=".$number_of_pages."=".$number_result_per_pages."+";die;
$orders = $obj->showIndex($first,$number_result_per_pages);

if (!isset($orders)){
    //echo "test";
}else{
    ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه سفارشات</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>عنوان سفارش</th>
                            <th>تعداد سفارش</th>
                            <th>سفارش دهنده</th>
                            <th>تاریخ سفارش </th>
                            <th>وضعیت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        <?php
                        foreach ($orders as $value){
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php $product = $obj->showpronamefororder($value['pro_id']);
                                            echo $product['title'];
                                    ?></td>
                                <td><? echo $value['number'];?></td>
                                <td><?php $user = $obj->showusernamefororder($value['user_id']);
                                    echo $user['name'];
                                    ?></td>
                                <td><?php
                                    date_default_timezone_set('Asia/Tehran');
                                    print jdate("y/m/d G.i:s", $value['created_at']);?>
                                </td>
                               <td>
                                    <?php
                                    if ($value['status'] == "1"){
                                        echo "<label style='color: #3c763d'>پرداخت شده</label>";
                                    }elseif($value['status'] == "0"){
                                        echo "<label style='color: #f0004c'>پرداخت نشده</label>";
                                    }else{
                                        echo "<label style='color: #9f191f'>انصراف از پرداخت</label>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="label label-primary" href="index.php?c=order&a=edit&id=<?php echo $value['id'];?>">ویرایش</a>
                                </td>
                                <td>
                                    <a class="label label-danger" href="index.php?c=order&a=delete&id=<?php echo $value['id']; ?>">حذف</a>
                                </td>
                            </tr>

                        <?php }

                        ?>

                    </table>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
            <?php
            for ($page=1;$page<=$number_of_pages;$page++){
                echo "<a style='margin-right:5px;' href='index.php?c=order&a=index&page=".$page."'>".$page."</a>";
            }


            ?>
        </div>
    </div>

    <?php
}
?>