@extends('master')

@section('title', 'Homepage')

@section('Maintitle', 'DESSERTS & BAKES')

@section('Subtitle', "Stressed is Desserts, spelled it backwards.")

@section('content')

<br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="type title"> <b>DISCOVER YOUR FAVOURITES</b></h5>      
            </div>    
        </div>
        <br><br>    
        <form action="/searchDessert" method="GET">
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="inputtitle">What's it name?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="input" name="name" type="text" placeholder=" Dessert or Bakes name">
                        </div>
                    </div>  
                </div>
                {{-- <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="inputtitle">Main Category:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="input" name="type" id="">
                                <option value="Food">Food</option>
                                <option value="Drink">Drink</option>
                                <option value="Dessert">Desserts & Bakes</option>
                            </select>
                        </div>
                    </div> 
                </div> --}}
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="inputtitle">Its category</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <select class="input" name="type" id="" style="margin-bottom:20px;">
                                <option value="Cookie">Cookie</option>
                                <option value="Cake">Cake</option>
                                <option value="Chocolate">Chocolate</option>
                                <option value="Ice Cream">Ice Cream</option>
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
    <div class="container" >
        <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                <li class="nav-item" style="margin-right:10px; margin-left:10px;">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/healthy-food.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">All D&B</label>
                    </div>
                </li>
                <li class="nav-item" style="margin-right:10px; margin-left:10px;">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/fruit.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Cookie</label>
                    </div>
                </li>
                <li class="nav-item" style="margin-right:10px; margin-left:10px;">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-meat-tab" data-toggle="pill" href="#pills-meat" role="tab" aria-controls="pills-meat" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/steak.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Cake</label>
                    </div>
                </li>
                <li class="nav-item" style="margin-right:10px; margin-left:10px;">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Chocolate</label>
                    </div>
                </li>
                <li class="nav-item" style="margin-right:10px; margin-left:10px;">
                    <div class="item slidecat" style="padding-left:20px; padding-right:20px;  width:200px;" id="pills-spi-tab" data-toggle="pill" href="#pills-spi" role="tab" aria-controls="pills-spi" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                        <label class="categorysug">Ice Cream</label>
                    </div>
                </li>
        </ul>
    </div>

    <br><br>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="container" style="margin-bottom:20px;">
                <div class="row" id="itemsContainer">   
                    @php $count=0; @endphp 
                    @foreach($all as $d)
                        @php $count++; @endphp
                        @if($count > 15) @break; @endif
                        @php $rating = $d->rating; @endphp
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                            <div class="card c" style="background-color:white;">
                            <div class="top-sec">
                                <img class="img" src="{{ asset('img/cover1.png') }}">
                            </div>
                            <br>
                            <div class="container">
                                <div class="bottom-sec">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            @if($d->main_cat == "Food")
                                                <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                            @else
                                                <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                            </div>
                                        </div>   
                                        <br>
            
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                    
                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                    @endif
                                                    @php $rating--; @endphp
                                                </span>
                                                @endforeach
            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                @if(count($all) > 15)
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreDessert"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>    
        </div>
        <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
            <div class="container" style="margin-bottom:20px;">
                <div class="row" id="itemsContainer">   
                    @php $count=0; @endphp 
                    @foreach($coo as $d)
                        @php $count++; @endphp
                        @if($count > 15) @break; @endif
                        @php $rating = $d->rating; @endphp
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                            <div class="card c" style="background-color:white;">
                            <div class="top-sec">
                                <img class="img" src="{{ asset('img/cover1.png') }}">
                            </div>
                            <br>
                            <div class="container">
                                <div class="bottom-sec">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            @if($d->main_cat == "Food")
                                                <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                            @else
                                                <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                            </div>
                                        </div>    
                                        <br>
            
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                    
                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                    @endif
                                                    @php $rating--; @endphp
                                                </span>
                                                @endforeach
            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                @if(count($coo) > 15)
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreCoo"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
            <div class="container" style="margin-bottom:20px;">
                <div class="row" id="itemsContainer">   
                    @php $count=0; @endphp 
                    @foreach($cake as $d)
                        @php $count++; @endphp
                        @if($count > 15) @break; @endif
                        @php $rating = $d->rating; @endphp
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                            <div class="card c" style="background-color:white;">
                            <div class="top-sec">
                                <img class="img" src="{{ asset('img/cover1.png') }}">
                            </div>
                            <br>
                            <div class="container">
                                <div class="bottom-sec">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            @if($d->main_cat == "Food")
                                                <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                            @else
                                                <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                            </div>
                                        </div>   
                                        <br>
            
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                    
                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                    @endif
                                                    @php $rating--; @endphp
                                                </span>
                                                @endforeach
            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                @if(count($cake) > 15)
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreCake"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>       
        </div>
        <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
            <div class="container" style="margin-bottom:20px;">
                <div class="row" id="itemsContainer">   
                    @php $count=0; @endphp 
                    @foreach($cho as $d)
                        @php $count++; @endphp
                        @if($count > 15) @break; @endif
                        @php $rating = $d->rating; @endphp
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                            <div class="card c" style="background-color:white;">
                            <div class="top-sec">
                                <img class="img" src="{{ asset('img/cover1.png') }}">
                            </div>
                            <br>
                            <div class="container">
                                <div class="bottom-sec">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            @if($d->main_cat == "Food")
                                                <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                            @else
                                                <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                            </div>
                                        </div>   
                                        <br>
            
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                    
                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                    @endif
                                                    @php $rating--; @endphp
                                                </span>
                                                @endforeach
            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                @if(count($cho) > 15)
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreCho"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
                        </div>
                    </div>
                @endif
            </div>      
        </div>
        <div class="tab-pane fade" id="pills-spi" role="tabpanel" aria-labelledby="pills-spi-tab">
            <div class="container" style="margin-bottom:20px;">
                <div class="row" id="itemsContainer">   
                    @php $count=0; @endphp 
                    @foreach($ice as $d)
                        @php $count++; @endphp
                        @if($count > 15) @break; @endif
                        @php $rating = $d->rating; @endphp
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                            <div class="card c" style="background-color:white;">
                            <div class="top-sec">
                                <img class="img" src="{{ asset('img/cover1.png') }}">
                            </div>
                            <br>
                            <div class="container">
                                <div class="bottom-sec">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            @if($d->main_cat == "Food")
                                                <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                            @else
                                                <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px;">
                                            <div class="col-12">
                                            <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                            </div>
                                        </div>   
                                        <br>
            
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                                @foreach(range(1,5) as $i)
                                                <span class="fa-stack" style="width:1em">
                                                    
                                                    @if($rating >0)
                                                        @if($rating >0.5)
                                                            <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @else
                                                            <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                        @endif
                                                    @else
                                                        <i class="fa fa-star fa-stack-1x"></i>
                                                    @endif
                                                    @php $rating--; @endphp
                                                </span>
                                                @endforeach
            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                @if(count($ice) > 15)
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center;">
                            <a href="/SeeMoreIce"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
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
            <img src="{{ asset('img/cover1.png') }}" style="height:500px;">
            <div style="position:absolute; bottom:0; height:500px; width:100%; background-color:rgba(0, 0, 0, 0.2)">
                <h5 class="type title" style="color:white; font-size:38px; text-align:left; margin-top:360px; margin-left:60px;"> <b>{{$d->name}}</b></h5> 
                <a href="{{$d->link}}"><button class="btn btn-danger" style="margin-left:60px; margin-top:10px; magin-bottom:30px;">Interested</button></a>
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
        <div class="row">
            @php $count=0; @endphp 
            @foreach($tview as $d)
                @php $count++; @endphp
                @if($count > 6) @break; @endif
                @php $rating = $d->rating; @endphp
                <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                    <div class="card c" style="background-color:white;">
                    <div class="top-sec">
                        <img class="img" src="{{ asset('img/cover1.png') }}">
                    </div>
                    <br>
                    <div class="container">
                        <div class="bottom-sec">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <label class="categorysug" style="margin-left:0;">Viewer : {{$d->click_count}}</label>
                                    </div>
                                </div> 
                                <br>
                                <div class="row" style="margin-top: 5px;">
                                    <div class="col-12">
                                    <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                    @if($d->main_cat == "Food")
                                        <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                    @else
                                        <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                    @endif
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px;">
                                    <div class="col-12">
                                    <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                    <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                    </div>
                                </div>   
                                <br>
    
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        @foreach(range(1,5) as $i)
                                        <span class="fa-stack" style="width:1em">
                                            
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                @else
                                                    <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-star fa-stack-1x"></i>
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                        @endforeach
    
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4" style=" text-align:center; height:100%;  ">
                                        <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                        <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            @endforeach
    
        </div>
    
        @if(count($tview) > 6)
            <br>
            <div class="row">
                <div class="col-12" style="text-align:center;">
                    <a href="/moreViewDessert"><button class="btn btn-danger">See More</button></a>
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
        <div class="row">
        @php $count=0; @endphp
        @foreach($trating as $d)
            @php $count++; @endphp
            @if($count > 10) @break; @endif
            @php $rating = $d->rating; @endphp
            <div class="col-6">
                <div class="card mb-3" style="max-width: 100%;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('img/cover1.png') }}" class="card-img" style="height:100%; padding:10px;">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h2 class="smalltitle title"><b> {{$d->name}} </b></h2>   
                                <label class="categorysug" style="margin-left:0">Food Category : 
                                    @if($d->main_cat == "Food")
                                    {{$d->category}}
                                @else
                                    {{$d->type}}
                                @endif    
                                </label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        @foreach(range(1,5) as $i)
                                        <span class="fa-stack" style="width:1em">   
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    <i class="fa fa-star fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                @else
                                                    <i class="fa fa-star-half fa-stack-1x" style="font-size: 18px; color:#FFE200;"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-star fa-stack-1x"></i>
                                            @endif
                                            @php $rating--; @endphp
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="col-lg-2" style=" text-align:center; height:100%; padding-left:10px; padding-right:10px;">
                            <label class="categorysug toprate">{{$d->rating}}</label>
                            <i class="fa fa-heart" style="font-size:30px; padding-bottom:10px;"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if(count($trating) > 10)
        <br>
        <div class="row">
            <div class="col-12" style="text-align:center;">
                <a href="/moreRatingDessert"><button class="btn btn-danger">See More</button></a>
            </div>
        </div> 
    @endif
    <br><br>
@endsection