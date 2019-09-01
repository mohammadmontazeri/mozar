<?php
include_once 'panel/model/product.php';
$obj = new Product();
if (!isset($_GET['page'])){
    $page = "1";
}else{
    $page = $_GET['page'];
}
$number_of_records =$obj->numOfRecListPro($_GET['id'])->rowCount();
$number_result_per_pages = "2";
$number_of_pages = ceil($number_of_records/$number_result_per_pages);
$first = ($page-1)*2;
//echo $first."=".$number_of_pages."=".$number_result_per_pages."+";die;
$products = $obj->showproforcat($first,$number_result_per_pages,$_GET['id']);
?>

<div class="test" style="display: flex;flex-direction: column;">

        <div class="product" style="margin: auto">

            <?php
            foreach ($products as $value) {
                ?>
                    <div class="single-product-item">
                        <div class="single-product clearfix">
                            <a href="index.php?c=product&id=<? echo $value['id'] ?>">
                                                <span class="product-image">
                                                    <img src="<?php echo upload_img_url($value['image']) ?> " style="width: 300px;  height: 250px;" alt="">
                                                </span>
                            </a>
                        </div>
                        <h2 class="single-product-name"><a href="index.php?c=product&id=<? echo $value['id'] ?>"><? echo $value['title']?></a></h2>
                        <div class="price-box">
                            <p class="special-price">
                                            <span class="price" style="color: #f0004c;font-size: 0.8em;"><? echo $value['price']?>
                                                تومان </span>
                            </p>
                        </div>
                    </div>

                <?php
            }
            ?>
        </div>
    <?php
    for ($page=1;$page<=$number_of_pages;$page++){
        echo "<a style='margin-right:5px;' href='index.php?c=product&a=listpro&id=".$_GET['id']."&page=".$page."'>".$page."</a>";
    }


    ?>
</div>
