<?
require_once "panel/model/comment.php";
require_once "panel/jdf.php";
require_once "panel/model/product.php";
$class = new Product();
if (isset($_SESSION['user'])&&(!isset($_SESSION["$product[title]"]))){
        $value= $product['viewed'];
        $viewed = $value + 1;
        $class->updateViewProduct($viewed,$product['id']);
        $_SESSION["$product[title]"] = $value;
}
?>
<div class="breadcrumb-container">
    <div class="container">
        <h2 for="" style="float: right;font-weight: bolder;border-bottom: solid 1px #ccc;color: #f0004c;margin: 25px 0px;">
            جزییات محصول
        </h2>
    </div>
</div>
<!--End of Breadcrumb-->
<!--Product Details Area Start-->
<? if (isset($_SESSION['user'])){
?>
<div class="product-deails-area">
    <div class="container">
        <div class="product-details-content row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="zoomWrapper">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <img src="<? echo upload_img_url($product['image']) ?>" alt="big-1">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="product-details-conetnt" style="float: right">
                    <div class="product-name">
                        <h1> <? echo $product['title'] ?>  </h1>
                    </div>
                    <? if (isset($_GET['q'])){
                        if ($_GET['q'] == "errorExist"){
                            echo "<label style='color: red'>محصول مورد نظر در سبد خرید شما وجود دارد</label>";
                        }
                    } ?>
                    <div class="price-box">
                        <p class="special-price">
                            <span class="price"><? echo $product['price'] ?> تومان</span>
                        </p>
                    </div>
                    <div class="add-to-cart-qty">
                        <div class="cart-qty-button">
                            <a style="padding: 5px;background-color: #aaa;color: #fff;border-radius: 2.5px;font-family:'main'"
                               href="index.php?c=order&a=add&id=<? echo $product['id'] ?>">افزودن به سبد خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <label for="" style="background-color: #595959;padding: 5px;box-sizing: border-box;color: #fff;border-radius: 3px;">برچسب ها </label>
            <?
                $array = explode("-",$product['tags']);
                $i = 0 ;
                while($i >= 0){
                    if (isset($array[$i])){
                        echo "<ul style='display: flex;flex-direction: row'>";

                            echo "<li style='background-color: #eee;border:solid 1px #aaa;padding: 5px;box-sizing: border-box;color: #111;border-radius: 3px;'>".$array[$i]."</li>";

                        echo "</ul>";
                    }else{
                        break;
                    }
                    $i++;
                }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="p-details-tab">
                    <ul role="tablist" class="nav nav-tabs">
                        <li class="active" role="presentation" style="font-weight: bolder">توضیحات محصول</li>
                    </ul>
                </div>
                <p>
                    <?
                    {{echo $product['detail'];}}
                    ?>
                </p>
            </div>
            <?
            if (isset($relatedpro)) {
                ?>
                <div class="product-area-home-three">
                    <div class="container">
                        <div class="section-top-padding">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title"><h2> محصولات مرتبط </h2></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="product" style="margin: auto">

                                    <?php
                                    $num = count($ar);
                                   for ($a=0;$a<=$num;$a++) {
                                       $value = $class->ShowDetailPro($ar[$a]);
                                        ?>
                                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                                            <div class="single-product-item">
                                                <div class="single-product clearfix">
                                                    <a href="index.php?c=product&id=<? echo $value['id'] ?>">
                                                <span class="product-image">
                                                    <img src="<?php echo upload_img_url($value['image']) ?> "
                                                         style="width: 300px;  height: 250px;" alt="">
                                                </span>
                                                    </a>
                                                </div>
                                                <h2 class="single-product-name"><a
                                                            href="index.php?c=product&id=<? echo $value['id'] ?>"><? echo $value['title'] ?></a>
                                                </h2>
                                                <div class="price-box">
                                                    <p class="special-price">
                                                    <span class="price" style="color: #f0004c;font-size: 0.8em;"><?
                                                                if (!empty($value['price'])){
                                                                    echo $value['price']."تومان";
                                                                }
                                                            ?>
                                                     </span>
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
                <?
            } else {
            } ?>

        </div>
    </div>
        <section>
            <div class="container" style="border-top: solid 1.5px #eee;">
                <div class="row">
                    <label for="">
                        <h2>
                            نظرات کاربران
                        </h2>
                    </label>
                    <div class="type_cmnt">
                        <form method="post" action="index.php?c=comment&a=add&id=<?php echo $product['id'] ?>"
                              enctype="multipart/form-data">
                            <!-- <input type="email" name="email" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100" placeholder="ایمیل خود را وارد کنید">
                             <input type="text" name="name" style="padding: 10px;margin-bottom: 10px;border: solid .5px #aaa;border-radius: 5px;outline: none;font-size: 1em;font-family: Vazir;box-sizing: border-box;font-weight: 100;" placeholder="نام کاربری خود را وارد کنید">-->
                            <div class="typing_part">
                                <textarea name="body" id="" cols="30" rows="10"
                                          style="width: 100%;padding: 5px 7px;font-family: main;box-sizing: border-box;">دیدکاهی داری بنویس ...</textarea>
                                <button class="btn_comment" name="btn" style="font-family: 'main';">
                                    ارسال دیدگاه
                                </button>
                            </div>
                        </form>
                        <div class="all_comment">
                            <?php
                            function userId($user_id)
                            {
                                $class = new Comment();
                                $res = $class->ShowUserIdIndex($user_id);
                                // var_dump($res['title']);
                                return $res['name'];
                            }
                            function status($status)
                            {
                                if ($status == 0) {
                                    return "<i class='fa fa-thumbs-down' style='color: #f0004c'></i>";
                                } else {
                                    return "<i class='fa fa-thumbs-up' style='color: #f0004c'></i>";
                                }
                            }

                            function parent($parent, $post_id)
                            {
                                $obj = new Comment();
                                $parents = $obj->answerOfId($parent);
                                echo "<ul style='margin-right: 10px;'>";

                                foreach ($parents as $par) {
                                    if ($par['status'] == "1") {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #eeeeee;'>$par[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . userId($par['user_id']) . "</span>" . "</li><a href='index.php?c=comment&a=reply&pId=$post_id&pnt=$par[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . jdate("j F Y - h:s", $par['created_at']) . "</span>";
                                        if ($par['is_parent'] == "1") {
                                            parent($par['id'], $post_id);
                                        }
                                    }
                                }


                                echo "</ul>";
                            }

                            function ch($comments, $post)
                            {
                                echo "<ul>";
                                foreach ($comments as $key => $item) {
                                    if (($item['parent'] == "") && ($item['is_parent'] == "1") && ($item['status'] == "1")) {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #FFF;'>$item[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . userId($item['user_id']) . "</span>" . "</li><a href='index.php?c=comment&a=reply&pId=$post[id]&pnt=$item[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . jdate("j F Y - h:s", $item['created_at']) . "</span>";
                                        parent($item['id'], $post['id']);
                                    }
                                    if (($item['parent'] == "") && ($item['is_parent'] == "0") && ($item['status'] == "1")) {
                                        echo "<li style='list-style-type: none;border: solid .5px #aaa;padding: 8px 4px ;border-radius: 3px;background-color: #fff;'>$item[body]<span class='label-danger' style='float: left;margin-left: 7px;padding: 2.5px 5px;font-size: .8em;border-radius: 2px;background-color: #f0004c;color: #fff;font-weight: bolder;'>" . userId($item['user_id']) . "</span>" . "</li><a href='index.php?c=comment&a=reply&pId=$post[id]&pnt=$item[id]'><i class='fa fa-plus-square'></i></a><span style='color: #c87f0a;float: left;font-size: .7em;font-weight: bold;'>" . jdate("j F Y - h:s", $item['created_at']) . "</span>";
                                    }
                                }
                                echo "</ul>";
                            }
                            ch($comments, $product);

                            ?>

                        </div>
                    </div>
                </div>
        </section>

       <!-- <div class="container">
            <div class="row">
                <h2 style="border-top: solid 1px #eee;padding-top: 20px;">نظرات کاربران</h2>
                <div class="alert alert-danger" role="alert">
                    برای مشاهده یا ارسال دیدگاه ابتدا باید وارد سایت شوید
                </div>
            </div>
        </div>-->
    <?
    }else{
        ?>
       <div class="container">
           <div class="row">
               <div class="alert alert-danger" role="alert">
                   برای مشاهده جزییات محصول ابتدا باید وارد سایت شوید
               </div>
           </div>
       </div>
        <?
    }
?>
