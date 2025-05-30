<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSathwa | AI-Powered Animal Rescue & Assistance Platform</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo5.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/odometer.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="slider-area">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide single-slider slider-bg d-flex align-items-center" style="background-image: url('img/slider/s1.jpg');">
                        <div class="container custom-container">
                            <div class="row">
                                <div class="col-xl-5 col-lg-7 col-md-10">
                                    <div class="slider-content">
                                        <div class="slider-title">
                                            <h2 class="title" data-animation="fadeInUpBig" data-delay=".2s" data-duration="1.2s">Join Our<span>Mission</span>to Save Animals</h2>
                                        </div>
                                        <div class="slider-desc">
                                            <p class="desc" data-animation="fadeInUpBig" data-delay=".4s" data-duration="1.2s">AI-powered solutions for rescuing animals in distress. Together, we can make the world kinder.</p>
                                        </div>
                                        <a href="dog-list.html" class="btn" data-animation="fadeInUpBig" data-delay=".6s" data-duration="1.2s">View More <img src="img/icon/w_pawprint.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide single-slider slider-bg d-flex align-items-center" style="background-image: url('img/slider/s2.jpg');">
                        <div class="container custom-container">
                            <div class="row">
                                <div class="col-xl-5 col-lg-7 col-md-10">
                                    <div class="slider-content">
                                        <div class="slider-title">
                                            <h2 class="title" data-animation="fadeInUpBig" data-delay=".2s" data-duration="1.2s">Support Strays <span>with</span> AI Innovation</h2>
                                        </div>
                                        <div class="slider-desc">
                                            <p class="desc" data-animation="fadeInUpBig" data-delay=".4s" data-duration="1.2s">Your compassion, our technology—saving lives together. Connect, assist, and create a safer future.</p>
                                        </div>
                                        <a href="dog-list.html" class="btn" data-animation="fadeInUpBig" data-delay=".6s" data-duration="1.2s">View More <img src="img/icon/w_pawprint.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide single-slider slider-bg d-flex align-items-center" style="background-image: url('img/slider/s3.jpg');">
                        <div class="container custom-container">
                            <div class="row">
                                <div class="col-xl-5 col-lg-7 col-md-10">
                                    <div class="slider-content">
                                        <div class="slider-title">
                                            <h2 class="title" data-animation="fadeInUpBig" data-delay=".2s" data-duration="1.2s">Support Strays <span>with</span> AI Innovation</h2>
                                        </div>
                                        <div class="slider-desc">
                                            <p class="desc" data-animation="fadeInUpBig" data-delay=".4s" data-duration="1.2s">Technology—saving lives together. Connect, assist, and create a safer future.</p>
                                        </div>
                                        <a href="dog-list.html" class="btn" data-animation="fadeInUpBig" data-delay=".6s" data-duration="1.2s">View More <img src="img/icon/w_pawprint.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="find-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <div class="find-wrap">
                                <div class="location">
                                    <i class="flaticon-location"></i>
                                    <input type="text" value="Enter City, State. or Zip">
                                </div>
                                <div class="find-category">
                                    <ul>
                                        <li><a href="shop.html"><i class="flaticon-dog"></i> Find Your Dog</a></li>
                                        <li><a href="shop.html"><i class="flaticon-happy"></i> Find Your Cat</a></li>                                      
                                    </ul>
                                </div>
                                <div class="other-find">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Find Other Pets
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="shop.html">Find Your Dog</a>
                                            <a class="dropdown-item" href="shop.html">Find Your Cat</a>                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="counter-area counter-bg" data-background="img/bg/counter_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="counter-title text-center mb-65">
                            <h6 class="sub-title">Why Choose Us?</h6>
                            <h2 class="title">"Connecting Compassionate Hearts with Animals in Distress"</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="80"></span>%</h2>
                            <p>SUCCESSFUL RESCUES</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="150"></span>+</h2>
                            <p>DAILY REPORTS</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="20"></span>+</h2>
                            <p>AI IDENTIFIED SPECIES</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="counter-item">
                            <h2 class="count"><span class="odometer" data-count="90"></span>%</h2>
                            <p>DATA ACCURACY (%)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="adoption-area">
            <div class="container">
                <div class="row align-items-center align-items-xl-end justify-content-center">
                    <div class="col-xl-7 col-lg-6 col-md-10 order-0 order-lg-2">
                        <div class="adoption-img">
                            <img src="img/images/index/i1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="adoption-content">
                            <h2 class="title">Working For <br> Dog <span>Adoption</span> Free, Happy Time</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a breed brwn and information.</p>
                            <a href="adoption.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="adoption-shape"><img src="img/images/adoption_shape.png" alt=""></div>
        </section>
        <section class="breeds-services pt-110 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Service to Breeds</h5>
                            <h2 class="title">Most Popular Dog Breed</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breed-services-active owl-carousel">
                            <div class="breed-services-item">
                                <div class="thumb">
                                    <img src="img/images/breed_services_img01.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="breeder-details.html">Golden Retriever</a></h3>
                                </div>
                            </div>
                            <div class="breed-services-item">
                                <div class="thumb">
                                    <img src="img/images/breed_services_img02.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="breeder-details.html">German Sharped</a></h3>
                                </div>
                            </div>
                            <div class="breed-services-item">
                                <div class="thumb">
                                    <img src="img/images/breed_services_img03.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="breeder-details.html">Siberian Husky</a></h3>
                                </div>
                            </div>
                            <div class="breed-services-item">
                                <div class="thumb">
                                    <img src="img/images/breed_services_img04.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h3 class="title"><a href="breeder-details.html">Bernes Mountain</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="breed-services-info" data-background="img/bg/breed_services_bg.jpg">
                            <h5 class="sub-title">Dog Breeder</h5>
                            <h3 class="title">Available for Breed</h3>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provid dogs</p>
                            <a href="dog-list.html" class="btn">More Pets <img src="img/icon/w_pawprint.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breed-services-shape"><img src="img/images/breed_services_shape01.png" alt=""></div>
            <div class="breed-services-shape shape-two"><img src="img/images/breed_services_shape02.png" alt=""></div>
        </section>
        <section class="faq-area faq-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-img-wrap">
                            <img src="img/images/faq_tv.png" class="img-frame" alt="">
                            <img src="img/images/faq_img.png" class="main-img" alt="">
                            <a href="https://www.youtube.com/watch?v=XdFfCPK5ycw" class="popup-video"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-wrapper">
                            <div class="section-title mb-35">
                                <h5 class="sub-title">FAQ Question</h5>
                                <h2 class="title">History & Family Adoption</h2>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Working for dog adoption
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Competitions & Awards
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                The puppies are 3 months old
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            The best overall dog DNA test is embark breed & health Kit (view atths Chewy), which provides you with a breed brwn and ition on provides ancestors most dogs.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-shape"><img src="img/images/faq_shape.png" alt=""></div>
        </section>
        <div class="brand-area pt-80 pb-80">
            <div class="container">
                <div class="row brand-active">
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item01.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item02.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item03.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item04.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item05.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item06.png" alt="img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="img/brand/brand_item03.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="adoption-shop-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Meet the animals</h5>
                            <h2 class="title">Puppies Waiting for Adoption</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb01.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Mister Tartosh</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">Siberian Husky</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2021</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>Free</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb02.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Charlie</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">Golden Retriever</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2020</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>$30</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb03.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Alessia Max</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">German Sherped</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2020</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>$29</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb04.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Canadian</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">German Sherped</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2021</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>$39</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb05.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Entertainment</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">Siberian Husky</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2021</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>Free</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="adoption-shop-item">
                            <div class="adoption-shop-thumb">
                                <img src="img/product/adoption_shop_thumb06.jpg" alt="">
                                <a href="shop-details.html" class="btn">Adoption <img src="img/icon/w_pawprint.png" alt=""></a>
                            </div>
                            <div class="adoption-shop-content">
                                <h4 class="title"><a href="shop-details.html">Dangerous</a></h4>
                                <div class="adoption-meta">
                                    <ul>
                                        <li><i class="fas fa-cog"></i><a href="#">Golden Retriever</a></li>
                                        <li><i class="far fa-calendar-alt"></i> Birth : 2021</li>
                                    </ul>
                                </div>
                                <div class="adoption-rating">
                                    <ul>
                                        <li class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li class="price">Total Price : <span>Free</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonial-area testimonial-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Testimonials</h5>
                            <h2 class="title">Our Happy Customers</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-active">
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <div class="testi-avatar-thumb">
                                <img src="img/images/testi_avatar01.png" alt="">
                            </div>
                            <div class="testi-content">
                                <p>“ The best overall dog DNA test Embark Breed & Health Kit (view at Chewy), which provides with a breed brwn and information ”</p>
                                <div class="testi-avatar-info">
                                    <h5 class="title">Alessia Cara</h5>
                                    <span>Googel CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <div class="testi-avatar-thumb">
                                <img src="img/images/testi_avatar02.png" alt="">
                            </div>
                            <div class="testi-content">
                                <p>“ The best overall dog DNA test Embark Breed & Health Kit (view at Chewy), which provides with a breed brwn and information ”</p>
                                <div class="testi-avatar-info">
                                    <h5 class="title">Alessia Cara</h5>
                                    <span>Googel CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <div class="testi-avatar-thumb">
                                <img src="img/images/testi_avatar01.png" alt="">
                            </div>
                            <div class="testi-content">
                                <p>“ The best overall dog DNA test Embark Breed & Health Kit (view at Chewy), which provides with a breed brwn and information ”</p>
                                <div class="testi-avatar-info">
                                    <h5 class="title">Alessia Cara</h5>
                                    <span>Googel CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <div class="testi-avatar-thumb">
                                <img src="img/images/testi_avatar02.png" alt="">
                            </div>
                            <div class="testi-content">
                                <p>“ The best overall dog DNA test Embark Breed & Health Kit (view at Chewy), which provides with a breed brwn and information ”</p>
                                <div class="testi-avatar-info">
                                    <h5 class="title">Alessia Cara</h5>
                                    <span>Googel CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog-area pt-110 pb-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="section-title text-center mb-65">
                            <div class="section-icon"><img src="img/icon/pawprint.png" alt=""></div>
                            <h5 class="sub-title">Our News</h5>
                            <h2 class="title">Latest News Update</h2>
                            <p>The best overall dog DNA test is Embark Breed & Health Kit (view at Chewy), which provides you with a
                                breed brwn and information Most dogs</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item mb-50">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="img/blog/blog_post_thumb01.jpg" alt=""></a>
                                <div class="blog-post-tag">
                                    <a href="#"><i class="flaticon-bookmark-1"></i>Sharped</a>
                                </div>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="far fa-user"></i><a href="#">Admin</a></li>
                                        <li><i class="far fa-bell"></i> Mar 10, 2021</li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Working For Dog Adoption</a></h3>
                                <p>The best overall dog test is Embark Breed & Health Kit view at Chewy.</p>
                                <a href="blog-details.html" class="read-more">Read More <img src="img/icon/pawprint.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item mb-50">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="img/blog/blog_post_thumb02.jpg" alt=""></a>
                                <div class="blog-post-tag">
                                    <a href="#"><i class="flaticon-bookmark-1"></i>Creative</a>
                                </div>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="far fa-user"></i><a href="#">Admin</a></li>
                                        <li><i class="far fa-bell"></i> Mar 12, 2021</li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Dog Derived From an Ancient</a></h3>
                                <p>The best overall dog test is Embark Breed & Health Kit view at Chewy.</p>
                                <a href="blog-details.html" class="read-more">Read More <img src="img/icon/pawprint.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item mb-50">
                            <div class="blog-post-thumb">
                                <a href="blog-details.html"><img src="img/blog/blog_post_thumb03.jpg" alt=""></a>
                                <div class="blog-post-tag">
                                    <a href="#"><i class="flaticon-bookmark-1"></i>Business</a>
                                </div>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="far fa-user"></i><a href="#">Admin</a></li>
                                        <li><i class="far fa-bell"></i> Mar 12, 2021</li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="blog-details.html">Ten Dog Breeds are Noted</a></h3>
                                <p>The best overall dog test is Embark Breed & Health Kit view at Chewy.</p>
                                <a href="blog-details.html" class="read-more">Read More <img src="img/icon/pawprint.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="newsletter-area pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="newsletter-wrap">
                            <div class="newsletter-content">
                                <h2 class="title">Newsletter For</h2>
                                <p><span>*</span> Do Not Show Your Email.</p>
                            </div>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Enter Your Email...">
                                    <button type="submit" class="btn">Subscribe</button>
                                </form>
                            </div>
                            <div class="newsletter-shape"><img src="img/images/newsletter_shape01.png" alt=""></div>
                            <div class="newsletter-shape shape-two"><img src="img/images/newsletter_shape02.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.odometer.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


     <!-- Firebase Authentication Script -->
     <script type="module">
        // Import Firebase functions
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.11.0/firebase-app.js";
        import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.11.0/firebase-auth.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.11.0/firebase-analytics.js";

        // Your Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAgKho4fZwhtFI_3BQ6B9PGWZkeZx310pg",
            authDomain: "save-sathwa.firebaseapp.com",
            projectId: "save-sathwa",
            storageBucket: "save-sathwa.firebasestorage.app",
            messagingSenderId: "420315536794",
            appId: "1:420315536794:web:69943066a5d5b28543ee23",
            measurementId: "G-1G4G7X21B3"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        const auth = getAuth();
        const provider = new GoogleAuthProvider();

        // Google Sign-In Button Event Listener
        document.getElementById("google-signin-btn").addEventListener("click", function() {
            signInWithPopup(auth, provider)
                .then((result) => {
                    // Get the signed-in user
                    const user = result.user;
                    console.log("User signed in:", user);

                    // Prepare user data
                    const userData = {
                        uid: user.uid,
                        name: user.displayName,
                        email: user.email,
                        picture: user.photoURL
                    };

                    // Send user data to PHP script
                    fetch('save_user.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(userData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Login successful! User data saved.");
                            // Update session
                            fetch('set_session.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(userData)
                            })
                            .then(() => {
                                // Redirect to profile or home
                                window.location.href = 'profile.php';
                            });
                        } else {
                            alert("Error saving user data: " + data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error saving user:", error);
                        alert("Error saving user data.");
                    });
                })
                .catch((error) => {
                    console.error("Sign-in error:", error);
                    alert("Error signing in: " + error.message);
                });
        });
    </script>
</body>
</html>