<?php
session_start();
include_once "panel/functions.php";
include_once "panel/model/product.php";
$class = new Product();
?>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="color: #f0004c;">خرید شما با موفقیت انجام شد</h3>
                </div><!-- /.box-header -->
                <form method="post" action="index.php?c=order&a=endbuy">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr style="background-color: #4e555b; color: white">
                            <th>عنوان محصول</th>
                            <th>تعداد سفارش</th>
                            <th>قیمت واحد</th>
                            <th>قیمت نهایی</th>
                        </tr>
                        <?
                        $price = 0 ;
                        foreach ($orders as $key=>$value){
                            $pro = $class->showProInBasket($value['pro_id']);
                            if (isset($_POST['update'])){
                                $number = $_POST[$key];
                                $class->updateorder($number,$value['id']);
                                header("location:index.php?c=order&a=basket");
                            }
                            //   foreach ($pro as $value){
                            ?>
                            <tr>
                                <td class="p-name"><? echo $pro['title']?></td>
                                <td class="p-quantity" style="color: red"><? echo $value['number'];?></td>
                                <td class="p-amount"><? echo $pro['price']?></td>
                                <td class="p-total">
                                    <label for="" class="btn btn-danger">
                                        <?php
                                        $cost = $value['number']*$pro['price'];
                                        echo $cost ;
                                        ?>
                                    </label>
                                </td>
                            </tr>
                            <?
                           $price = $price + $cost;
                        }
                        ?>
                    </table>
                </div><!-- /.box-body -->
                <a class="btn_comment" href="index.php" style="border-left:solid 2px #cccccc;  font-family: main;background-color: #555;color: #fff;padding: 10px 7px;box-sizing: border-box;border-radius: 2.5px;border: none;">
                    صفحه اصلی سایت
                </a>
                </form>
                کل بهای پرداختی  :
                <label class="btn btn-primary" for="">
                    <? echo $price;?>
                </label>
            </div><!-- /.box -->
        </div>
    </div>
    </div>
