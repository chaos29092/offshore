@extends('master')
@section('seo_title','404 - PAGE NOT FOUND')
@section('meta_description','404 - PAGE NOT FOUND')

@section('page_title')
    <!-- Page Title -->
    <div class="page-title text-center">
        <h2 class="title"> 404 - PAGE NOT FOUND </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> 404 - PAGE NOT FOUND </span>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <section class="contact">
            <div class="row contact-centers">
                <div class="col-md-12">
                    <div class="contact-area-box">
                        <h2>Looks Like Something Went Wrong!</h2>
                        <p>The page you were looking for is not here.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection