@extends('master')

@section('main')
    <div class="container">
        <div class="row">

            @yield('article_content')

            <div class="col-md-3 sidebar">

                {{--<div class="sidebar-search-form">--}}
                    {{--<input type="text" class="  search-query form-control" placeholder="Search" />--}}
                    {{--<button class="btn search-btn" type="button">--}}
                        {{--<span class="fa fa-search"></span>--}}
                    {{--</button>--}}
                {{--</div>--}}

                <div class="sidebar-blog-categories">
                    <h3 class="sidebar-title">Categories</h3>

                    <ul>
                        @foreach($categories as $category)
                        <li> <a href="/articles/{{$category->slug}}">{{title_case($category->name)}}</a> </li>
                        @endforeach
                    </ul>

                </div>

                <div class="sidebar-fact">

                    <h3 class="about-quick-fact">Quick Fact</h3>
                    <p>{{setting('index.about_us_sidebar')}}</p>
                    <a href="/contact_us" class="btn btn-primary about-quick-fact-button" role="button">CONTACT US</a>

                </div>

            </div>

        </div>
    </div>
@endsection