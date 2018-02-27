@extends('articles_sidebar')

@section('seo_title')
    @if(!$category->seo_title)
        {{title_case($category->name)}}
    @else
        {{title_case($category->seo_title)}}
    @endif
@endsection
@section('meta_description',$category->meta_description)
@section('meta_keywords',$category->meta_keywords)

@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> {{$category->name}} </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            {{--<i class="fa fa-chevron-right"></i>--}}
            {{--<span class="child"> <a href="blog.html"> NEWS AND MEDIA </a> </span>--}}
            <i class="fa fa-chevron-right"></i>
            <span class="child"> {{$category->name}} </span>
        </div>
    </div>
@endsection

@section('article_content')
    <div class="col-md-9 blog-grid">
        <section class="blog-services">
            <div class="row news">
                @foreach($articles as $article)
                <div class="col-sm-6">
                    <div class="blog-img-box">
                        <div class="blog-date"> <span class="month">{{date("m",strtotime($article->published_at))}} </span> <span class="date"> {{date("d",strtotime($article->published_at))}}</span> </div>
                        <a class="hover-effect" href="/article/{{$article->slug}}">
                            <img src="{{Voyager::image(image_small($article->image))}}" alt="{{$article->name}}" />
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3><a href="/article/{{$article->slug}}">{{title_case($article->name)}} </a></h3>
                    </div>
                </div>
                    @if($loop->iteration %2 == 0)
                        <div class="clearfix spacer-60"> </div>
                    @endif
                @endforeach
            </div>
            <div class="clearfix spacer-60"> </div>
            {{$articles->links()}}
        </section>
    </div>
@endsection