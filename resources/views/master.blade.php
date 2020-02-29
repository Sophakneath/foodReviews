<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
    <style>
         @font-face {
            font-family: Chalkduster;
            src: url('{{ public_path('fonts/Chalkduster.tff') }}');
        }

        .cover {
            -webkit-filter: blur(2px);
            filter: blur(2px);
        }

        .box{
            border: 1px solid red;
        }

        .imgheader{
            margin: 0;
            width: 100%;
        }
        .row1{
            z-index: 2;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            margin: 0;
            padding-right: 0;
        }
        .fix{
            position: fixed;
        }

        .bg{
            background-color: transparent;
            margin: 0;
            border: none;
        }

        .logopos{
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            text-align: center;
            
        }

        .logohelper {
            display: inline-block;
            vertical-align: middle;
            height: 100%;
        }

        .logo{
            width: 180px;
            vertical-align: middle;
        }

        .nav-item>b{
            color: white;
            margin-right: 30px;
            font-family: Chalkduster;
            font-size: 16px;
            
        }
        .nav-link:hover{
            font-size: 19px;
        }

        .mainDes{
            line-height: 30px;
            font-size: 21px;
            color: white;
            margin-top: 25px;
            text-align: center;
            font-family: Chalkduster;
        }

        .mainHeader{
            font-family: Chalkduster;
            color: white;
            text-align: center;
            font-size: 80px;   
        }

        .mainHr{
            width: 260px;
            margin-top: 20px;
            text-align: center;
            height: 5px;
            background: white;
        }

        .mainTitle{
            position: absolute;
            width: 100%;
            z-index: 1;
        }
        .center{
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            margin: 0;
        }

        .type{
            font-family: Chalkduster;
            color: white;
            text-align: center;
            width: 100%;
            font-size: 23px;
        }

        .colTextPadding{
            font-size: 16px;
            padding-top: 20px;
            padding-left: 50px;
            padding-right: 50px;
            color: #898888;
        }

        .hr{
            width: 80px;
            background: white;
            height: 3px;
            margin-top: 10px;
        }

        .phone{
            font-size: 21px;
            color: white;
            text-align: center;
        }

        .contact{
            margin-left: 10px;
            margin-right: 10px;
        }

        .policy{
            font-family: Chalkduster;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
       
        .title{
            color:#606060;
        }

        .input{
            width: 100%;
            height: 40px;
        }

        .inputtitle{
            font-size: 18px;
            color: #606060;
        }

        .categorysug{
            font-size: 18px;
            color: #606060;
            margin-left: 10px;
        }

        .slidecat{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

        .slidecat:hover{
            background-color:white;
            
        }

        .c {
            transition: 0.3s;
            padding: 15px;
            margin-top: 30px;
            box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1);    
        }

        .c:hover{
            /* border:1px solid #CD454B; */
            margin-top:17px;
            transition: 0.3s;
        }

        .c .img {
            width: 100%;
            object-fit: cover;
            border-radius: 3px;
            /* background-color: white; */
            box-shadow: 0 3px 20px 11px rgba(0, 0, 0, 0.09);
        }

        .c .top-sec {
            margin-top: -30px;
            margin-bottom: 15px;
        }

        .abc{
            box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); 
            transition: 0.3s;   
        }

        .abc:hover{
            margin-left: 10px;
            transition: 0.3s;   
        }

        .smalltitle{
            
            width: 100%;
            font-size: 20px;
        }

        .custom2{
            margin:0;
            padding:0;
        }

        .toprate{
            background-color:#FFE200; 
            border-radius:5px; 
            color:white; 
            width:100%; 
            margin-left:0; 
            padding-top:2px; 
            padding-bottom:2px; 
            margin-top:30px;
            margin-bottom:10px;
        }

        .rev, .rev:hover{
            text-decoration: none;
            color:black;
        }

        .hea{
            margin-top: 10px;
            box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); 
            transition: 0.3s;   
        }

        .hea:hover{
            margin-top: 0px;
            transition: 0.3s;   
        }
    </style>
</head>
<body>
    <div class="row row1 fix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg">
                <a href="/homepage"><img class="bg logo navbar-brand" src="{{ asset('img/mylogo.png') }}" style="margin-right:100px;"></img></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="/homepage"> <b> <i class="fa fa-home"></i> HOME </b></a>
                        <a class="nav-item nav-link active" href="/myaccount"><b>MY ACCOUNT </b></a>
                        <a class="nav-item nav-link active" href="/about"><b>ABOUT </b></a>
                    </div>

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <video width="100%" id="c" loop autoplay muted>
        <source src="{{ asset('video/cover.mp4') }}" type="video/mp4">
    </video>
    
    @yield('content')

    <div style=" background-color: #707070;">
    <div class="container">
        <div class="row" style="padding-top: 30px; padding-bottom:30px;">
            <div class="col-lg-5" style="text-align:center;">
                <span class="logohelper"></span> <img style="width:390px;" src="{{ asset('img/mylogo.png') }}">
            </div>
            <div class="col-lg-3">
                <h5 class="type"> <b>CONTACT US</b></h5>
                <hr class="hr">
                <div style="text-align:center; margin-top:30px;">
                    <label class="phone"><i class="fa fa-phone"></i>&nbsp;&nbsp; +85510 435 042</label>
                </div>
                <div style="text-align:center;">
                    <label class="phone"><i class="fa fa-phone"></i>&nbsp;&nbsp; +85510 435 042</label>
                </div>
                <div style="text-align:center;">
                    <label class="phone"><i class="fa fa-phone"></i>&nbsp;&nbsp; +85510 435 042</label>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="type"> <b>FIND US ON</b></h5>
                <hr class="hr" >
                <div style="margin-top:30px; text-align:center;">
                    <img class="contact" width="38px" src="{{ asset('img/contact/facebook.png') }}">
                    <img class="contact" width="38px" src="{{ asset('img/contact/instagram.png') }}">
                    <img class="contact" width="38px" src="{{ asset('img/contact/youtube.png') }}">
                </div>
                <br>
                <div style="text-align:center;">
                    <img class="contact" width="38px" src="{{ asset('img/contact/twitter.png') }}">
                    <img class="contact" width="38px" src="{{ asset('img/contact/linkedin.png') }}">
                    <img class="contact" width="38px" src="{{ asset('img/contact/gmail.png') }}">
                </div>
            </div>
        </div>
        <div class="row" style="width:100%; margin:0; text-align:center; padding-bottom:18px;">
            <div class="col-lg-12">
                <a class="policy" href="#">PRIVACY POLICY | TERM & CONDITION</a>
            </div>
            <div class="col-lg-12">
                <label class="phone" style="font-size:16px; margin-top:10px;">COPYRIGHT @ THE FOOD TEAM, CO.LTD</label>
            </div>
        </div>
    </div>
    </div>
    <script>
        $('.custom1').owlCarousel({
            loop:true,
            margin:10,
            autoplay:false,
            autoplayTimeout:3000,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })

        $('.custom2').owlCarousel({
            items:1,
            margin:30,
            autoplay:true,
            stagePadding:30,
            smartSpeed:450
        });

        $('.carousel').carousel({
            interval: 2000
        })

    </script>
</body>
</html>