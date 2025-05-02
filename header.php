<?php
// session_start(); // Removed to avoid duplicate session_start
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
$first_name = explode(' ', $user_name)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSathwa</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/odometer.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>
    <header>
        <div class="header-top-area">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="header-top-left">
                            <ul>
                                <li>Call us: 747-800-9880</li>
                                <li><i class="far fa-clock"></i>Opening Hours: 7:00 am - 9:00 pm (Mon - Sun)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="header-top-right">
                            <ul class="header-top-social">
                                <li class="follow">Follow :</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo"><a href="index.php"><img src="img/logo/logo5.png" alt=""></a></div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
                                    <ul class="navigation">
                                        <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?> menu-item-has-children">
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li class="<?php echo ($current_page == 'about_us.php') ? 'active' : ''; ?>">
                                            <a href="about_us.php">About Us</a>
                                        </li>
                                        <li class="<?php echo ($current_page == 'shop.html') ? 'active' : ''; ?> menu-item-has-children">
                                            <a href="shop.html">Rescue Finder</a>
                                            <ul class="submenu">
                                                <li><a href="shop.html">Reporting</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo ($current_page == 'adoption.html') ? 'active' : ''; ?>">
                                            <a href="adoption.html">Report Case</a>
                                        </li>
                                        <li class="<?php echo ($current_page == 'breeder.html') ? 'active' : ''; ?> menu-item-has-children">
                                            <a href="breeder.html">SnakeID</a>
                                            <ul class="submenu">
                                                <li><a href="breeder.html">Our Breeder</a></li>
                                                <li><a href="breeder-details.html">Breeder Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo ($current_page == 'blog.html') ? 'active' : ''; ?> menu-item-has-children">
                                            <a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo ($current_page == 'contacts.php') ? 'active' : ''; ?>">
                                            <a href="contacts.php">Contacts</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#"><i class="flaticon-search"></i></a></li>
                                        <?php if (isset($_SESSION['user_id'])): ?>
                                            <li class="header-user">
                                                <a href="profile.php" class="user-profile">
                                                    <span class="user-name text-sm"><?php echo htmlspecialchars($first_name); ?></span>
                                                    <i class="fas fa-user-circle"></i>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="header-btn"><a href="login.php" class="btn">Login <img src="img/icon/w_pawprint.png" alt=""></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo"><a href="index.php"><img src="img/logo/logo.png" alt="" title=""></a></div>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <div class="mobile-user-profile">
                                        <a href="profile.php" class="btn">
                                            <span class="text-sm"><?php echo htmlspecialchars($first_name); ?></span>
                                            <i class="fas fa-user-circle"></i>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="mobile-login-btn">
                                        <a href="login.php" class="btn">Login <img src="img/icon/w_pawprint.png" alt=""></a>
                                    </div>
                                <?php endif; ?>
                                <div class="menu-outer"></div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                    </div>
                </div>
                <div class="header-shape" data-background="img/bg/header_shape.png"></div>
            </div>
            <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="search-close">
                    <span><i class="fas fa-times"></i></span>
                </div>
                <div class="search-wrap text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="title">... Search Here ...</h2>
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" name="search" placeholder="Type keywords here">
                                        <button class="search-btn"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>