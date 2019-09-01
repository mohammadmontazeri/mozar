<?
session_start();
require_once "panel/functions.php";
require_once "panel/model/category.php";
$obj = new Category();
$categories = $obj->ShowCatForProAdd();
$user = $obj->getUserIdForNumberOfBasket($_SESSION['user']);
$res = $obj->getNumberOfProInBasket($user['id']);
$num = $obj->getNumberOfProInBasket($user['id'])->rowCount();
if ($num == 0){
    $number = 0;
}else{
    $number = $num;
}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>فروشگاه موزار</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- favicon
        ============================================ -->        
        <link rel="shortcut icon" type="image/x-icon" href="<? echo public_url("mozar/img/favicon.ico") ?>">
        
        <!-- Google Fonts
        ============================================ -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


        <!-- Bootstrap CSS
        ============================================ -->        
        <link rel="stylesheet" href="<? echo public_url("bootstrap/css/bootstrap.min.css")?>">
        
        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/lib/nivo-slider/css/nivo-slider.css")?>" type="text/css" />
        <link rel="stylesheet" href="<? echo public_url("mozar/lib/nivo-slider/css/preview.css")?>" type="text/css" media="screen" />
        
        <!-- Fontawsome CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/font-awesome.min.css")?>">
        
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/owl.carousel.css")?>">
        
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/jquery-ui.css")?>">
        
        <!-- meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/meanmenu.min.css")?>">
        
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/animate.css")?>">
        <link rel="stylesheet" href="<? echo public_url("chigap/css/style.css") ?>">
        <link rel="stylesheet" href="<? echo public_url("chigap/css/owl.carousel.min.cs") ?>">
        <link rel="stylesheet" href="<? echo public_url("chigap/css/owl.theme.default.min.css") ?>">
        <link rel="stylesheet" href="<? echo public_url("chigap/css/media.css") ?>">
        <script type="text/javascript" src="<? echo public_url("chigap/js/Untitled.js") ?>"></script>
        <script type="text/javascript" src="<? echo public_url("chigap/js/owl.carousel.min.jss") ?>"></script>
        <!-- style CSS
        ============================================ -->

        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="<? echo public_url("mozar/css/responsive.css")?>">
        <link rel="stylesheet" href="<? echo public_url("mozar/css/style.css")?>">
        <style>
            body{
                font-family: "main", sans-serif;
                direction: rtl;
            }
        </style>
        <!-- modernizr JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/vendor/modernizr-2.8.3.min.js")?>"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!--Header Start-->
        <header>
            <div class="header-top-home-four" >
                <div class="container">
                    <div class="header-container">
                        <div style="float: right; font-size: 1.2em;color: #000;">

                            <?php
                                if (isset($_SESSION['user'])){
                                    ?>
                                    <a href="index.php?c=user&a=panel" style="color: #000">پنل کاربری</a> | <a href="index.php?c=user&a=logout" style="color: #f0004c">خروج</a>
                                    <?
                                }else{
                                    ?>
                                    <a href="index.php?c=user&a=register" style="color: #000">ثبت نام</a> | <a href="index.php?c=user&a=login" style="color: #000">ورود</a>
                                    <?
                                }
                            ?>
                        </div>
                        <div>
                            <?
                                if (isset($_GET['q'])){
                                    if ($_GET['q'] == "registerOk"){
                                        echo "<label style='color: #fff;background-color: #f0004c;padding: 5px;box-sizing: border-box;border-radius: 3px;'> ثبت نام شما با موفقیت انجام شد  </label>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main hidden-sm">
                <div class="container" >
                    <div class="header-content" >
                        <div class="row">
                            <div class="col-lg-4 col-md-3">
                                <div class="logo">
                                    <a href="index.php"><img src="<?php echo public_url("mozar/img/logo/logo.png")?>" alt="MOZAR"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Mainmenu Start-->
            <div class="mainmenu-area home-four-menu">
                <div id="sticker"> 
                    <div class="container">
                        <div class="row">   
                            <div class="col-lg-7 col-md-7 hidden-sm hidden-xs">
                                <div class="mainmenu">
                                    <nav>
                                        <ul id="nav">
                                            <?
                                                foreach ($categories as $category) {
                                                    ?>
                                                    <li><a href="index.php?c=product&a=listpro&id=<? echo $category['id']?>"><? echo $category['name']?></a></li>
                                                    <?
                                                }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="hidden-lg hidden-md visible-sm col-sm-5 hidden-xs">
                                <div class="logo-four">
                                    <a href="index.html"><img src="<? echo public_url("mozar/img/logo/logo.png")?>" alt="MOZAR"></a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
                                <ul class="header-r-cart cart-home-four">
                                    <li>
                                        <?
                                            if (isset($_SESSION['user'])){
                                                echo "<a class=\"cart\" href=\"index.php?c=order&a=basket\"><span>".$number."</span>سبد خرید</a>";
                                            }
                                        ?>
                                    </li>
                                </ul>
                                <form id="search-form-four" method="post" action="index.php?c=index&a=search">
                                    <div class="search-content">
                                        <input type="text" id="search-input-four" name="body" style="font-family: main;">
                                        <button class="button" type="submit" name="btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <!--End of Mainmenu-->
        </header>