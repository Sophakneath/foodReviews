@extends('master')

@section('title', 'Homepage')

@section('Maintitle', 'HEALTHY & TASTY')

@section('Subtitle', 'Laughter is brightest, where Food is best.')

@section('content')

<style>
       
        .shortDes{
            text-align: justify;
            color:#606060;
            font-size: 16px;
            line-height: 40px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .circle{
            height: 50px;
            width: 50px;
            background-color: rgb(236, 100, 100);
            border-radius: 50%;
            text-align: center;
        }

        .count{
            line-height: 50px; 
            color:white;
            font-size: 20px;
        }

        .subTitle{
            font-size: 20px;
            color:rgb(236, 100, 100);
            font-family: Chalkduster;
        }

        .hov{
            background-color: whitesmoke; 
            
        }
</style>

    <br><br>
    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>ABOUT OUR PROJECT AND DEVELOPERS</b></h5>      
        </div>    
    </div>

    <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                    <p style="color:#606060; text-align:justify">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde delectus quo tempora, explicabo dolorem numquam ipsam porro! Eligendi quaerat recusandae maiores alias, sint aliquam laborum exercitationem, deleniti deserunt perferendis odio?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorum voluptate molestias culpa harum voluptatum ducimus? Expedita, velit! Aliquid illum dicta soluta, ipsa et natus nesciunt similique repudiandae quisquam reiciendis?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi ea sapiente modi saepe molestias ipsam reprehenderit laudantium soluta rerum aspernatur, dolore ducimus architecto itaque excepturi a? Ad, perspiciatis voluptates? Ipsum.
                    </p> 
                </div>
            </div>
        </div>

        

        <div class="row hov1">
            <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <img src="{{ asset('img/about/lecturer1.jpg') }}" width="80%">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-3">
                                <div class="circle">
                                    <h6 class="count">1</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-md-9 col-9 my-auto">
                                <h5 class="subTitle">SUPERVISOR</h5>
                            </div>
                        </div>
    
                        <p class="shortDes">
                             Lecuter's Name : CHIM Bunthoeurn
                             <br>
                             Course Name : Web Development
                             <br>
                             Email : 
							 <br>
		                     Contact : 012 885 348 
                        </p>
                    </div>
                </div>
            </div>
        </div>

       <div class="row hov">
            <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <img src="{{ asset('img/about/n.png') }}" width="80%">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-3">
                                <div class="circle">
                                    <h6 class="count">2</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-md-9 col-9 my-auto">
                                <h5 class="subTitle">DEVELOPER</h5>
                            </div>
                        </div>
                        <p class="shortDes">
                            Name : LENGRY Sophakneath
                            <br>
                            Email : pheakneath8@gmail.com
                            <br>
                            Contact : 010 435 042
                        </p>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="row hov1">
            <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <img src="{{ asset('img/about/d.png') }}" width="80%">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-3">
                                <div class="circle">
                                    <h6 class="count">3</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-md-9 col-9 my-auto">
                                <h5 class="subTitle">DEVELOPER</h5>
                            </div>
                        </div>
                        
                        <p class="shortDes">
                            Name : LIM Sokdy
                            <br>
                            Email : limsokdy@gmail.com
                            <br>
                            Contact : 012 603 890  
                        </p>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="row hov">
            <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <img src="{{ asset('img/about/v.png') }}" width="80%">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-3">
                                <div class="circle">
                                    <h6 class="count">4</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-md-9 col-9 my-auto">
                                <h5 class="subTitle">DEVELOPER</h5>
                            </div>
                        </div>
                        <p class="shortDes">
                            Name : TOUCH SamnangDevid
                            <br>
                            Email : samnangdevidtouch@gmail.com
                            <br>
                            Contact :  068 435 923 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row hov1">
            <div class="container" style="padding-left:50px; padding-top:50px; padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <img src="{{ asset('img/about/p.png') }}" width="80%">
                    </div>
                    <div class="col-lg-6 my-auto">
                        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-3">
                                <div class="circle">
                                    <h6 class="count">5</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-sm-9 col-md-9 col-9 my-auto">
                                <h5 class="subTitle">DEVELOPER</h5>
                            </div>
                        </div>
                        
                        <p class="shortDes">
                            Name : POY Chansotheanith
                            <br>
                            Email : theanith.poy@gmail.com
                            <br>
                            Contact : 010 123 123  
                        </p>
                    </div>
                </div>
            </div>
        </div>

@endsection