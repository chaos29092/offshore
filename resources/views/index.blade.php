@extends('master')

@section('seo_title')
    @if(!$page->seo_title)
        {{$page->title}}
    @else
        {{$page->seo_title}}
    @endif
@endsection
@section('meta_description')
    @if(!$page->meta_description)
        {{$page->excerpt}}
    @else
        {{$page->meta_description}}
    @endif
@endsection
@section('meta_keywords',$page->meta_keywords)

@section('add_css')
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.min.css">
@endsection

@section('main')
        <section class="home-slider">
            <div class="flexslider">
                <ul class="slides">
                    <li class="has-overlay">
                        <img src="{{Voyager::image(setting('slide-1.image'))}}" alt="{{setting('slide-1.title')}}" />
                        <div class="slider-content">
                            <div class="container">
                                <h2> {{setting('slide-1.title')}} </h2>
                                <p> {{setting('slide-1.content')}} </p>
                                <a href="{{setting('slide-1.url')}}" class="btn primary-btn"> KNOW MORE <i class="fa fa-angle-right"></i> </a>
                            </div>
                        </div>
                    </li>
                    <li class="has-overlay">
                        <img src="{{Voyager::image(setting('slide-2.image'))}}" alt="{{setting('slide-2.title')}}" />
                        <div class="slider-content text-right">
                            <div class="container">
                                <h2> {{setting('slide-2.title')}} </h2>
                                <p> {{setting('slide-2.content')}} </p>
                                <a href="{{setting('slide-2.url')}}" class="btn primary-btn"> KNOW MORE <i class="fa fa-angle-right"></i> </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="home-services">
            <div class="container">
                <div class="row services">
                    @foreach($product_categories as $product_category)
                    <div class="col-md-4">
                        <a href="/product_category/{{$product_category->slug}}">
                            <div class="hover-effect">
                                <img src="{{Voyager::image($product_category->image)}}" alt="{{$product_category->name}}" />
                            </div>
                            <h4 class="services-title-one subtitle">{{title_case($product_category->name)}}</h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="home-links">
            <div class="container">
                <div class="row links">
                    <div class="col-md-2">
                        <h4 class="links-title subtitle">Quick Links</h4>
                    </div>
                    <div class="col-md-2">
                        <a href="/about_us/our-company" class="btn btn-primary" role="button">About Us</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/contact_us" class="btn btn-primary" role="button">Contact</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/service" class="btn btn-primary" role="button">Service</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/articles/articles" class="btn btn-primary" role="button">Articles</a>
                    </div>
                    <div class="col-md-2">
                        <a href="/articles/news" class="btn btn-primary" role="button">News</a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row ceo">
                    <div class="col-md-6">
                        <div class="ceo-photo">
                            <img src="{{Voyager::image(setting('index.about_us_image'))}}" alt="About Us" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="ceo-details">
                            <h2 class="ceo-title color-title"> About Us </h2>
                            <h4 class="ceo-subtitle subtitle"> About Our Company </h4>
                            {!! setting('index.about_us_content') !!}
                            <a href="/about_us/our-company" class="btn btn-default btn-normal">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-news">
            <div class="container">
                <div class="section-title text-center">
                    <h2 class="title-blog color-title"> NEWS AND MEDIA </h2>
                    <h2 class="subtitle-blog title-2"> LATEST NEWS </h2>
                    <div class="spacer-50"> </div>
                </div>
                <div class="row news">
                    @foreach($latest_news as $latest_new)
                    <div class="col-md-4">
                        <div class="blog-img-box">
                            <div class="blog-date"> <span class="month">{{date("m",strtotime($latest_new->published_at))}} </span> <span class="date"> {{date("d",strtotime($latest_new->published_at))}}</span> </div>
                            <a class="hover-effect" href="/article/{{$latest_new->slug}}">
                                <img src="{{Voyager::image(image_small($latest_new->image))}}" alt="{{$latest_new->name}}" />
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3><a href="/article/{{$latest_new->slug}}"> {{title_case($latest_new->name)}} </a> </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="blog-btn text-center">
                    <a href="/articles/news" class="btn btn-primary" role="button">READ THE ARTICLES</a>
                </div>
            </div>
        </section>
@endsection

@section('add_js')
    <!-- Owl Carousel -->
    <script src="/js/owl.carousel.min.js"></script>
@endsection