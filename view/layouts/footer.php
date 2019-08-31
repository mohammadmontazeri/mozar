 <?
 require_once "panel/functions.php";
 require_once "panel/model/category.php";
 $obj = new Category();
 $categories = $obj->ShowCatForProAdd();
 $newProducts = $obj->newproduct();
 ?>
  <div class="footer-widget-area">
            <div class="container">
                <div class="footer-widget-padding"> 
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="single-widget">
                                <div class="footer-widget-title">
                                    <h3>دسته بندی محصولات </h3>
                                </div>
                                <div class="footer-widget-list ">
                                    <ul>
                                        <?
                                        foreach ($categories as $category) {
                                            ?>
                                            <li><a href="index.php?c=product&a=listpro&id=<? echo $category['id']?>"><? echo $category['name']?></a></li>
                                            <?
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 hidden-sm col-xs-12">
                            <div class="single-widget">
                                <div class="footer-widget-title">
                                    <h3> محصولات جدید</h3>
                                </div>
                                <div class="footer-widget-list ">
                                    <ul>
                                        <?php
                                        $i = 0;
                                        foreach ($newProducts as $newProduct) {
                                        if ($i == 4){
                                            break;
                                        }
                                        ?>
                                        <li><a href="index.php?c=product&id=<? echo $newProduct['id']?>"><? echo $newProduct['title']?></a></li>
                                        <?}?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="single-widget">
                                <div class="footer-widget-title">
                                    <h3>تماس با ما</h3>
                                </div>
                                <div class="footer-widget-list ">
                                    <ul class="address">
                                        <li><span class="fa fa-map-marker"></span> آدرس : ساری</li>
                                        <li><span class="fa fa-phone"></span> ۰۹۱۱۷۱۳۲۲۰۵</li>
                                        <li class="support-link"><span class="fa fa-envelope-o"></span> montazeriput95@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <!--End of Footer Widget Area-->
        <!--Footer Area Start-->
        <footer class="footer">
            <div class="container">
                <div class="footer-padding">   
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-8">
                            <nav>
                                <p class="author">تمامی حقوق این فروشگاه محفوظ می باشد</p>
                            </nav>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-4">
                            <p class="payment-image">
                                <img src="img/payment.png" alt="">
                            </p>
                        </div>
                    </div>
                </div>    
            </div>
        </footer>
        <!--End of Footer Area-->
        <!--Quickview Product Start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/product/quick-view.jpg">
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h1>Diam quis cursus</h1>
                                    <div class="price-box">
                                        <p class="price"><span class="special-price"><span class="amount">$132.00</span></span></p>
                                    </div>
                                    <a href="product-details.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons">
                                                <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                                <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Quickview Product--> 
        <!--Newsletter Popup Start-->
        <!--<div id="newsletter-popup-conatiner">
            <div id="newsletter-pop-up">
                <span class="hide-popup">Close</span>
                <div class="subscribe-pop-up">
                    <div class="title-subscribe">
                        <h1>NEWSLETTER</h1>
                    </div>
                    <form id="newsletter-form" method="post" action="#">
                        <div class="content-subscribe">
                            <div class="form-subscribe-header">
                                <label>Subcribe to the Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat..</label>
                            </div>
                            <div class="input-box">
                               <input type="text" class="input-text newsletter-subscribe" title="Sign up for our newsletter" name="email">
                            </div>
                            <div class="actions">
                                <button class="button-subscribe" title="Subscribe" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>
                    <div class="subscribe-bottom">
                        <input type="checkbox" id="dont_show">
                        <label for="dont_show">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div>-->
        <!--End of Newsletter Popup-->
        
        <!-- jquery
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/vendor/jquery-1.11.3.min.js")?>"></script>
        
        <!-- bootstrap JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/bootstrap.min.js")?>"></script>
        
        <!-- nivo slider js
        ============================================ -->       
        <script src="<? echo public_url("mozar/lib/nivo-slider/js/jquery.nivo.slider.js")?>" type="text/javascript"></script>
        <script src="<? echo public_url("mozar/lib/nivo-slider/home.js")?>" type="text/javascript"></script>
        
        <!-- wow JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/wow.min.js")?>"></script>
            
        <!-- meanmenu JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/jquery.meanmenu.js")?>"></script>

        <!-- owl.carousel JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/owl.carousel.min.js")?>"></script>
        
        <!-- price-slider JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/jquery-price-slider.js")?>"></script>
        
        <!-- scrollUp JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/jquery.scrollUp.min.js")?>"></script>

        <!--Countdown js-->
        <script src="<? echo public_url("mozar/js/jquery.countdown.min.js")?>"></script>
        
        <!-- Sticky Menu JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/jquery.sticky.js")?>"></script>
        
        <!-- Elevatezoom JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/jquery.elevateZoom-3.0.8.min.js")?>"></script>
        
        <!-- plugins JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/plugins.js")?>"></script>
        
        <!-- main JS
        ============================================ -->        
        <script src="<? echo public_url("mozar/js/main.js")?>"></script>
    </body>
</html>