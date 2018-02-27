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
        <h2 class="title"> Contact Us </h2>
    </div>
    <!-- Page Title -->
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <span class="parent"> <i class="fa fa-home"></i> <a href="/"> Home </a> </span>
            <i class="fa fa-chevron-right"></i>
            <span class="child"> Contact Us</span>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <section class="contact">
            <div class="row contact-centers">
                <div class="col-md-12">
                    <div class="contact-area-box">
                        <h4 class="contact-title subtitle">China</h4>
                        <div class="address">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>{!! setting('contact-us.address') !!}</p>
                        </div>
                        <div class="phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <p>{{setting('contact-us.phone')}}</p>
                        </div>
                        <div class="email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p><a href="mailto:{{setting('contact-us.email')}}"> {{setting('contact-us.email')}} </a> </p>
                        </div>
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

        <section class="contact-form">
            <div class="row form">
                <div class="col-md-6">
                    <h2 class="title-2"> Send us a message </h2>
                    <form id="contact_form" class="form well-form" action="/contact_submit" method="post">
                        <!-- Text input-->
                        {{csrf_field()}}
                        <input type="hidden" name="url" value="{{url()->current()}}">
                        <div class="form-group">
                            <input name="name" placeholder="Full Name *" class="form-control" type="text" required title="Please enter your full name">
                        </div>
                        <!-- Email input-->
                        <div class="form-group">
                            <input name="email" placeholder="Email Address *" class="form-control" type="email" required title="Please enter your email address" data-msg-email="Ouch, that doesn't look like an email">
                        </div>

                        <!-- Phone Number-->
                        <div class="form-group">
                            <input name="phone" placeholder="Phone Number" class="form-control" type="text" data-rule-phoneUS="false" title="Please enter your phone number" data-msg-phoneUS="Ouch, that doesn't look like a valid phone number">
                        </div>

                        <!-- Text area -->
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Message *" required data-rule-minlength="10" data-msg-minlength="Please enter atleast 10 characters" title="Please enter your message"></textarea>
                        </div>
                        <!-- Button -->
                        <button type="submit" class="btn btn-block btn-warning" id="js-contact-btn"> SEND MESSAGE </button>

                        <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

                    </form>
                </div>

                <div class="col-md-6 contact-map">
                    <h2 class="title-2"> View Map </h2>
                    <div id="google-map" class="google-map" data-latitude="{{setting('contact-us.latitude')}}" data-longitude="{{setting('contact-us.longitude')}}" data-map-title="{{title_case(setting('index.company_name'))}}" data-map-zoom="11"></div>
                </div>
            </div>

        </section>

    </div>
@endsection

@section('add_js')
    <!-- Map handler -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWOMHRdvqD4FLx7c0sbW0zTjbcktlxJHQ"></script>

    <!-- Add ?key=GOOGLE_API_KEY_HRE to avoid warnings and future API failiures.
         You may find more information here: https://developers.google.com/maps/documentation/javascript/get-api-key -->

    <!--  Map Functions -->
    <script src="/js/maps.js"></script>
@endsection