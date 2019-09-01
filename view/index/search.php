<?php
include_once "panel/jdf.php";
?>
<!--<link rel="stylesheet" href="ghaleb/ChiGap/css/style.css">
-->
<?php
if($products == ""){
    echo "موردی یافت نشد";
}
else {
    ?>
    <div class="test" style="display: flex;flex-direction: column;">

        <div class="product" style="margin: auto">

            <?php
            foreach ($products as $value) {
                ?>
                <div class="single-product-item">
                    <div class="single-product clearfix">
                        <a href="index.php?c=product&id=<?php echo $value['id'] ;?>">
                                                <span class="product-image">
                                                    <img src="<?php echo upload_img_url($value['image']); ?> " style="width: 300px;  height: 250px;" alt="">
                                                </span>
                        </a>
                    </div>
                    <h2 class="single-product-name"><a href="index.php?c=product&id=<?php echo $value['id']; ?>"><?php echo $value['title'];?></a></h2>
                    <div class="price-box">
                        <p class="special-price">
                                            <span class="price" style="color: #f0004c;font-size: 0.8em;"><?php echo $value['price'];?>
                                                تومان </span>
                        </p>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
    <?php
} ?>


<!--<div class="post_content">
    <div class="post">
        <div class="right">
            <a href="#" id="pic_member">
                <img src="images/OH1W8B0.jpg">
            </a>
            <div class="detail_member">
                <a href="#" id="name_member">
                    پسر شجاع
                </a>
                <span>
                          ۳ روز پیش
                      </span>
            </div>
        </div>
        <div class="left">
            <a href="#">
                من یک برنامه نویس هستم !
            </a>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ...
            </p>
            <div class="img_box">
                <img src="images/28419.jpg">
            </div>
        </div>
    </div>
</div>-->