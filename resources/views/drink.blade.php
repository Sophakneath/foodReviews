@extends('master1')

@section('title', 'Drink')

@section('Maintitle', 'DRINK & DRINK')

@section('Subtitle', "If you are thirsty, come and drink.")

@section('content')

<br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="type title"> <b>DISCOVER YOUR FAVOURITES</b></h5>      
            </div>    
        </div>
        <br><br>    
        <form action="/searchDrink" method="GET">
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="inputtitle">What's it name?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="input form-control" name="name" type="text" placeholder=" Drink name">
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
                                <option value="Smoothie">Smoothie</option>
                                <option value="Juice">Juice</option>
                                <option value="Energy">Energy Drink</option>
                                <option value="Alcoholic">Alcoholic</option>
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
            <h5 class="type title"> <b>FIND OUT MORE ABOUT THESE DRINK BY CATEGORY</b></h5>      
        </div>    
    </div>
    <br><br>
    <div class="container">
        <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                <li class="nav-item" style="margin:10px;" onclick="changeState('all','smo','ju','ene','alc')">
                    <div class="item slidecat" id="all" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/beverage.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">All Drink</label>
                    </div>
                </li>
                <li class="nav-item" style="margin:10px;" onclick="changeState('smo','all','ju','ene','alc')">
                    <div class="item slidecat" id="smo" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/smoothie.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Smoothie</label>
                    </div>
                </li>
                <li class="nav-item" style="margin:10px;" onclick="changeState('ju','all','smo','ene','alc')">
                    <div class="item slidecat" id="ju" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-meat-tab" data-toggle="pill" href="#pills-meat" role="tab" aria-controls="pills-meat" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/juice.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Juice</label>
                    </div>
                </li>
                <li class="nav-item" style="margin:10px;" onclick="changeState('ene','all','smo','ju','alc')">
                    <div class="item slidecat" id="ene" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/energy.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Energy Drink</label>
                    </div>
                </li>
                <li class="nav-item" style="margin:10px;" onclick="changeState('alc','all','smo','ju','ene')">
                    <div class="item slidecat" id="alc" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-spi-tab" data-toggle="pill" href="#pills-spi" role="tab" aria-controls="pills-spi" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/alcoholic.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Alcoholic</label>
                    </div>
                </li>
        </ul>
    </div>

    <br><br>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$all])
            
                @if(count($all) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreDrink"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>    
        </div>
        <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$smo])
            
                @if(count($smo) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreSmo"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$juice])
            
                @if(count($juice) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreJuice"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$energy])
            
                @if(count($energy) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreEnergy"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>      
        </div>
        <div class="tab-pane fade" id="pills-spi" role="tabpanel" aria-labelledby="pills-spi-tab">
            <div class="container" style="margin-bottom:20px;">
                @include('widgets.allCatItem',['item'=>$alc])
            
                @if(count($alc) > 15)
                    <br>
                    <div class="row" style="margin:0">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreAlc"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
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
                <h5 style="color:white; font-size:38px; font-family:Chalkduster; text-align:left; margin-top:230px; margin-left:60px; margin-right:60px;"> <b>{{$d->name}}</b></h5> 
                <h5 style="color:white; font-size:20px; text-align:left; margin-top:20px; margin-left:60px; margin-right:60px;"> <b>Serve : {{$d->serve}}</b></h5> 
                <h5 class="d-none d-md-block" style="color:white; font-size:16px; text-align:left; margin-top:10px; margin-left:60px; margin-right:60px; overflow: hidden;"> <b>{{$d->short_des}}</b></h5>
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
            <h5 class="type title"> <b>TOP VIEW DRINK</b></h5>      
        </div>    
    </div>    
    <br><br>
    
    <div class="container" style="margin-bottom:20px;">
        @include('widgets.catOverviewItem',['item'=>$tview])
    
        @if(count($tview) > 6)
            <br>
            <div class="row" style="margin:0">
                <div class="col-12" style="text-align:center;">
                    <a href="/moreViewDrink"><button class="btn btn-danger">See More</button></a>
                </div>
            </div>
        @endif
        <br><br>
    </div>

    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>TOP RATING DRINK</b></h5>      
        </div>    
    </div>  
    <br><br>
    <div class="container">
        @include('widgets.catTopItem',['item'=>$trating])

        @if(count($trating) > 10)
            <br>
            <div class="row" style="margin:0">
                <div class="col-12" style="text-align:center;">
                    <a href="/moreRatingDrink"><button class="btn btn-danger">See More</button></a>
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

        function clickCount(resID)
    {
        // alert('abc');
        var cid = document.getElementById(resID).value;

        $.ajax({
            type: 'get',
            url: '/updateClickCount',
            data:
            {
                id:cid
            },
            success:function(response)
            {

            }
        });
    }
    </script>
@endsection