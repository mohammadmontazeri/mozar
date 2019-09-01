<?php
include_once "panel/functions.php";
include_once "panel/model/product.php";
$class = new Product();
if (isset($_POST['continue'])){

    ?>
    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">فاکتور نهایی خرید</h3>
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
                        <?php
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
                                <td class="p-name"><?php echo $pro['title'];?></td>
                                <td class="p-quantity" style="color: red"><?php echo $value['number'];?></td>
                                <td class="p-amount"><?php echo $pro['price'];?></td>
                                <td class="p-total">
                                    <label for="" class="btn btn-danger">
                                        <?php
                                        $cost = $value['number']*$pro['price'];
                                        echo $cost ;
                                        ?>
                                    </label>
                                </td>
                            </tr>
                            <?php
                           $price = $price + $cost;
                        }
                        ?>
                    </table>
                </div><!-- /.box-body -->
                <button class="btn_comment" name="endbuy" style="border-left:solid 2px #cccccc;  font-family: main;background-color: #555;color: #fff;padding: 10px 7px;box-sizing: border-box;border-radius: 2.5px;border: none;">
                    ادامه فرایند خرید
                </button>
                </form>
                کل بهای پرداختی  :
                <label class="btn btn-primary" for="">
                    <?php
                    $_SESSION['price'] = $price;
                    echo $price;?>
                </label>
            </div><!-- /.box -->
        </div>
    </div>
    </div>
    <?php
}else{
    ?>

    <div class="cart-main-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h1>سبد خرید</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form method="post" action="">
                    <div class="cart-table table-responsive">
                        <table>
                            <thead>
                            <tr>
                                    <th class="p-image" style="color: #f0004c">تصویر محصول</th>
                                    <th class="p-name"style="color: #f0004c">نام محصول</th>
                                    <th class="p-edit"style="color: #f0004c"></th>
                                    <th class="p-amount"style="color: #f0004c">قیمت واحد</th>
                                    <th class="p-quantity"style="color: #f0004c">تعداد</th>
                                    <th class="p-total"style="color: #f0004c">قیمت نهایی</th>
                                    <th class="p-times"style="color: #f0004c"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

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
                                    <td class="p-image">
                                        <a href="product-details.html"><img alt="" style="width: 60px;" src="<?php echo upload_img_url($pro['image']);?>" class="floatleft"></a>
                                    </td>
                                    <td class="p-name"><a href="product-details.html"><?php echo $pro['title'];?></a></td>
                                    <td class="edit"><a href="index.php?c=order&a=delete&id=<?php echo $value['id'];?>" style="background-color: #f0004c;color: #fff;padding: 3px;box-sizing: border-box;border-radius: 2.5px;">حذف</a></td>
                                    <td class="p-amount"><?php echo $pro['price'];?></td>
                                    <td class="p-quantity"><input  type="text"  name="<?php echo $key;?>" value="<?php echo $value['number'];?>"></td>
                                    <td class="p-total">
                                        <?php
                                        echo $value['number']*$pro['price'];
                                        ?>


                                    </td>
                                    <td class="p-action"><a href="#"><i class="fa fa-times"></i></a></td>
                                </tr>
                                <?php
                                //   }
                            } ?>



                            </tbody>
                        </table>
                        <div class="all-cart-buttons">
                            <!--                            <input class="button" type="button" style="font-family: main;background-color: #f0004c;color: #fff;padding: 3px;box-sizing: border-box;border-radius: 2.5px;" name="continue" value="ادامه فرآیند خرید">
                            -->                            <div class="floatright">
                                <!-- <input class="button clear-cart" type="button" style="font-family: main;background-color: #f0004c;color: #fff;padding: 3px;box-sizing: border-box;border-radius: 2.5px;" name="clear" value="پاک کردن سبد خرید">-->
                                <!-- <input class="button" type="button" style="font-family: main;background-color: #f0004c;color: #fff;padding: 3px;box-sizing: border-box;border-radius: 2.5px;" name="update" value="آپدیت کردن سبد">-->
                                <button class="btn_comment" name="update" style="font-family: main;background-color: #f0004c;color: #fff;padding: 5px 4px;box-sizing: border-box;border-radius: 2.5px;border: none;">
                                    آپدیت کردن سبد
                                </button>
                                <button class="btn_comment" name="continue" style="font-family: main;background-color: #cccccc;color: #fff;padding: 5px 4px;box-sizing: border-box;border-radius: 2.5px;border: none;">
                                    ادامه فرایند خرید
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
}
?>