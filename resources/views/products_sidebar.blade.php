@extends('master')

@section('main')
    <div class="container">
        <div class="row services-sidebar">

            @yield('products_content')

            <div class="col-md-3 sidebar left">

                <div class="sidebar-blog-categories">
                    <ul>
                        @foreach($product_categories as $product_category)
                        <li> <a href="/product_category/{{$product_category->slug}}"> {{title_case($product_category->name)}} </a> </li>
                        @endforeach
                    </ul>
                </div>

                {{--<div class="sidebar-download">--}}
                    {{--<div class="download-file color-bg">--}}
                        {{--<a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Download PDF <span>1.5 MB</span>--}}
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