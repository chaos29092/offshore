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
        <h2 class="title"> Message sending success ! </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> Message sending success ! </span>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <section class="contact">
            <div class="row contact-centers">
                <div class="col-md-12">
                    <div class="contact-area-box">
                        {!! $page->body !!}
                    </div>
                </div>

                {{--<div class="col-md-4">--}}
                    {{--<div class="contact-area-box">--}}
                        {{--<h4 class="contact-title subtitle">United Kingdom</h4>--}}
                        {{--<div class="address">--}}
                            {{--<i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                            {{--<p>384 Walworth Rd--}}
                                {{--<br> London SE17 2NG--}}
                                {{--<br> United Kingdom</p>--}}
                        {{--</div>--}}
                        {{--<div class="phone">--}}
                            {{--<i class="fa fa-phone" aria-hidden="true"></i>--}}
                            {{--<p>+44 (345) 165 7235</p>--}}
                        {{--</div>--}}
                        {{--<div class="email">--}}
                            {{--<i class="fa fa-envelope" aria-hidden="true"></i>--}}
                            {{--<p> <a href="mailto:london@offshoreindustry.com"> london@offshoreindustry.com </a> </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-4">--}}
                    {{--<div class="contact-area-box">--}}
                        {{--<h4 class="contact-title subtitle">Australia</h4>--}}
                        {{--<div class="address">--}}
                            {{--<i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                            {{--<p>274 Little Lonsdale St--}}
                                {{--<br> Melbourne VIC 3000--}}
                                {{--<br> Australia</p>--}}
                        {{--</div>--}}
                        {{--<div class="phone">--}}
                            {{--<i class="fa fa-phone" aria-hidden="true"></i>--}}
                            {{--<p>+61 3 9670 5522</p>--}}
                        {{--</div>--}}
                        {{--<div class="email">--}}
                            {{--<i class="fa fa-envelope" aria-hidden="true"></i>--}}
                            {{--<p> <a href="mailto:aus@offshoreindustry.com"> aus@offshoreindustry.com </a> </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </section>

    </div>
@endsection