@extends('detailMaster')

@section('title', 'Search Food')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="type title"> <b>DISCOVER YOUR FAVOURITES</b></h5>      
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
                        <input class="input form-control" name="name" type="text" placeholder=" Dish name" value="{{$name}}">
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
                        <select class="input" name="type" id="mainCat" style="margin-bottom:20px;">
                            @if($type == "Vegetarian")
                                <option value="Vegetarian" selected>Vegetarian</option>
                                <option value="Meat Lover">Meat Lover</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Spicy Lover">Spicy Lover</option>
                                <option value="Other">Other</option>
                            @elseif($type == "Meat Lover")
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meat Lover" selected>Meat Lover</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Spicy Lover">Spicy Lover</option>
                                <option value="Other">Other</option>
                            @elseif($type == "Healthy")
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meat Lover">Meat Lover</option>
                                <option value="Healthy" selected>Healthy</option>
                                <option value="Spicy Lover">Spicy Lover</option>
                                <option value="Other">Other</option>
                            @elseif($type == "Spicy Lover")
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meat Lover">Meat Lover</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Spicy Lover" selected>Spicy Lover</option>
                                <option value="Other">Other</option>
                            @else
                                <option value="Vegetarian">Vegetarian</option>
                                <option value="Meat Lover">Meat Lover</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Spicy Lover">Spicy Lover</option>
                                <option value="Other" selected>Other</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-danger input" type="submit">Search</button>
                    </div>
                </div> 
            </div>
        </div>
    </form>

    <br>

    <div class="container" style="margin-bottom:20px;">
        <div class="row" id="itemsContainer">   
            @foreach($result as $d)
            @php $rating = $d->rating; @endphp
                <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                    <a href="/reviewDetail?postID={{$d->id}}&name={{$d->name}}" class="rev">
                    <div class="card c" style="background-color:white;">
                        <div class="top-sec">
                            <img class="img" src="{{ asset($d->cover) }}" style="height:180px; object-fit:cover">
                        </div>
                        <br>
                        <div class="container">
                            <div class="bottom-sec">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="smalltitle title" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b> {{$d->name}}</b></h2>      
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
                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                                            <label class="categorysug">&nbsp;Dish Type : {{$d->category}}</label>
                                        </div>
                                    </div>  --}}
                                    <div class="row" style="margin-top: 5px;">
                                        <div class="col-12">
                                        <img src="{{ asset('img/icons/location.png') }}" style="width:25px; height:25px;">
                                        <label class="categorysug">&nbsp;Country : {{$d->country}}</label>
                                        </div>
                                    </div>  
                                    <div class="row" style="margin-top: 5px;">
                                        <div class="col-12">
                                        <img src="{{ asset('img/icons/type.png') }}" style="width:25px; height:25px;">
                                        @if($d->main_cat == "Food")
                                            <label class="categorysug">&nbsp;Category : {{$d->category}}</label>
                                        @else
                                            <label class="categorysug">&nbsp;Category : {{$d->type}}</label>
                                        @endif
                                        </div>
                                    </div>   
                                    <br>
        
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
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
                                            <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ round($d->rating,2) }}</label>
                                        </div>
                                        {{-- <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                        </div> --}}
                                    </div>
                                </div>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>

        @if(count($result) <= 0)
            <center>
                <img src="{{ asset('img/notfound.jpg') }}" style="height:400px;">
            </center>
        @endif

        {{-- @php var_dump(); @endphp --}}
    
        <br>
        {{-- <div class="row">
            <div class="col-12" style="text-align:center;">
                <a href="/SeeMore"><button class="btn btn-danger" id="btnSeeMore">See More</button></a>
            </div>
        </div>
        <br><br> --}}
    </div>
   
    <script>
        $('document').ready(function()
        {
            // alert($mainCat);
            // $("#mainCat").val('Drink');
            // // var_dump($mainCat);
        });
        
    </script>
</div>  

@endsection