<?php
include 'jdf.php';
include_once 'model/order.php';
$obj = new Order();
if (!isset($_GET['page'])){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$number_of_records =$obj->numOfRecPayment()->rowCount();
$number_result_per_pages = "2";
$number_of_pages = ceil($number_of_records/$number_result_per_pages);
$first = ($page-1)*2;
//echo $first."=".$number_of_pages."=".$number_result_per_pages."+";die;
$payments = $obj->showIndexPaments($first,$number_result_per_pages);

if (!isset($payments)){
    //echo "test";
}else{
    ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه پرداخت ها </h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th> عنوان محصولات خریداری شده</th>
                            <th>خریدار</th>
                            <th>مقدار پرداخت شده</th>
                            <th>تاریخ خرید </th>
                        </tr>
                        <?php
                        foreach ($payments as $value){
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php
                                        $array = explode("-",$value['order_id']);
                                        $number = count($array);
                                       for ($i=0;$i<$number-1;$i++) {
                                           $pro = $obj->getOrderFromOrderId($array[$i]);
                                           $product = $obj->getProductFromProId($pro['pro_id']);
                                           if (!empty($product['title'])){
                                               echo $product['title']."-";
                                           }
                                       }
                                    ?></td>
                                <td><?php
                                    echo $value['user_id'];

                                    $user = $obj->showusernamefororder($value['user_id']);
                                    echo $user['name'];
                                    ?></td>
                                <td style="color: #3c763d"><? echo $value['price'];?></td>
                                <td style="color: red"><?php
                                    date_default_timezone_set('Asia/Tehran');
                                    print jdate("y/m/d G.i:s", $value['created_at']);?>
                                </td>
                            </tr>

                        <?php }

                        ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php
            for ($page=1;$page<=$number_of_pages;$page++){
                echo "<a style='margin-right:5px;' href='index.php?c=order&a=payments&page=".$page."'>".$page."</a>";
            }


            ?>
        </div>
    </div>

    <?php
}
?>