<!DOCTYPE html>
<html lang="{{\Config::get('app.locale')}}">
<head>
    <script>
        function getCookie(c_name)
        {
            if (document.cookie.length>0)
            {
                c_start=document.cookie.indexOf(c_name + "=");
                if (c_start!=-1)
                {
                    c_start=c_start + c_name.length+1;
                    c_end=document.cookie.indexOf(";",c_start);
                    if (c_end==-1) c_end=document.cookie.length;
                    return unescape(document.cookie.substring(c_start,c_end))
                }
            }
            return ""
        }
        userId = getCookie('userId');
        dataLayer = [{
            'userId': userId
        }];
    </script>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Offshore - Responsive HTML Template">

    <title>@yield('seo_title') - {{setting('index.company_name')}}</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <link rel="icon" type="image/png" href="{{Voyager::image(setting('index.favicon'))}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/flexslider.css">
    @yield('add_css')
    <link href="/css/style.css" rel="stylesheet">
</head>

<body class="homepage">
<!-- Preloader -->
<div class="loader-wrapper">
    <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
    </div>
</div>

<!-- Page Wrapper -->
<div class="wrapper">

    <!-- Header Section -->
    <header>
        <div class="header-area">

            <!-- Top Contact Info -->
            <div class="row logo-top-info">
                <div class="container">
                    <div class="col-md-3 logo">
                        <!-- Main Logo -->
                        <a href="/"><img src="{{Voyager::image(setting('index.logo'))}}" alt="{{setting('index.company_name')}}" /></a>
                        <!-- Responsive Toggle Menu -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only"> Main Menu </span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="col-md-9 top-info-social">
                        <div class="pull-right">
                            <div class="top-info">
                                <div class="call">
                                    <h3> CALL US </h3>
                                    <p> {{setting('index.phone')}} </p>
                                </div>
                                <div class="email">
                                    <h3> EMAIL US </h3>
                                    <a href="mailto:"><p>{{setting('index.email')}}</p></a>
                                </div>
                            </div>
                            <div class="social">
                                <ul class="social-icons">
                                    <li><a href="{{setting('index.facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="{{setting('index.twitter')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="{{setting('index.linkedin')}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation Section -->
            <nav id="navbar" class="collapse navbar-collapse main-menu">
                <div class="container">
                    <ul class="main-menu">
                        <li class="active"> <a href="/"> Home </a></li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"> Products
                                <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
                            <ul>
                                @foreach($product_categories as $product_category)
                                <li> <a href="/product_category/{{$product_category->slug}}"> {{title_case($product_category->name)}}</a> </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#" data-toggle="dropdown"> About
                                <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
                            <ul>
                                <li> <a href="/about_us/our-company"> Our Company </a> </li>
                                <li> <a href="/about_us/our-mission"> Vision &amp; Mission </a> </li>
                                <li> <a href="/about_us/our-team"> Our Team </a> </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown"> Services
                                <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
                            <ul>
                                <li> <a href="/service/our-service"> Our Services</a> </li>
                                <li> <a href="/service/after-sale"> After Sale </a> </li>
                                <li> <a href="/service/faq"> FAQ</a> </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown"> News
                                <i class="fa fa-chevron-down dropdown-toggle"> </i>  </a>
                            <ul>
                                <li> <a href="/articles/news"> News </a> </li>
                                <li> <a href="/articles/articles"> Articles </a> </li>
                            </ul>
                        </li>
                        <li><a href="/contact_us"> CONTACT </a> </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header Section -->

    <!-- Main Content Section -->
    <main class="main">
        @yield('page_title')

        @yield('main')
    </main>
    <!-- Main Content Section -->



    <!-- Footer Section -->
    <footer>
        <div class="footer">
            <div class="container">
                <!-- Prefooter Section -->
                <div class="row pre-footer">
                    <div class="col-md-4">
                        <div class="contact-box">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="contact-details">
                                <h4 class="pre-footer-title">HEAD OFFICE</h4>
                                <p>{{setting('index.address')}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-box">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="contact-details">
                                <h4 class="pre-footer-title">CALL US</h4>
                                <p>{{setting('index.phone')}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-box">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <div class="contact-details">
                                <h4 class="pre-footer-title">EMAIL US</h4>
                                <a href="mailto:{{setting('index.email')}}"><p>{{setting('index.email')}}</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Prefooter Section -->

                <!-- Footer widgets -->
                <div class="row widgets">
                    <div class="col-md-4 col-sm-6">
                        <div class="about-txt widget">
                            <img src="{{Voyager::image(setting('index.logo2'))}}" alt="logo" />

                            <p>{{setting('contact-us.footer_content')}} </p>

                            <div class="widgets-social">
                                <a href="{{setting('index.facebook')}}"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
                                <a href="{{setting('index.twitter')}}"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="{{setting('index.linkedin')}}"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="quick-links widget">
                            <h2 class="widget-title">QUICK LINKS</h2>
                            <ul>
                                <li> <a href="/about_us/our-company"> About Us </a> </li>
                                <li> <a href="/contact_us"> Contact </a> </li>
                                <li> <a href="/service/our-service"> Service </a> </li>
                                <li> <a href="/articles/articles"> Articles </a> </li>
                                <li> <a href="/articles/news"> News </a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="spacer-50 visible-sm"></div>

                    <div class="col-md-3 col-sm-6">
                        <div class="our-services widget">
                            <h2 class="widget-title">OUR PRODUCTS</h2>
                            <ul>
                                @foreach($product_categories as $product_category)
                                <li> <a href="/product_category/{{$product_category->slug}}"> {{title_case($product_category->name)}} </a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="our-services widget">
                            <h2 class="widget-title">Our Service</h2>
                            <ul>
                                <li><a href="/service/our-service">Service</a></li>
                                <li><a href="/service/after-sale">After Sale</a></li>
                                <li><a href="/service/faq">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer widgets -->
            </div>
        </div>
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row copyright-bar">
                    <div class="col-md-6">
                        <p>Copyright © 2014 {{setting('index.company_name')}}. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p> <a href="#"> Terms of use</a> <a href="#">Privacy Policy</a> </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer Section -->

    <!-- back-to-top link -->
    <a href="#0" class="cd-top"> Top </a>

</div>

<!-- Page Wrapper
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Javascripts
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- Jquery Library -->
<script src="/js/jquery.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- jQuery Flex Slider -->
<script src="/js/jquery.flexslider-min.js"></script>

<!-- Counter JS -->
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.counterup.min.js"></script>

<!-- Back to top -->
<script src="/js/back-to-top.js"></script>

<!-- Form Validation -->
{{--<script src="/js/validate.js"></script>--}}

<!-- Subscribe Form JS -->
{{--<script src="/js/subscribe.js"></script>--}}
@yield('add_js')
<!-- Main JS -->
<script src="/js/main.js"></script>

</body>

</html>
