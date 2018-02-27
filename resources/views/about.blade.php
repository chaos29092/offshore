@extends('master')

@section('seo_title')
    @if(!$page->seo_title)
        {{title_case($page->title)}}
    @else
        {{title_case($page->seo_title)}}
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


@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> {{title_case($page->title)}} </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> {{title_case($page->title)}} </span>
        </div>
    </div>
@endsection

@section('main')
        <div class="container">

            <div class="row about-sidebar">

                <div class="col-md-9 about-content">

                    <section class="about-company">

                        <div class="com culture">
                            <h2 class="culture-title"> {{title_case($page->title)}} </h2>
                            <h4 class="culture-subtitle"> {{$page->excerpt}} </h4>

                            {!! $page->body !!}

                        </div>
                    </section>

                </div>

                <div class="col-md-3 sidebar left">

                    <div class="sidebar-blog-categories">
                        <ul>
                            <li> <a href="/about_us/our-company"> Our Company </a> </li>
                            <li> <a href="/about_us/our-mission"> Our Vision &amp; Mission </a> </li>
                            <li> <a href="/about_us/our-team"> Our Team </a> </li>
                        </ul>
                    </div>

                    {{--<div class="sidebar-download">--}}
                        {{--<div class="download-file color-bg">--}}
                            {{--<a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Download PDF <span>1.5 MB</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="sidebar-fact">

                        <h3 class="about-quick-fact">Quick Fact</h3>
                        <p>{{setting('index.about_us_sidebar')}}</p>
                        <a href="/contact_us" class="btn btn-primary about-quick-fact-button" role="button">CONTACT US</a>

                    </div>

                </div>

            </div>

        </div>
@endsection