@extends('master')

@section('title', 'Homepage')

@section('Maintitle', 'HEALTHY & TASTY')

@section('Subtitle', 'Laughter is brightest, where Food is best.')

@section('content')

<style>
    a:hover{
        text-decoration:none;
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
                            <input class="input form-control" name="name" type="text" placeholder=" Dish name">
                        </div>
                    </div>  
                </div>
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
            <div class="card c" style="width: 100%; padding:25px;">
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
            <div class="card c" style="width: 100%; padding:25px;">
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
            <div class="card c" style="width: 100%; padding:25px;">
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

{{-- All item  --}}

<div class="container" id="itemContainer" style="margin-bottom:20px;">
    @include('widgets.allitem',['data'=>$data])
</div>
<br>

@if(count($data) > 15)
    <div class="row" style="margin:0">
        <div class="col-12" style="text-align:center;">
            <a href="/SeeMore"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
        </div>
    </div>
    <br><br>
@endif

{{--  --}}

<div id="snackbar">Favourite Post..</div>
<div id="snackbar1">Unfavourite Post..</div>

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
        <h5 class="type title"> <b>TOP VIEW DISHES</b></h5>      
    </div>    
</div>    
<br><br>

<div class="container" id="topviewContainer" style="margin-bottom:20px;">
    @include('widgets.topview',['tview'=>$tview])
</div>

<br>

@if(count($tview) > 6)
<div class="row" style="margin:0">
    <div class="col-12" style="text-align:center;">
        <a href="/moreView"><button class="btn btn-danger">See More</button></a>
    </div>
</div>
<br><br>
@endif

{{--  --}}


{{-- Top rating item --}}

<div class="row" style="margin:0">
    <div class="col-lg-12">
        <h5 class="type title"> <b>TOP RATING DISHES</b></h5>      
    </div>    
</div>  

<div class="container" id="toprating">
    @include('widgets.toprating',['trating'=>$trating])
</div>
<br>

@if(count($trating) > 10)
<div class="row" style="margin:0">
    <div class="col-12" style="text-align:center;">
        <a href="/moreRating"><button class="btn btn-danger">See More</button></a>
    </div>
</div>
@endif

{{--  --}}
    

<div class="container">
    <br><br><br>
    <div class="row" style="margin:0">
        <div class="col-lg-12">
            <h5 class="type title"> <b>HEALTHY ADVICES</b></h5>      
        </div>    
    </div>    
    <br><br>
    <div class="row">
        @foreach($article as $d)
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <a href="/articleDetail?id={{$d->id}}">
                    <div class="card hea" style="width: 100%;">
                        <img src="{{ asset($d->icon) }}" class="card-img-top mx-auto" style="width:100px; height:100px; object-fit:cover; margin-top:25px;">
                        <div class="card-body">
                            <h5 class="type title"> <b>{{$d->name}}</b></h5>   
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<br><br>

<script>
    var data ;
    var type = "";

    function submitFavWithoutReload(a,b,postid,dishid,id)
    {
        var fav = document.getElementById(a);
        var unfav = document.getElementById(b);
        var x = document.getElementById("snackbar");
        var pid = document.getElementById(postid).value;
        var did = document.getElementById(dishid).value;
        var uid = document.getElementById(id).value;

        $.ajax({
            type: 'get',
            url: '/myaccount/favourite',
            data:
            {
                postID:pid,
                uID:uid,
                dishID:did
            },
            success:function(response)
            {
                // console.log('Res ',response.itemView);

                $('#toprating').html(response.toprating);
                $('#itemContainer').html(response.allitem);
                $('#topviewContainer').html(response.topview);

                fav.hidden = true;
                unfav.hidden = false;

                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            },
            error:function(error){
                console.log('error ',error);
            }
        });
        
    }
    
    function submitUnfavWithoutReload(a,b,postid,dishid,id)
    {
        var fav = document.getElementById(a);
        var unfav = document.getElementById(b);
        var x = document.getElementById("snackbar1");
        var pid = document.getElementById(postid).value;
        var did = document.getElementById(dishid).value;
        var uid = document.getElementById(id).value;

        $.ajax({
            type: 'get',
            url: '/myaccount/unfavourite',
            data:
            {
                postID:pid,
                uID:uid
            },
            success:function(response)
            {

                $('#toprating').html(response.toprating);
                $('#itemContainer').html(response.allitem);
                $('#topviewContainer').html(response.topview);

                fav.hidden = false;
                unfav.hidden = true;

                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
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