<?php
include 'config/connect.php';
include 'config/funtion.php';
include 'auth.php';
// session_start();
//   session_destroy();
ob_start();
// print_r($_SESSION);
?>
<?php
$slider =  execute("SELECT * FROM  image WHERE type = 0 and status = 0 ORDER BY ordering limit 0,5")->fetch_all(MYSQLI_ASSOC);
$banner =  execute("SELECT * FROM  image WHERE type = 1 and status = 0 ORDER BY ordering")->fetch_all(MYSQLI_ASSOC);
$payment =  execute("SELECT * FROM  image WHERE type = 3 and status = 0 ORDER BY ordering DESC limit 0,5")->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LEARNMORE'NTHINK – Book Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.png">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="public/css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <!-- font-awesome css -->
    <!-- <link rel="stylesheet" href="public/css/font-awesome1.min.css"> -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <!-- flexslider.css-->
    <link rel="stylesheet" href="public/css/flexslider.css">
    <!-- chosen.min.css-->
    <link rel="stylesheet" href="public/css/chosen.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/gooney-menu.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- modernizr css -->
        <!-- style css -->
    <link rel="stylesheet" href="public/style.css">

</head>

<body class="home-4">
    <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header-area-start -->
    <header>
        <!-- header-top-area-start -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="account-area text-right">
                            <ul>
                                    <li><p style="color:white; font-size: 20px; margin:10px;">Xin chào <?php echo $_SESSION['username']; ?>!</p></li>
                                    <li><a class="btn btn-primary" style="color:white; border-radius: 10px; font-size:20px; margin-left: 7px" href="logout.php" role="button">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top-area-end -->
        <!-- header-mid-area-start -->
        <div class="header-mid-area ptb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="logo-area">
                            <a href="index.php"><img src="public/img/logo/2.png" alt="logo" style=" margin: -25px; padding-top:5px;"/></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <div class="header-search">
                            <form action="category.php" id="search_form">
                                <input type="text" placeholder="Nhập từ khóa tìm kiếm. . ." name="search"/>
                                <a href="javascript:{}" onclick="document.getElementById('search_form').submit();"><i class="fa fa-search"></i><input type="hidden"></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="my-cart" id="cart-top">
                            <ul>
                                <li><a href="cart.php" id="cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
                                    <span><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                                    <div class="mini-cart-sub">
                                        <div class="cart-product">
                                            <?php if (isset($_SESSION['cart'])) { ?>
                                                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                                    <div class="single-cart">
                                                        <div class="cart-img">
                                                            <a href="#"><img src="admin/public/image/product/<?php echo $value['image'] ?>" alt="book" /></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h5><a href="#"><?php echo $value['name'] ?></a></h5>
                                                            <p><?php echo $value['quantity'] ?> x <span class="price"><?php echo $value['price'] ?></span></p>
                                                        </div>
                                                        <div class="cart-icon">
                                                            <a href="xuli-cart.php?action=remove&id=<?php echo $value['id']; ?>"><i class="fa fa-remove"></i></a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="cart-totals">
                                            <h5>Total <span class="price"><?php echo isset($_SESSION['total_cart']) ? $_SESSION['total_cart'] : 0 ?></span></h5>
                                        </div>
                                        <div class="cart-bottom">
                                            <a class="view-cart" href="cart.php">Xem giỏ hàng</a>
                                            <a href="checkout.php">Thanh toán</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-mid-area-end -->
        <!-- main-menu-area-start -->
        <div class="main-menu-area hidden-sm hidden-xs" id="header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-area">
                            <nav>
                                <ul>
                                    <li class="active"><a href="index.php">Trang chủ</a></li>
                                    <li><a href="category.php">Danh mục<i class="fa fa-angle-down"></i></a>
                                        <div class="mega-menu">
                                            <?php
                                            $category = execute("SELECT * FROM category WHERE parent_id = 0");

                                            foreach ($category as $key => $value) {
                                                $parent = $value['id'];
                                                $sub = execute("SELECT * FROM category WHERE parent_id = $parent");
                                                ?>
                                                <span>
                                                    <a href="category.php?cate_id=<?php echo $value['id']; ?>" class="title"><?php echo $value['name']; ?></a>
                                                    <?php foreach ($sub as $k => $val) { ?>
                                                        <a href="category.php?cate_id=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a>
                                                    <?php } ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li><a href="news.php">Tin tức</a></li>
                                    <li><a href="about.php">Giới thiệu</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu-area-end -->
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul id="nav">
                                    <li><a href="index.php">Trang chủ</a></li>
                                    <li><a href="category.php">Danh mục</a>
                                        <ul>
                                            <?php foreach ($category as $key => $value) {
                                                $parent = $value['id'];
                                                $sub = execute("SELECT * FROM category WHERE parent_id = $parent");
                                                ?>
                                                <li><a href="#"><?php echo $value['name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="category.php">Thể loại</a>
                                        <ul>
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="product-details.html">product-details</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">blog-details</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="news.php">Tin tức</a></li>
                                    <li><a href="about.php">Giới thiệu</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">blog-details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Liên hệ</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">blog-details</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-end -->
    </header>