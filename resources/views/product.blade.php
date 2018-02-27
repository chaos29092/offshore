@extends('products_sidebar')

@section('seo_title')
    @if(!$product->seo_title)
        {{title_case($product->name)}}
    @else
        {{title_case($product->seo_title)}}
    @endif
@endsection
@section('meta_description')
    @if(!$product->meta_description)
        {{$product->excerpt}}
    @else
        {{$product->meta_description}}
    @endif
@endsection
@section('meta_keywords',$product->meta_keywords)

@section('add_css')
    <link rel="stylesheet" href="/css/magnific-popup.css">
@endsection

@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> {{title_case($product->name)}} </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <?php
                $product_category = $product_categories->where('id',$product->product_category_id)->first()
            ?>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> <a href="/product_category/{{$product_category->slug}}"> {{title_case($product_category->name)}} </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> {{title_case($product->name)}} </span>
        </div>
    </div>
@endsection

@section('products_content')
    <div class="col-md-9 services-content">
    <section class="services-hood">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hood">
                    <div class="ceo-photo">
                        <a class="popup-gallery" href="{{Voyager::image($product->image)}}">
                            <img src="{{Voyager::image($product->image)}}" alt="{{$product->name}} images">
                        </a>
                    </div>

                </div>
                <div class="col-md-6 culture">
                    <h2 class="culture-title"> {{title_case($product->name)}} </h2>
                    <p> {{$product->excerpt}}</p>

                    <a href="/contact_us" class="btn btn-primary" role="button">Contact Us</a>
                </div>
            </div>
            <div class="spacer-30"></div>

            <div class="row">
                <div>
                    <!-- Horizontal Tabs -->
                    <div class="tab-widget">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#details" id="details-tab" role="tab" data-toggle="tab" aria-controls="details" aria-expanded="true">Product Details</a></li>
                            <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Packaging & Delivery </a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="details" aria-labelledBy="details-tab">
                                {!! $product->body !!}
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledBy="profile-tab">
                                {!! $product->parameter !!}
                            </div>
                            <!-- end tabpanel -->
                        </div>
                        <!-- end tab-content -->
                    </div>
                    <!-- Horizontal Tabs -->
                </div>
            </div>
            <div class="spacer-50"></div>

            <div class="row culture">
                <h2 class="culture-title"> Related Products </h2>
                @foreach($related_products as $related_product)
                <div class="col-md-4 col-sm-4">
                    <a href="/product/{{$related_product->slug}}" class="hover-effect">
                        <img src="{{Voyager::image(image_small($related_product->image))}}" alt="{{$related_product->name}}" />
                    </a>
                    <a href="/product/{{$related_product->slug}}"><h4 class="subtitle services-title-one">{{title_case($related_product->name)}}</h4></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </div>
@endsection

@section('add_js')
    <script src="/js/jquery.magnific-popup.min.js"></script>
@endsection