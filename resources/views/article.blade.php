@extends('articles_sidebar')

@section('seo_title')
    @if(!$article->seo_title)
        {{title_case($article->name)}}
    @else
        {{title_case($article->seo_title)}}
    @endif
@endsection
@section('meta_description')
    @if(!$article->meta_description)
        {{$article->excerpt}}
    @else
        {{$article->meta_description}}
    @endif
@endsection
@section('meta_keywords',$article->meta_keywords)

@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> {{$article->name}} </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> <a href="/articles/{{$category->slug}}"> {{$category->name}} </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> {{title_case($article->name)}} </span>
        </div>
    </div>
@endsection

@section('article_content')
    <div class="col-md-9 blog-info">
        <section class="blog-single">
            <div class="blog-slide">
                <ul class="slides">
                    <li>
                        <img src="{{Voyager::image($article->image)}}" alt="{{title_case($article->name)}}" />
                    </li>
                </ul>
            </div>

            <div class="single-post">
                <h4 class="services-title-one subtitle">{{title_case($article->name)}} </h4>
                {!! $article->body !!}
            </div>

            <div class="social-share text-center">
                <a class="fb-share" href="#"> <i class="fa fa-facebook" aria-hidden="true"></i>Share on Facebook </a>
                <a class="tweet-share" href="#"> <i class="fa fa-twitter" aria-hidden="true"></i>Share on Twitter </a>
            </div>

            {{--<div class="author-box">--}}
                {{--<img src="/images/post-author.png" alt="Taylor">--}}
                {{--<div class="author-details">--}}
                    {{--<h4 class="subtitle">Taylor White</h4>--}}
                    {{--<p>Continually myocardinate reliable channels with distributed networks. Monotonectally scale end-to-end bandwidth for ethical e-markets. </p>--}}
                    {{--<div class="author-share">--}}
                        {{--<a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>--}}
                        {{--<a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>--}}
                        {{--<a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </section>
    </div>
@endsection