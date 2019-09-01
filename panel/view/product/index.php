<?php
include 'jdf.php';
include_once 'model/product.php';
$obj = new Product();
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
$products = $obj->showIndex($first,$number_result_per_pages);
if (!isset($products)){
    echo "test";
}else{
    ?>

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست همه محصولات</h3>

                    <a class="label label-warning" href="index.php?c=product&a=add" style="float: left;padding: 7px;">افزودن محصول جدید</a>
                    <a class="label label-default" href="index.php?c=product&a=tagindex" style="float: left;padding: 7px; margin-left: 10px;">تگ ها</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr style="background-color: #4e555b; color: white">
                            <th>آی دی </th>
                            <th>عنوان</th>
                            <th>قیمت</th>
                            <th>تاریخ ثبت </th>
                            <th>دسته بندی</th>
                            <th>جزییات محصول</th>
                            <th>تعداد بازدید شده</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        <?php
                        foreach ($products as $product){
                            ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['title']; ?></td>
                                <td><?php echo $product['price'] ;?></td>
                                <td><?php
                                    date_default_timezone_set('Asia/Tehran');
                                    print jdate("y/m/d G.i:s", $product['created_at']);?>
                                </td>
                                <td><?php
                                    include_once 'model/category.php';
                                    $obj = new Category();
                                    $res = $obj->showEdit($product['cat_id']);
                                    echo $res['name'];
                                    ?>
                                </td>
                                <td><a class="label label-info" href="index.php?c=product&a=productDetail&q=<?php echo $product['id'];?>">جزییات </a></td>
                                <td><?php echo $product['viewed'];?></td>
                                <td>
                                    <a class="label label-primary" href="index.php?c=product&a=edit&q=<?php echo $product['id'];?>">ویرایش</a>
                                </td>
                                <td>
                                    <a class="label label-danger" href="index.php?c=product&a=delete&id=<?php echo $product['id']; ?>">حذف</a>
                                </td>
                            </tr>

                        <?php }

                        ?>

                    </table>
                </div><!-- /.box-body -->

            </div><!-- /.box -->
            <?php
            for ($page=1;$page<=$number_of_pages;$page++){
                echo "<a style='margin-right:5px;' href='index.php?c=product&a=index&page=".$page."'>".$page."</a>";
            }


            ?>
        </div>
    </div>

    <?php
}
?>