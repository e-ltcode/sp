@extends('layouts.header')
@section('content')
<style type="text/css">
    .btn-primary {
        color: #fff !important;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }

    .carousel-item {
        cursor: context-menu;
    }

    .btn-success {
        color: #fff !important;
        background-color: #28a745 !important;
        border-color: #28a745 !important;
    }

    .account {
        border-radius: 20px !important;
        width: 100px !important;
        padding: 6px 12px !important;
    }

    a:focus,
    a:hover {
        text-decoration: none !important;
    }

    @media screen and (min-width: 1200px) {
        .img-fluid {
            max-width: initial !important;
        }

        .container {
            width: inherit !important;
        }
    }

    .footer-section {
        margin-top: 0px;
    }

    .heading {
        text-align: center;
        color: #454343;
        font-size: 30px;
        font-weight: 700;
        position: relative;
        margin-bottom: 70px;
        text-transform: uppercase;
        z-index: 999;
    }

    .white-heading {
        color: #ffffff;
    }

    .heading:after {
        content: ' ';
        position: absolute;
        top: 100%;
        left: 50%;
        height: 40px;
        width: 180px;
        border-radius: 4px;
        transform: translateX(-50%);
        background: url(img/heading-line.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    .white-heading:after {
        background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    .heading span {
        font-size: 18px;
        display: block;
        font-weight: 500;
    }

    .white-heading span {
        color: #ffffff;
    }




    
  
</style>


<div class="jumbotron jumbotron-fluid" id="banner"
    style="background-image: url({{ asset('assets/images') }}/banner-bk.jpg);background-size: cover;background-repeat: no-repeat;">
    <div class="container text-center text-md-left">
        <header>
            <div class="row justify-content-between">
                <div class="col-2">
                    <img src="{{ asset('assets/images'.'/') }}/logo.png" alt="logo">
                </div>
            </div>
        </header>
        <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
            class="display-3 text-white font-weight-bold my-5">
            Testing platform <br>
            for web developers
        </h1>
        <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
            class="lead text-white my-4">
            The idea is:
            <br> After each lesson, come here and test your theory based knowledge about the web!
            We searched for the tests for web developers and couldn't find anything useful, and because of that we created this project, svarogproject.
        </p>
        <a href="{{ url('marketplace?type=free') }}" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000"
            data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>

            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
            class="lead text-white my-4">
            This  project is just starting out
            , so, if you have any ideas or would like to contribute, we would like to hear from you!
           <p><a href="https://www.linkedin.com/in/djordje-milicevic-82a009166/">LinkedIn</a></p> <br>
           <p>Or, you can contact us at our email : email@svarogproject.com</p>
        </p>
    </div>
</div>
{{-- <div class="container my-5 py-2">
    <h2 class="text-center font-weight-bold my-5">Latin wor consectetur from </h2>
    <div class="row">
        <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true"
            class="col-md-4 text-center">
            <img src="{{ asset('assets/images/quiz1.png') }}" style="width: 180px;height: 120px;margin-bottom: 10px;"
                alt="Anti-spam" class="mx-auto">
            <h4>Donor sit</h4>
            <p>Lorem ipsum dolor sit amet porro his no his deleniti</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
            class="col-md-4 text-center">
            <img src="{{ asset('assets/images/quiz2.png') }}" style="width: 180px;height: 120px;margin-bottom: 10px;"
                alt="Phishing Detect" class="mx-auto">
            <h4>Lorem publishing</h4>
            <p>Ne error antiopam usu. Sed vocen concludaturque ea</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true"
            class="col-md-4 text-center">
            <img src="{{ asset('assets/images/quiz3.png') }}" style="width: 180px;height: 120px;margin-bottom: 10px;"
                alt="Smart Scan" class="mx-auto">
            <h4>alaborat with lorem</h4>
            <p>Et usu ocurreret elaboraret doctus prodesse assueverit.</p>
        </div>
    </div>
</div> --}}
<!-- feature (skew background) -->
{{-- <div class="jumbotron jumbotron-fluid feature" id="feature-first">
    <div class="container my-5">
        <div class="row justify-content-between text-center text-md-left">
            <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6">
                <h2 class="font-weight-bold">detracto maiestatis</h2>
                <p class="my-4">Te iisque labitur eos, nec sale argumentum scribentur no,
                    <br> augue disputando in vim. Erat fugit sit at, ius lorem deserunt deterruisset no.
                </p>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">Learn More</a>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center">
                <img src="{{ asset('assets/images') }}/section1.png" alt="Take a look inside" class="mx-auto d-block">
            </div>
        </div>
    </div>
</div> --}}
<!-- feature (green background) -->
{{-- <div class="jumbotron jumbotron-fluid feature" id="feature-last">
    <div class="container">
        <div class="row justify-content-between text-center text-md-left">
            <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 flex-md-last">
                <h2 class="font-weight-bold">Lorem Ipsum is</h2>
                <p class="my-4">
                    Duo suas detracto maiestatis ad, commodo lucilius invenire nec ad,
                    <br> eum et oratio disputationi. Falli lobortis his ad
                </p>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">Learn More</a>
            </div>
            <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                class="col-md-6 align-self-center flex-md-first">
                <img src="{{ asset('assets/images'.'/') }}/feature-2.png" alt="Safe and reliable"
                    class="mx-auto d-block">
            </div>
        </div>
    </div>
</div>

<section class="testimonial text-center">
    <div class="container">

        <div class="heading white-heading">
            Testimonial
        </div>
        <div id="testimonial4"
            class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x"
            data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="testimonial4_slide">
                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. </p>
                        <h4>Client 1</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial4_slide">
                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. </p>
                        <h4>Client 2</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial4_slide">
                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. </p>
                        <h4>Client 3</h4>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section> --}}

<!-- client -->
{{-- <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-1.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-2.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-3.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-4.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-5.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="{{ asset('assets/images'.'/') }}/client-6.png" class="mx-auto d-block">
            </div>
        </div>
    </div>
</div>

--}}

@endsection
@section('styles')

<link rel="icon" href="{{ asset('assets/images'.'/') }}/favicon.png" sizes="32x32" type="image/png">

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}/">


@endsection

