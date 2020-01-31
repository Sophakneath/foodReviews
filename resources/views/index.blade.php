@extends('master')

@section('title', 'Homepage')

@section('Maintitle', 'HEALTHY & TASTY')

@section('Subtitle', 'Laughter is brightest, where Food is best.')

@section('content')

<style>
    a:hover{
        text-decoration:none;
    }

    .abc:hover{
        border:1px solid #CD454B;
    }

    a{
        text-decoration:none;
    }
</style>

<br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="type title"> <b>DISCOVER YOUR FAVOURITES</b></h5>      
            </div>    
        </div>
        <br><br>    
        <form action="/searchDishes" method="GET">
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="inputtitle">What's it name?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="input" name="name" type="text" placeholder=" Dish name">
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
                            <label class="inputtitle">Main Category</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <select class="input" name="mainCat" id="" style="margin-bottom:20px;">
                                <option value="Food">Food</option>
                                <option value="Drink">Drink</option>
                                <option value="Dessert">Desserts & Bakes</option>
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

<br><br><br>

<div class="row" style="margin:0">
    <div class="col-lg-12">
        <h5 class="type title"> <b>MAIN CATEGORY</b></h5>      
    </div>    
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <a href="/food">
            <div class="card c abc" style="width: 100%; padding:25px;">
                <center>
                <img src="{{ asset('img/icons/sandwich.png') }}" class="card-img-top" style="width:80px;">
                </center>
                <br>
                <div class="card-body" style="padding:0">
                    <h5 class="type title"> <b>FOOD</b></h5>   
                </div>
            </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <a href="/drink">
            <div class="card c abc" style="width: 100%; padding:25px;">
                <center>
                <img src="{{ asset('img/icons/soft-drink.png') }}" class="card-img-top" style="width:80px;">
                </center>
                <br>
                <div class="card-body" style="padding:0">
                    <h5 class="type title"> <b>DRINK</b></h5>   
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <a href="/dessertsAndBakes">
            <div class="card c abc" style="width: 100%; padding:25px;">
                <center>
                <img src="{{ asset('img/icons/muffin.png') }}" class="card-img-top" style="width:80px;">
                </center>
                <br>
                <div class="card-body" style="padding:0">
                    <h5 class="type title"> <b>DESSERTS & BAKES</b></h5>   
                </div>
            </div></a>
            </a>
        </div>
        
    </div>
</div>

<br><br><br>

<div class="row" style="margin:0">
    <div class="col-lg-12">
        <h5 class="type title"> <b>FIND OUT MORE ABOUT THESE DISHES</b></h5>      
    </div>    
</div>
<br>
{{-- <div class="container" style="padding:20px; padding-bottom:5px; border:1px solid #707070;">
    <div class="row">
        <div class="col-lg-12">
            <div class="owl-carousel owl-theme custom1">
                @php $sug='Vegetarian'; @endphp
                <div class="item slidecat" id="cat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/fruit.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Vegetarian</label>
                </div>

                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/steak.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Meat Lover</label>
                </div>
                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">On Diet</label>
                </div>
                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/healthy-food.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Healthy</label>
                </div>
                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/salad.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Spicy Lover</label>
                </div>
                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/food-and-restaurant.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Sweet</label>
                </div>
                <div class="item slidecat">
                    <span class="logohelper"></span><img src="{{ asset('img/icons/alcohol.png') }}" style="width:40px; display:inline-block;">
                    <label class="categorysug">Alcohol</label>
                </div> 
            </div>
        </div>
    </div>
</div>
<br><br> --}}

<div class="container" style="margin-bottom:20px;">
    <div class="row" id="itemsContainer">   
        @php $count=0; @endphp 
        @foreach($data as $d)
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

    <br>
    <div class="row">
        <div class="col-12" style="text-align:center;">
            <a href="/SeeMore"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
        </div>
    </div>
    <br><br>
</div>

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
        <h5 class="type title"> <b>TOP VIEW DISHES</b></h5>      
    </div>    
</div>    
<br><br>

<div class="container" style="margin-bottom:20px;">
    <div class="row">
        @php $count=0; @endphp
        @foreach($tview as $d)
            @php $count++; @endphp
            @if($count > 6) @break; @endif
            @php $rating = $d->rating @endphp
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

    <br>
    <div class="row">
        <div class="col-12" style="text-align:center;">
            <a href="/moreView"><button class="btn btn-danger">See More</button></a>
        </div>
    </div>
    <br><br>
</div>

<div class="row" style="margin:0">
    <div class="col-lg-12">
        <h5 class="type title"> <b>TOP RATING DISHES</b></h5>      
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

    <br>
    <div class="row">
        <div class="col-12" style="text-align:center;">
            <a href="/moreRating"><button class="btn btn-danger">See More</button></a>
        </div>
    </div>

    <br><br><br>
    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>HEALTHY ADVICES</b></h5>      
        </div>    
    </div>    
    <br><br>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card" style="width: 100%;">
                <img src="{{ asset('img/icons/calories.png') }}" class="card-img-top mx-auto" style="width:100px; margin-top:25px;">
                <div class="card-body">
                    <h5 class="type title"> <b>CALORIES CONTROL</b></h5>   
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card" style="width: 100%;">
                <img src="{{ asset('img/icons/healthy.png') }}" class="card-img-top mx-auto" style="width:100px; margin-top:25px;">
                <div class="card-body">
                    <h5 class="type title"> <b>DISHES FOR HEALTH</b></h5>   
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card" style="width: 100%;">
                <img src="{{ asset('img/icons/thingtodo.png') }}" class="card-img-top mx-auto" style="width:100px; margin-top:25px;">
                <div class="card-body">
                    <h5 class="type title"> <b>HEALTHY LIFESTYLE</b></h5>   
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<script>
    var data ;
    var type = "";
    function scrollToBottom()
    {
        var element = document.getElementById("scroll");
        element.scrollIntoView();
    }

    $(document).ready(function(){
        // $('#cat').click(function(e){
        // var thistype = "veget";
        // type = thistype;

        // fetchData(type,10,0);
        // });

        // $('#btnSeeMore').click(function(){
        //     fetchMoreData("abel");    
        // });
    });

    function  fetchData(type,limit,offset){

        $.ajax({
            type: 'POST',
            url: '/api/getsuggest',
            data: {type: type,limit:limit,offset:offset},
            success: function(res){
                console.log(res);
                data = res;
                updateView();
            }
        });
    }

    function  fetchMoreData(type){
        var limit = 10
        var offset = data.length;
        $.ajax({
            type: 'POST',
            url: '/api/getsuggest',
            data: {type: type,limit:limit,offset:offset},
            success: function(res){
            console.log(res);
            addData(res);
            }
        });
    }

    function addData(newData){
            
            if (data){
                data.push.apply(data,newData);
                console.log("append",data.length);
            }else{
                data=newData; 
                console.log(data.length);
            }
            updateView();
    }

    function updateView(){
        var html = "";
            data.forEach(d => {
                       console.log(d);
                       html += " <div class=\"col-lg-4 col-md-4 col-sm-12 col-12\" style=\"padding-bottom:20px;\">\n                <div class=\"card c\" style=\"background-color:white;\">\n                <div class=\"top-sec\">\n                    <img class=\"img\" src=\"{{ asset('img/cover1.png') }}\">\n                </div>\n                <br>\n                <div class=\"container\">\n                    <div class=\"bottom-sec\">\n                            <div class=\"row\">\n                                <div class=\"col-12\">\n                                    <h2 class=\"smalltitle title\"><b> "+d.name+"</b></h2>      \n                                </div>\n                            </div>\n                            <div class=\"row\">\n                                <div class=\"col-12\">\n                                    <label class=\"categorysug\" style=\"margin-left:0;\">Reviewed by {{$d->username}}</label>\n                                </div>\n                            </div> \n                            <br>\n                            <div class=\"row\">\n                                <div class=\"col-12\">\n                                    <img src=\"{{ asset('img/icons/spoon.png') }}\" style=\"width:25px; height:25px;\">\n                                    <label class=\"categorysug\">&nbsp;Dish Type : {{$d->type}}</label>\n                                </div>\n                            </div> \n                            <div class=\"row\" style=\"margin-top: 5px;\">\n                                <div class=\"col-12\">\n                                <img src=\"{{ asset('img/icons/location.png') }}\" style=\"width:25px; height:25px;\">\n                                <label class=\"categorysug\">&nbsp;Country : {{$d->country}}</label>\n                                </div>\n                            </div>   \n                            <br>\n\n                            <div class=\"row\">\n                                <div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">\n                                    @foreach(range(1,5) as $i)\n                                    <span class=\"fa-stack\" style=\"width:1em\">\n                                        \n                                        @if($rating >0)\n                                            @if($rating >0.5)\n                                                <i class=\"fa fa-star fa-stack-1x\" style=\"font-size: 18px; color:#FFE200;\"></i>\n                                            @else\n                                                <i class=\"fa fa-star-half fa-stack-1x\" style=\"font-size: 18px; color:#FFE200;\"></i>\n                                            @endif\n                                        @else\n                                            <i class=\"fa fa-star fa-stack-1x\"></i>\n                                        @endif\n                                        @php $rating--; @endphp\n                                    </span>\n                                    @endforeach\n\n                                </div>\n                                <div class=\"col-lg-4 col-md-4 col-sm-4 col-4\" style=\" text-align:center; height:100%;  \">\n                                    <label class=\"categorysug\" style=\"background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;\">{{ $d->rating/$d->num_of_pp_rating }}</label>\n                                </div>\n                                <div class=\"col-lg-2 col-md-2 col-sm-2 col-2\">\n                                    <i class=\"fa fa-heart\" style=\"font-size:30px; width:100%; text-align:right;\"></i>\n                                </div>\n                            </div>\n                        </div>\n                </div>\n                </div>\n            </div>"
                        
                   });
              document.getElementById("itemsContainer").innerHTML = html;
    }
    
</script>
@endsection