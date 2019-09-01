

<div class="product-area-home-three">
    <div class="container">
        <div class="section-top-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><h2> جدیدترین محصولات</h2></div>
                </div>
            </div>
            <div class="row">
                <div class="product" style="margin: auto">

                            <?php
                            $i = 0;
                            foreach ($newProducts as $newProduct) {
                                if ($i == 4){
                                    break;
                                }
                                ?>


                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                    <div class="single-product-item">
                                        <div class="single-product clearfix">
                                            <a href="index.php?c=product&id=<?php echo $newProduct['id'] ;?>">
                                                <span class="product-image">
                                                    <img src="<?php echo upload_img_url($newProduct['image']); ?> " style="width: 250px;  height: 250px;" alt="">
                                                </span>

                                            </a>
                                        </div>
                                        <h2 class="single-product-name"><a href="index.php?c=product&id=<?php echo $newProduct['id']; ?>"><?php echo $newProduct['title'];?></a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price" style="color: #f0004c;font-size: 0.8em;"><?php echo $newProduct['price'];?>تومان </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <?php
                               $i++;
                            }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="product-area-home-three">
    <div class="container">
        <div class="section-top-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><h2> محصولات پیشنهادی</h2></div>
                </div>
            </div>
            <div class="row">
                <div class="product" style="margin: auto">

                                <?php
                                    foreach ($randproducts as $randproduct) {
                                        ?>

                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                            <div class="single-product-item">
                                                <div class="single-product clearfix">
                                                    <a href="index.php?c=product&id=<?php echo $randproduct['id'] ;?>">
                                                <span class="product-image">
                                                    <img src="<?php echo upload_img_url($randproduct['image']); ?> " style="width: 250px;  height: 250px;" alt="">
                                                </span>

                                                    </a>
                                                </div>
                                                <h2 class="single-product-name"><a href="index.php?c=product&id=<?php echo $randproduct['id']; ?>"><?php echo $randproduct['title'];?></a></h2>
                                                <div class="price-box">
                                                    <p class="special-price">
                                                        <span class="price"
                                                              style="color: #f0004c;font-size: 0.8em;"><?php echo $randproduct['price'];?>
                                                            تومان </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                        ?>



                </div>
            </div>
        </div>
    </div>
</div>


<div class="product-area-home-three">
    <div class="container">
        <div class="section-top-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><h2> پربازدیدترین ها</h2></div>
                </div>
            </div>
            <div class="row">
                <div class="product" style="margin: auto">

                    <?php
                        foreach ($maxviewd as $value) {
                            ?>


                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                <div class="single-product-item">
                                    <div class="single-product clearfix">
                                        <a href="index.php?c=product&id=<?php echo $value['id']; ?>">
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
                            </div>
                            <?php
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
        <!--End of Blog Area-->
        <!--Brand Area Strat-->
        <div class="brand-area">
            <div class="container">
                <div class="brand-content">
                    <div class="row" style="">

                                        <img src="<?php echo public_url("mozar/img/brand/2.jpg");?>" alt="">

                                        <img src="<?php echo public_url("mozar/img/brand/3.jpg");?>" alt="">

                                        <img src="<?php echo public_url("mozar/img/brand/4.jpg");?>" alt="">

                                        <img src="<?php echo public_url("mozar/img/brand/5.jpg");?>" alt="">

                                        <img src="<?php echo public_url("mozar/img/brand/1.jpg");?>" alt="">

                                        <img src="<?php echo public_url("mozar/img/brand/6.jpg");?>" alt="">

                    </div>
                </div>
            </div>
        </div>