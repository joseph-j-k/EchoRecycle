<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EcoRecycle</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Assest/Templates/User/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assest/Templates/User/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Assest/Templates/User/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assest/Templates/User/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assest/Templates/User/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <img class="img-fluid" src="Assest/Templates/User/img/logonew.png" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link active">About</a>
                        <a href="#services" class="nav-item nav-link active">Service</a>
                        <a href="#wastetype" class="nav-item nav-link active">Wastetypes</a>
                        <a href="#contact" class="nav-item nav-link active">Contact</a>
                        <a href="Guest/Userregistration.php" class="nav-item nav-link">User Register</a>
                        <a href="Guest/Wastepickerregistration.php" class="nav-item nav-link">Waste Picker</a>
                        <a href="Guest/Login.php" class="nav-item nav-link">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="Assest/Templates/User/img/bg.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark">EcoRecycle</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Make it green</h1>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="Assest/Templates/User/img/leaf.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark">EcoRecycle</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Make it green</h1>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
     <section id="about">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="Assest/Templates/User/img/picker.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="Assest/Templates/User/img/carry.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="Assest/Templates/User/img/cover.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="Assest/Templates/User/img/lady.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">About Us</p>
                        <h1 class="display-6">The success history of EcoRecycle in 25 years</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="Assest/Templates/User/img/icon.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Empowering communities to recycle, restore, and protect our planet</h5>
                            <p class="mb-0">Our waste management system transforms waste into reusable resources through efficient collection, sorting, and recycling. We’re committed to reducing landfill impact and fostering a sustainable, cleaner future.</p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Join Us in Transforming Waste into Opportunity</h5>
                            <p class="mb-0">Join us in transforming waste into value. Our system rewards users for responsible waste disposal, creating a cleaner environment and a more sustainable future—together</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="Assest/Templates/User/img/earthblue.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </section>
    <!-- About End -->


    <!-- services -->
     <section id="services">
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Services</p>
                <h1 class="display-6">Let's Discover</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="" class="d-block product-item rounded">
                    <img src="Assest/Templates/User/img/aware.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Awareness program</h4>
                        <span class="text-body">
                        We conduct awareness programs to educate and motivate communities about effective waste management and recycling practices.
                    </span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="Assest/Templates/User/img/reward.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Rewards</h4>
                        <span class="text-body">We reward residents based on the quantity of waste collected, encouraging responsible disposal and active participation in waste management.</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="Assest/Templates/User/img/recycle.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Recycle</h4>
                        <span class="text-body">We recycle waste materials, transforming plastics, metals, and paper into reusable resources, reducing landfill impact and supporting a sustainable future.</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="Assest/Templates/User/img/collect.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Waste Collections</h4>
                        <span class="text-body">Our waste pickers collect waste from residents in each designated ward, ensuring a clean and organized neighborhood.</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
     </section>
    <!-- services End -->


    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid" src="Assest/Templates/User/img/man.jpg" alt="">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Article</p>
                        <h1 class="display-6">Efficient Waste Management for a Cleaner Future</h1>
                    </div>
                    <p class="mb-4">At EcoRecycle, we’re redefining waste management by focusing on sustainable practices that benefit both the environment and the community. Through efficient collection, segregation, and recycling, we ensure that waste is managed responsibly, reducing its impact on our planet.</p>

                       <p>Our mission is simple: create cleaner spaces and a healthier future for generations to come.  </p>
                       <p> Whether it's paper, plastic, metals, or e-waste, every material we recycle helps in reducing our carbon footprint and protecting biodiversity.</p>
                    <p class="mb-4">Our approach goes beyond just waste collection—we educate, engage, and empower communities to make greener choices. </p>
                    
                    <p>Join hands with us on this journey to a cleaner, greener tomorrow. At EcoRecycle, every small action counts toward a big change.With our focus on innovation and community involvement, we strive to lead the way toward a cleaner and greener future.</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->


    <!-- Video Start -->
    <div class="container-fluid video my-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-5">
                        <h1 class="display-6 mb-4">
                        Turning<span class="text-white"> Trash</span> into <span class="text-white"> Treasure</span></h1>
                        <h5 class="fw-normal lh-base fst-italic text-white mb-5"></h5>
                        <div class="row g-4 mb-5">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Profiting from Waste</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Recycling Innovation</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Green Economy</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <span class="text-dark">Sustainable Production</span>
                                </div>
                            </div>
                        </div>
                        <!--<a class="btn btn-light rounded-pill py-3 px-5" href="">Explore More</a>-->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/AJVky2Fzl54" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="https://youtu.be/V7TcEnSOR3s" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- wastetype -->
     <section id="wastetype">
     <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Wastetypes</p>
                <h1 class="display-6"> Choose the Wastetype ! Earn your Reward</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/paper.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                
                            </div>
                            <h4 class="mb-3">Recycle Papers</h4>
                            <p> Turn in your used paper and get rewarded for every kilogram you recycle.</p>
                        
                        </div>
                        <div class="store-overlay">
                           <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        --> </div>
                    </div>
                </div>
                <!--e-wate-->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/cloth.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                
                            </div>
                            <h4 class="mb-3">Old Fabric</h4>
                            <p> Recycle your fabrics and earn points while contributing to sustainable fashion and waste reduction.</p>
                            
                        </div>
                        <div class="store-overlay">
                           <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        --></div>
                    </div>
                </div>
                <!--e-waste-->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/ewaste.jpg" alt="">
                        <div class="p-4">
                           <div class="text-center mb-3">
                               
                           </div>
                            <h4 class="mb-3">Electronic Waste</h4>
                            <p>Every piece of glass you recycle helps reduce landfill waste and saves energy.</p>
                            
                        </div>
                        <div class="store-overlay">
                            <!--<a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        --> </div>
                    </div>
                </div>
                <!--polythene-->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/metal1.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                
                            </div>
                            <h4 class="mb-3">Metals</h4>
                            <p>Give scrap metal a new life! Recycle your old metal items and earn rewards </p>
                            
                        </div>
                        <div class="store-overlay">
                          <!--  <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        --> </div>
                    </div>
                </div>
                <!--paper-->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/glass.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                
                            </div>
                            <h4 class="mb-3">Glasses</h4>
                            <p>Recycle your glass items and earn points while preserving the environment</p>
                            
                        </div>
                        <div class="store-overlay">
                        <!--    <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        -->   </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="Assest/Templates/User/img/plastic1.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                
                            </div>
                            <h4 class="mb-3">Recycle Plastics</h4>
                            <p> Recycle all types of plastic materials and get rewarded for every contribution.</p>
                            
                        </div>
                        <div class="store-overlay">
                          <!--  <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        -->  </div>
                    </div>
                </div>
               <!-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
                        --> </div>
            </div>
        </div>
    </div>
     </section>
    <!-- service End -->


    


    <!-- Contact Start -->
     <section id="contact">
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact us right now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <!--<p class="text-center mb-5">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>-->
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">ecorecycle@example.com</p>
                            <p class="mb-0">support@example.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+012 345 67890</p>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">EcoRecycle Office Example
                            </p>
                            <p class="mb-0">Plot No. 123, Sector 5
                            Idukki, Kerala 122002
                             India

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </section>
    <!-- Contact Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>EcoRecycle Office  No. 123, Sector 5
                            Idukki, Kerala 122002
                             India</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>ecorecycle@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#about">About Us</a>
                    <a class="btn btn-link" href="#contact">Contact Us</a>
                    <a class="btn btn-link" href="#services">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Newsletter</h4>
                    <p>Sign up to receive updates.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">EcoRecycle</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-medium" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="fw-medium" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assest/Templates/User/lib/wow/wow.min.js"></script>
    <script src="Assest/Templates/User/lib/easing/easing.min.js"></script>
    <script src="Assest/Templates/User/lib/waypoints/waypoints.min.js"></script>
    <script src="Assest/Templates/User/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assest/Templates/User/js/main.js"></script>
</body>

</html>