@extends('detailMaster')

@section('title', 'Search Dishes')

@section('content')

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
                        <input class="input form-control" name="name" type="text" placeholder=" Dish name" value="{{$name}}">
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
                        <select class="input" name="mainCat" id="mainCat" style="margin-bottom:20px;">
                            @if($mainCat == "Food")
                                <option value="Food" selected>Food</option>
                                <option value="Drink">Drink</option>
                                <option value="Dessert">Desserts & Bakes</option>
                            @elseif($mainCat == "Drink")
                                <option value="Food">Food</option>
                                <option value="Drink" selected>Drink</option>
                                <option value="Dessert">Desserts & Bakes</option>
                            @else
                                <option value="Food">Food</option>
                                <option value="Drink">Drink</option>
                                <option value="Dessert" selected>Desserts & Bakes</option>
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
            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-bottom:20px;">
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
        <br>
        
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