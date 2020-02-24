@extends('master1')

@section('title', 'Homepage')

@section('Maintitle', 'FOOD & FOOD')

@section('Subtitle', "You don't need a silver fork to eat good food.")

@section('content')

<br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="type title"> <b>DISCOVER YOUR FOOD</b></h5>      
            </div>    
        </div>
        <br><br>    
        <form action="/searchFood" method="GET">
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="inputtitle">What's it name?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="input form-control" name="name" type="text" placeholder=" Food name">
                        </div>
                    </div>  
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="inputtitle">Its category</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <select class="input" name="type" id="" style="margin-bottom:20px;">
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meat Lover">Meat Lover</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Spicy Lover">Spicy Lover</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <button class="btn btn-danger input" type="submit">Search</button>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
       
    </div> 

    <br><br>
    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>FIND OUT MORE ABOUT THESE FOOD BY CATEGORY</b></h5>      
        </div>    
    </div>
    <br><br>
    <div class="container">
        <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                <li class="nav-item" id="all" style="margin-right:10px; margin-left:10px;" onclick="changeState('all','veg','mea','hea','spi')">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px; width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/healthy-food.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">All Food</label>
                    </div>
                </li>
                <li class="nav-item" id="veg" style="margin-right:10px; margin-left:10px;" onclick="changeState('veg','all','mea','hea','spi')">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/fruit.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Vegetarian</label>
                    </div>
                </li>
                <li class="nav-item" id="mea" style="margin-right:10px; margin-left:10px;" onclick="changeState('mea','all','veg','hea','spi')">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-meat-tab" data-toggle="pill" href="#pills-meat" role="tab" aria-controls="pills-meat" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/steak.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Meat Lover</label>
                    </div>
                </li>
                <li class="nav-item" id="hea" style="margin-right:10px; margin-left:10px;" onclick="changeState('hea','all','veg','mea','spi')">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Healthy</label>
                    </div>
                </li>
                <li class="nav-item" id="spi" style="margin-right:10px; margin-left:10px;" onclick="changeState('spi','all','veg','mea','hea')">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-spi-tab" data-toggle="pill" href="#pills-spi" role="tab" aria-controls="pills-spi" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Spicy Lover</label>
                    </div>
                </li>
        </ul>
    </div>

    <br><br>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$all])
            
                <br>
                @if(count($all) > 15)
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreFood"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>    
        </div>
        <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$veg])
            
                @if(count($veg) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreVeg"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$meat])
            
                @if(count($meat) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreMeat"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$hea])
            
                @if(count($hea) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreHealthy"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>      
        </div>
        <div class="tab-pane fade" id="pills-spi" role="tabpanel" aria-labelledby="pills-spi-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$spi])
            
                @if(count($spi) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreSpicy"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
    </div>
    <br><br>

    <div class="owl-carousel owl-theme custom2">
        @foreach($restaurant as $d)
        <div class="item" style="position:relative;">
            <img src="{{ asset($d->image) }}" style="height:500px; object-fit:cover;">
            <div style="position:absolute; bottom:0; height:500px; width:100%; background-color:rgba(0, 0, 0, 0.2)">
                <input id="resID{{$d->restaurantID}}" hidden value="{{$d->restaurantID}}"/>
                <h5 class="type title" style="color:white; font-size:38px; text-align:left; margin-top:270px; margin-left:60px;"> <b>{{$d->name}}</b></h5> 
                <h5 style="color:white; font-size:20px; text-align:left; margin-top:20px; margin-left:60px;"> <b>Serve : {{$d->serve}}</b></h5> 
                <h5 style="color:white; font-size:16px; text-align:left; margin-top:10px; margin-left:60px;"> <b>{{$d->short_des}}</b></h5> 
                <a href="{{$d->link}}" target="_blank">
                    <button class="btn btn-danger" style="margin-left:60px; margin-top:10px; magin-bottom:30px;" onclick="clickCount('resID{{$d->restaurantID}}')">Interested</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <br><br>

    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>TOP VIEW FOOD</b></h5>      
        </div>    
    </div>    
    <br><br>
    
    <div class="container" style="margin-bottom:20px;">
        @include('widgets.catOverviewItem',['item'=>$tview])
    
        @if(count($tview) > 6)
            <br>
            <div class="row" style="margin:0">
                <div class="col-12" style="text-align:center;">
                    <a href="/moreViewFood"><button class="btn btn-danger">See More</button></a>
                </div>
            </div>
        @endif
        <br><br>
    </div>

    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>TOP RATING FOOD</b></h5>      
        </div>    
    </div>  
    <br><br>
    <div class="container">
        @include('widgets.catTopItem',['item'=>$trating])
    
        @if(count($trating) > 10)
            <br>
            <div class="row" style="margin:0">
                <div class="col-12" style="text-align:center;">
                    <a href="/moreRatingFood"><button class="btn btn-danger">See More</button></a>
                </div>
            </div>
        @endif
        <br><br>
    </div>

    <script>
    $(document).ready(function()
    {
        $('#all').css({'box-shadow':'0 0 16px 2px rgba(0, 0, 0, 0.1)'});
        $('#all').css({'border-radius':'10px'});
    });

    function changeState(a,b,c,d,e){
        var c1 = document.getElementById(a);
        var c2 = document.getElementById(b);
        var c3 = document.getElementById(c);
        var cc = document.getElementById(d);
        var c5 = document.getElementById(e);
        c1.style.boxShadow = "0 0 16px 2px rgba(0, 0, 0, 0.1)"; 
        c1.style.borderRadius = "10px"; 
        c2.style.boxShadow = "none"; 
        c3.style.boxShadow = "none"; 
        cc.style.boxShadow = "none"; 
        c5.style.boxShadow = "none"; 
    }
    </script>

    @endsection