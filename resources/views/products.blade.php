@extends('products_sidebar')

@section('seo_title')
    @if(!$product_category->seo_title)
        {{title_case($product_category->name)}}
    @else
        {{title_case($product_category->seo_title)}}
    @endif
@endsection
@section('meta_description',$product_category->meta_description)
@section('meta_keywords',$product_category->meta_keywords)

@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> {{title_case($product_category->name)}} </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            {{--<i class="fa fa-chevron-right"></i>--}}
            {{--<span class="child"> <a href="blog.html"> NEWS AND MEDIA </a> </span>--}}
            <i class="fa fa-chevron-right"></i>
            <span class="child"> {{title_case($product_category->name)}} </span>
        </div>
    </div>
@endsection

@section('products_content')
    <div class="col-md-9 services-content">
        <section>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 col-sm-4">
                    <a href="/product/{{$product->slug}}" class="hover-effect">
                        <img src="{{Voyager::image(image_small($product->image))}}" alt="{{$product->name}}" />
                    </a>
                    <a href="/product/{{$product->slug}}"><h4 class="subtitle services-title-one">{{title_case($product->name)}}</h4></a>
                </div>

                    @if($loop->iteration %3 == 0)
                    <div class="clearfix spacer-50"></div>
                    @endif
                @endforeach
            </div>
            <div class="clearfix spacer-50"></div>
            {{$products->links()}}
        </section>
    </div>
@endsection