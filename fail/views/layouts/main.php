<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Buku;
use app\models\TabelCategori;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=Url::to('@web/assetsTemplate/')?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assetsTemplate/assets/ico/favicon.png">
    <title>TSHOP - Bootstrap E-Commerce Parallax Theme</title>
    <?php $this->head() ?>
    <!-- Bootstrap core CSS -->
    <!-- <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <!-- <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/category-2.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- [if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <!-- <![endif] -->

    <!-- include pace script for automatic web page progress bar  -->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="assetsTemplate/assets/js/pace.min.js"></script>
</head>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42863888-4', 'pinsupreme.com');
    ga('send', 'pageview');

</script>
<?php $this->beginBody() ?>

<!-- Fixed navbar start -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    
    <!--/.navbar-top-->

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span
                    class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            
            <a class="navbar-brand " href="index.html"> <img src="<?=Url::to('@web/images')?>/logo.png" alt="TSHOP"> </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                
                <!-- /input-group -->

            </div>
        </div>

        <!-- this part is duplicate from cartMenu  keep it for mobile -->
        
        <!--/.navbar-cart-->

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?=Yii::$app->homeUrl?>site/index"> Home </a></li>
                <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> New
                    Products <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content ">
                            <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                <li class="no-border">
                                    <p class="promo-1"><strong> NEW COLLECTION </strong></p>
                                </li>
                                <li><a href="category.html"> ALL NEW PRODUCTS </a></li>
                                <li><a href="category.html"> NEW TOPS </a></li>
                                <li><a href="category.html"> NEW SHOES </a></li>
                                <li><a href="category.html"> NEW TSHIRT </a></li>
                                <li><a href="category.html"> NEW TSHOP </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="<?=Url::to('@web/images')?>/site/promo1.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> JEANS </span>
                                </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="<?=Url::to('@web/images')?>/site/promo2.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i
                                        class="fa fa-caret-right"> </i> PARTY DRESS </span> </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                <li><a class="newProductMenuBlock" href="product-details.html"> <img
                                        class="img-responsive" src="<?=Url::to('@web/images')?>/site/promo3.jpg" alt="product"> <span
                                        class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> SHOES </span>
                                </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                <li class="dropdown active megamenu-80width "><a data-toggle="dropdown" class="dropdown-toggle"
                                                                 href="#"> SHOP <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">

                            <!-- megamenu-content -->

                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled noMarginLeft">
                                <li>
                                    <p><strong> Women Collection </strong></p>
                                </li>
                                <li><a href="#"> Kameez </a></li>
                                <li><a href="#"> Tops </a></li>
                                <li><a href="#"> Shoes </a></li>
                                <li><a href="#"> T shirt </a></li>
                                <li><a href="#"> TSHOP </a></li>
                                <li><a href="#"> Party Dress </a></li>
                                <li><a href="#"> Women Fragrances </a></li>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                <li>
                                    <p><strong> Men Collection </strong></p>
                                </li>
                                <li><a href="#"> Panjabi </a></li>
                                <li><a href="#"> Male Fragrances </a></li>
                                <li><a href="#"> Scarf </a></li>
                                <li><a href="#"> Sandal </a></li>
                                <li><a href="#"> Underwear </a></li>
                                <li><a href="#"> Winter Collection </a></li>
                                <li><a href="#"> Men Accessories </a></li>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2  unstyled">
                                <li>
                                    <p><strong> Top Brands </strong></p>
                                </li>
                                <li><a href="#"> Diesel </a></li>
                                <li><a href="#"> Farah </a></li>
                                <li><a href="#"> G-Star RAW </a></li>
                                <li><a href="#"> Lyle & Scott </a></li>
                                <li><a href="#"> Pretty Green </a></li>
                                <li><a href="#"> TSHOP </a></li>
                                <li><a href="#"> TANJIM </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                <li class="no-margin productPopItem "><a href="product-details.html"> <img
                                        class="img-responsive" src="<?=Url::to('@web/images')?>/site/g4.jpg" alt="img"> </a> <a
                                        class="text-center productInfo alpha90" href="product-details.html"> Eodem modo
                                    typi <br>
                                    <span> $60 </span> </a></li>
                            </ul>
                            <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-6">
                                <li class="no-margin productPopItem relative"><a href="product-details.html"> <img
                                        class="img-responsive" src="<?=Url::to('@web/images')?>/site/g5.jpg" alt="img"> </a> <a
                                        class="text-center productInfo alpha90" href="product-details.html"> Eodem modo
                                    typi <br>
                                    <span> $60 </span> </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    PAGES <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content ProductDetailsList">

                            <!-- remove .ProductDetailsList class from megamenu-content || this class for demo uses only -->

                            <!-- megamenu-content -->

                            <h3 class="promo-1 no-margin hidden-xs">60 + HTML PAGES || AVAILABLE ONLY AT WRAP
                                BOOTSTRAP </h3>

                            <h3 class="promo-1sub hidden-xs"> Complete Parallax E-Commerce Boostrap Template, Responsive
                                on any Device, 10+ color Theme + Parallax Effect </h3>

                            <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                <li class="no-border">
                                    <p><strong> Home Pages </strong></p>
                                </li>
                                <li><a href="index.html"> Home Version 1 </a></li>
                                <li><a href="index2.html"> Home Version 2 </a></li>
                                <li><a href="index3.html"> Home Version 3 (BOXES) </a></li>
                                <li><a href="index4.html"> Home Version 4 (LOOK 2)</a></li>
                                <li><a href="index5.html"> Home Version 5 (LOOK 3)</a></li>
                                <li><a href="index6.html"> Home Version 6 (STORY)</a></li>
                                <li><a href="index-v-7.html"> Home Version 7 (Flat) <span class="label label-success">new</span></a>
                                </li>
                                <li><a href="index-header2.html"> Header Version 2 </a></li>
                                <li><a href="index-header3.html"> Header Version 3 </a></li>
                                  <li><a href="index-logged-in.html">Topbar Logged In user menu <span
                                        class="label label-success">new</span></a></li>
                                <li><a href="sidebar-shopping-cart.html">Sidebar Shopping cart <span
                                        class="label label-success">new</span></a></li>
                            </ul>

                            <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                <li class="no-border">
                                    <p><strong> Featured Pages </strong></p>
                                </li>
                                <li><a href="category.html"> Category </a></li>
                                <li><a href="category2.html"> Category Style 2 [Parallax] </a></li>
                                <li><a href="sub-category.html"> Sub Category </a></li>
                                <li><a href="category-list.html"> Category List View </a></li>
                                <li><a href="category-product-hover.html"> Category [Product Hover] </a></li>
                                <li><a href="category-product-slide.html"> Category [Product Slide] </a></li>

                                <li><a href="cart.html"> Cart </a></li>
                                <li><a href="about-us-3.html"> About Us V3 <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="about-us-2.html"> About Us V2 </a></li>
                                <li><a href="about-us.html"> About Us V1 </a></li>
                                <li><a href="contact-us.html"> Contact us </a></li>
                                <li><a href="contact-us-2.html"> Contact us 2 (No Fixed Map) </a></li>
                                <li><a href="terms-conditions.html"> Terms &amp; Conditions </a></li>

                            </ul>

                            <ul class="col-lg-3  col-sm-3 col-md-3 unstyled ">
                                <li class="no-border">
                                    <p><strong> Product Details </strong></p>
                                </li>
                                <li><a href="product-details.html"> Product Details v1 </a></li>
                                <li><a href="product-details-style2.html"> Product Details v 2 </a></li>
                                <li><a href="product-details-style3.html"> Product Details v 3 (Custom Thumbnail
                                    Position)</a></li>
                                <li><a href="product-details-style4.html"> Product Details v 4 (with litebox)</a></li>


                                <li><a href="product-details-style5.html"> Product Details v 5 (Flat) <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-1.html"> Product Details v 5.1 <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-2.html"> Product Details v 5.2 <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-3.html"> Product Details v 5.3 <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-3-fadein.html"> Product Details v 5.3.1
                                    <small>(fadein)</small> <span
                                            class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-4.html"> Product Details v 5.4  <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-4.1-popup-video.html"> Product Details v 5.4.1
                                    <small>(popup video)</small><span
                                            class="label label-success">NEW</span> </a></li>
                                <li><a href="product-details-style5-4.1-with-zoom.html"> Product Details v 5.4.1
                                    <small>(zoom + litebox)</small> <span
                                            class="label label-success">NEW</span></a></li>

                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                <li class="no-border">
                                    <p><strong> Checkout </strong></p>
                                </li>
                                <li><a href="checkout-0.html"> Checkout Before </a></li>
                                <li><a href="checkout-1.html"> checkout step 1 </a></li>
                                <li><a href="checkout-2.html"> checkout step 2 </a></li>
                                <li><a href="checkout-3.html"> checkout step 3 </a></li>
                                <li><a href="checkout-4.html"> checkout step 4 </a></li>
                                <li><a href="checkout-5.html"> checkout step 5 </a></li>
                                <li><a href="one-page-checkout.html"> One page checkout <span
                                        class="label label-success">NEW</span> </a></li>
                                <li><a href="thanks-for-order.html"> Thanks for order</a></li>
                            </ul>
                            <ul class="col-lg-1  col-sm-1 col-md-1 no-padding unstyled">
                                <li class="no-border">
                                    <p><strong> User Account </strong></p>
                                </li>
                                <li><a href="account-1.html"> Account Login </a></li>
                                <li><a href="account.html"> My Account </a></li>
                                <li><a href="my-address.html"> My Address </a></li>
                                <li><a href="user-information.html"> User information </a></li>
                                <li><a href="wishlist.html"> Wish List </a></li>
                                <li><a href="order-list.html"> Order list </a></li>
                                <li><a href="order-status.html"> Order Status </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                            </ul>
                            <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                <li class="no-border">
                                    <p><strong> &nbsp; </strong></p>
                                </li>
                                <li><a href="blog.html"> Blog </a></li>
                                <li><a href="blog-details.html"> Blog Details </a></li>
                                <li><a href="single-product-modal.html"> Single Product Details Modal</a></li>
                                <li><a href="single-subscribe-modal.html"> Single Subscribe Modal</a></li>
                                <li><a href="error-page.html"> Error Page </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>   <li><a href="form.html"> Basic Form Element </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="upload/index" target="_blank"> Pasang Iklan </a></li>
            </ul>
            </ul>

            <!--- this part will be hidden for mobile version -->
            
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->

    
    <!--/.search-full-->

</div>
<!-- /.Fixed navbar  -->

<section class="category-wrapper">

    <section id="category-intro" class="section-intro scrollme parallaxOffset">
        <div class="cat-intro animateme" data-when="exit"
             data-from="0"
             data-to="1"
             data-opacity="0"
             data-translatey="-220"
             data-rotatez="0"
             data-crop="true">

            <div class="cat-intro-text">
                <div class="display-table hw100">
                    <div class="display-table-cell hw100">
                        <div class="box-text-cell-inner white animateme" data-when="exit"
                             data-from="0"
                             data-to="1"
                             data-opacity="0"
                             data-translatey="-260"
                             data-rotatez="0"
                             data-crop="true">

                            <h1>SHOP WOMEN</h1>

                            <p>Discover the latest women's fashion </p>

                            <p><a style="color:#fff" href="#main-container-wrapper" class="scrollto"><i
                                    class="fa fa-2x fa-angle-down"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.cat-intro-text-->

            <img src="<?=Url::to('@web/images')?>/slider/single-img/2.jpg" alt="img" class=" cat-intro-banner"></div>
    </section>

    <section class="main-container-wrapper clearfix" id="main-container-wrapper">
        <div class="container main-container">

            <!-- Main component call to action -->

            <div class="row">

                <div class="catTopBar clearfix">
                    <div class="catTopBarInner clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="f-left hidden-xs">
                                <h4 class="filterToggle"><i class="fa fa-bars"></i> <strong>Filter</strong> <span> &nbsp; </span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="f-right">
                                <div class="w100  clearfix center-xs-inner">
                                    <p class="pull-left shrtByP center-xs"><span>Sort By :</span> <a
                                            class="active">NEW</a> | <a>POPULAR</a>| <a>PIRCE</a></p>


                                    <div class="pull-right hidden-xs">
                                        <p class="pull-right change-view-flat"><span>View By :</span> <a href="#"
                                                                                                         title="Grid"
                                                                                                         class="grid-view">
                                            <i class="fa fa-th-large"></i> </a> | <a href="#" title="List"
                                                                                     class="list-view "><i
                                                class="fa fa-th-list"></i></a></p>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!--left column-->
                <?php $category = TabelCategori::find()->all();?>
                <div class="catColumnWrapper">
                    <div class="col-lg-3 col-md-3 col-sm-12 filterColumn">
                        <div class="panel-group" id="accordion">
                            <!--Category-->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" href="#collapseCategory" class="">
                                        <span class="pull-right hasMinus"> <i class="i-minus"></i></span> Category </a>
                                    </h4>
                                </div>
                                <div id="collapseCategory" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-list">
                                            <?php foreach ($category as $key) {?>
                                                
                                                    <li>
                                                        <a><?=strtoupper($key['categori_barang'])?></a>
                                                    </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--right column-->
                    <div class="col-lg-9 col-md-9 col-sm-12 categoryColumn">


                        <!--/.productFilter-->
                        <?=$content;?>
                    <!--/right column end-->
                </div>
                <!--/.catColumnWrapper-->


            </div>
            <!-- /.row  -->
        </div>
        <!-- /main container -->
    </section>

</section>
<!-- /category-wrapper -->


<!-- Product Details Modal  -->
<!-- Modal -->
<div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog"
     aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->

<footer>
    <div class="footer" id="footer">

        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Support </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Lorem ipsum dolor sit amet, consectetur </p>
                            <h4><a class="inline" href="callto:+12025550151"> <strong> <i class="fa fa-phone"> </i> +1-202-555-0151 </strong> </a></h4>
                            <h4><a class="inline" href="mailto:help@yourweb.com"> <i class="fa fa-envelope-o"> </i>
                                help@yourweb.com </a></h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Shop </h3>
                    <ul>
                        <li><a href="#">
                            Men's
                        </a></li>
                        <li><a href="#">
                            Women's</a></li>
                        <li><a href="#">
                            Kids'
                        </a></li>
                        <li><a href="#">Shoes
                        </a></li>
                        <li><a href="#">
                            Gift Cards
                        </a></li>

                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Information </h3>
                    <ul class="list-unstyled footer-nav">
                        <li><a href="#">Questions?
                        </a></li>

                        <li><a href="#"> Order Status
                        </a></li>
                        <li><a href="#"> Sizing Charts
                        </a></li>
                        <li><a href="#"> Return Policy </a></li>
                        <li><a href="#">
                            Contact Us
                        </a></li>

                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> My Account </h3>
                    <ul>
                        <li><a href="account.html"> My Account </a></li>
                        <li><a href="my-address.html"> My Address </a></li>
                        <li><a href="wishlist.html"> Wish List </a></li>
                        <li><a href="order-list.html"> Order list </a></li>
                        <li><a href="order-status.html"> Order Status </a></li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Stay in touch </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <input type="text" class="full text-center" placeholder="Email ">
                                <button class="btn  bg-gray" type="button"> Subscribe <i
                                        class="fa fa-long-arrow-right"> </i></button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                        <li><a href="http://facebook.com"> <i class=" fa fa-facebook"> &nbsp; </i> </a></li>
                        <li><a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a></li>
                        <li><a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-pinterest"> &nbsp; </i> </a></li>
                        <li><a href="http://youtube.com"> <i class="fa fa-youtube"> &nbsp; </i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; TSHOP 2014. All right reserved. </p>

            <div class="pull-right paymentMethodImg"><img height="30" class="pull-right"
                                                          src="<?=Url::to('@web/images')?>/site/payment/master_card.png" alt="img"> <img
                    height="30" class="pull-right" src="<?=Url::to('@web/images')?>/site/payment/visa_card.png" alt="img"><img height="30"
                                                                                                          class="pull-right"
                                                                                                          src="images/site/payment/paypal.png"
                                                                                                          alt="img">
                <img height="30" class="pull-right" src="<?=Url::to('@web/images')?>/site/payment/american_express_card.png" alt="img"> <img
                        height="30" class="pull-right" src="<?=Url::to('@web/images')?>/site/payment/discover_network_card.png" alt="img">
                <img height="30" class="pull-right" src="<?=Url::to('@web/images')?>/site/payment/google_wallet.png" alt="img">

            </div>
        </div>
    </div>
</footer>


<!-- Modal Login start -->
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> Login to TSHOP </h3>
            </div>
            <div class="modal-body">
                <div class="form-group login-username">
                    <div>
                        <input name="log" id="login-user" class="form-control input" size="20"
                               placeholder="Enter Username" type="text">
                    </div>
                </div>
                <div class="form-group login-password">
                    <div>
                        <input name="Password" id="login-password" class="form-control input" size="20"
                               placeholder="Password" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <div class="checkbox login-remember">
                            <label>
                                <input name="rememberme" value="forever" checked="checked" type="checkbox">
                                Remember Me </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <input name="submit" class="btn  btn-block btn-lg btn-primary" value="LOGIN" type="submit">
                    </div>
                </div>
                <!--userForm-->

            </div>
            <div class="modal-footer">
                <p class="text-center"> Not here before? <a data-toggle="modal" data-dismiss="modal"
                                                            href="#ModalSignup"> Sign Up. </a> <br>
                    <a href="forgot-password.html"> Lost your password? </a></p>
            </div>
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- /.Modal Login -->

<!-- Modal Signup start -->
<div class="modal signUpContent fade" id="ModalSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h3 class="modal-title-site text-center"> REGISTER </h3>
            </div>
            <div class="modal-body">
                <div class="control-group"><a class="fb_button btn  btn-block btn-lg " href="#"> SIGNUP WITH
                    FACEBOOK </a></div>
                <h5 style="padding:10px 0 10px 0;" class="text-center"> OR </h5>

                <div class="form-group reg-username">
                    <div>
                        <input name="login" class="form-control input" size="20" placeholder="Enter Username"
                               type="text">
                    </div>
                </div>
                <div class="form-group reg-email">
                    <div>
                        <input name="reg" class="form-control input" size="20" placeholder="Enter Email" type="text">
                    </div>
                </div>
                <div class="form-group reg-password">
                    <div>
                        <input name="password" class="form-control input" size="20" placeholder="Password"
                               type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <div class="checkbox login-remember">
                            <label>
                                <input name="rememberme" id="rememberme" value="forever" checked="checked"
                                       type="checkbox">
                                Remember Me </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <input name="submit" class="btn  btn-block btn-lg btn-primary" value="REGISTER" type="submit">
                    </div>
                </div>
                <!--userForm-->

            </div>
            <div class="modal-footer">
                <p class="text-center"> Already member? <a data-toggle="modal" data-dismiss="modal" href="#ModalLogin">
                    Sign in </a></p>
            </div>
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!-- Le javascript
================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script>
    $(document).ready(function () {
        $('ul.long-list').hideMaxListItems({
            'max': 6,
            'speed': 500,
            'moreText': 'VIEW MORE ([COUNT])',
            'lessText': 'VIEW LESS',
            'moreHTML': '<p class="maxlist-more"><a href="#">MORE OF THEM</a></p>'
        });
    });


</script>


<!-- scrollme || onscroll parallax effect for category page  -->
<script src="assetsTemplate/assets/js/jquery.scrollme.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var isMobile = function () {
            //console.log("Navigator: " + navigator.userAgent);
            return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);
        };

        if (isMobile()) {
            // For  mobile , ipad, tab
            $('.animateme').removeClass('animateme');
            $('.category-wrapper').addClass('ismobile');
            $('.main-container-wrapper').addClass('ismobile');
            $('#category-intro').addClass('ismobile');

        } else {
        }
        $('.shrtByP a').click(function () {
            $('.shrtByP a').removeClass('active');
            $(this).addClass('active');
        });


        $('.filterToggle').click(function () {
            $(this).toggleClass('filter-is-off');
            $('.filterToggle span').toggleClass('is-off');
            $('.catColumnWrapper').toggleClass('filter-is-off');
            $('.catColumnWrapper .col-sm-4').toggleClass('col-sm-3 col-lg-3 col-md-3');

            // equal height reload function

            var $elements = $('.categoryProduct > .item');
            var columns = $elements.detectGridColumns();
            $elements.equalHeightGrid(columns);


            setTimeout(function () {
                        //  reload function after 0.5 second
                        $('.categoryProduct > .item').responsiveEqualHeightGrid();
                    }
                    , 500);


        });


        $('[data-toggle="collapse"]').click(function (e) {

            $('#accordion').on('show.bs.collapse', function (e) {
                $(e.target).prev().addClass('active').find('span').removeClass('hasPlus').addClass('hasMinus');
            })

            $('#accordion').on('hide.bs.collapse', function (e) {
                $(e.target).prev().addClass('active').find('span').addClass('hasPlus').removeClass('hasMinus');

            })
        });

    }); // end


    $(window).bind('resize load', function () {
        if ($(this).width() < 767) {
            $('#accordion .panel-collapse').collapse('hide');

            $('#accordion .panel-heading ').find('span').removeClass('hasMinus').addClass('hasPlus');

        } else {
            $('#accordion .panel-collapse').removeClass('out').addClass('in').css('height', 'auto');
            $('#accordion .panel-heading ').find('span').removeClass('hasPlus').addClass('hasMinus');


        }
    });

</script>


