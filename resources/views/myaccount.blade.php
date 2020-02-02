@extends('detailMaster')

@section('title', 'My Account')

@section('content')

<style>
    .label{
        margin-top:10px;
        font-size:20px;
        font-family: Chalkduster;
        color: #606060;
    }

    .t{
        margin-top:10px;
        font-size:29px;
        font-family: Chalkduster;
        color: #606060;
    }

    .abc{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

    .abc:hover{
        background-color:white;
    }

    .cde:hover{
        border:2px solid #CD454B; 
        border-radius:10px;
    }

    .cardview{
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        margin:0;
        padding:30px; 
        
    }

    .icon{
        width: 200px;
        height: 200px;
        border-radius:50%;
    }

    .icon1{
        width: 300px;
        height: 300px;
        border-radius:50%;
    }

    .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }

    .upload {
    /* border: 2px solid #CD454B; */
    color: white;
    background-color: #CD454B;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 16px;
    }

    .upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }

    .upload:hover{
        background-color:gray;
        color:white;
    }

</style>
<div class="container">

    {{-- @if($success != null)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success</strong> $success.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @php $success = null @endphp
    @endif --}}
    
    @php $uID =0 @endphp
    @foreach ($data as $d)
    @php $uID = $d->id @endphp
    <div class="row">
        <div class="col-lg-6 col-md-6 offset-md-3">
            <div class="cardview card">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center">
                        <img src="{{ asset('img/about/d.png') }}" alt="" class="icon">
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center">
                        <h3 class="t">{{$d->username}}</h3>
                        <h6 style="color:#606060; font-size:18px; margin-top:20px;">{{$d->email}}</h6>
                        {{-- <button class="btn btn-outline-danger" style="margin-top:10px">Edit Profile</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br><br>
    <div class="row" style="">
        <div class="col-lg-12">
            <div style="width:100%; border-radius:10px;">
                <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/reviews.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/write.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">Write A Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/fav.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Favourite</label>
                            </center>
                        </div>
                    </li>  
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-meat-tab" data-toggle="pill" href="#pills-meat" role="tab" aria-controls="pills-meat" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/profile.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">Edit Profile</label>
                            </center>
                        </div>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="container">
                <hr style="height:1px; background-color:gainsboro;">
                <br>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="container">
                        <div class="row">
                            <ul class="swipetabnav nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:10px; padding-right:10px;  width:255px;" id="pills-any-tab" data-toggle="pill" href="#pills-any" role="tab" aria-controls="pills-any" aria-selected="true">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/paper.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">All</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:10px; padding-right:10px;   width:255px;" id="pills-pen-tab" data-toggle="pill" href="#pills-pen" role="tab" aria-controls="pills-pen" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/refresh.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Pending</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:10px; padding-right:10px;   width:255px;" id="pills-acc-tab" data-toggle="pill" href="#pills-acc" role="tab" aria-controls="pills-acc" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/correct.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Accepted</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:10px; padding-right:10px;   width:255px;" id="pills-rej-tab" data-toggle="pill" href="#pills-rej" role="tab" aria-controls="pills-rej" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/quit.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Rejected</label>
                                    </div>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-any" role="tabpanel" aria-labelledby="pills-any-tab">
                                    <div class="row" style="margin-top:20px;">
                                    @foreach($myReview as $d)
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
                                                        <div class="row" style="margin-top: 5px;">
                                                            <div class="col-12">
                                                            @if($d->status == "accepted")
                                                                <img src="{{ asset('img/icons/correct.png') }}" style="width:25px; height:25px;">
                                                            @elseif($d->status == "rejected")
                                                                <img src="{{ asset('img/icons/quit.png') }}" style="width:25px; height:25px;">
                                                            @else
                                                                <img src="{{ asset('img/icons/refresh.png') }}" style="width:25px; height:25px;">
                                                            @endif
                                                            <label class="categorysug">&nbsp;Status : {{$d->status}}</label>
                                                            </div>
                                                        </div> 
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-pen" role="tabpanel" aria-labelledby="pills-pen-tab">
                                    <div class="row" style="margin-top:20px;">
                                    @foreach($pending as $d)
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
                                                        <div class="row" style="margin-top: 5px;">
                                                            <div class="col-12">
                                                            @if($d->status == "accepted")
                                                                <img src="{{ asset('img/icons/correct.png') }}" style="width:25px; height:25px;">
                                                            @elseif($d->status == "rejected")
                                                                <img src="{{ asset('img/icons/quit.png') }}" style="width:25px; height:25px;">
                                                            @else
                                                                <img src="{{ asset('img/icons/refresh.png') }}" style="width:25px; height:25px;">
                                                            @endif
                                                            <label class="categorysug">&nbsp;Status : {{$d->status}}</label>
                                                            </div>
                                                        </div> 
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-acc" role="tabpanel" aria-labelledby="pills-acc-tab">
                                    <div class="row" style="margin-top:20px;">
                                    @foreach($accept as $d)
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
                                                        <div class="row" style="margin-top: 5px;">
                                                            <div class="col-12">
                                                            @if($d->status == "accepted")
                                                                <img src="{{ asset('img/icons/correct.png') }}" style="width:25px; height:25px;">
                                                            @elseif($d->status == "rejected")
                                                                <img src="{{ asset('img/icons/quit.png') }}" style="width:25px; height:25px;">
                                                            @else
                                                                <img src="{{ asset('img/icons/refresh.png') }}" style="width:25px; height:25px;">
                                                            @endif
                                                            <label class="categorysug">&nbsp;Status : {{$d->status}}</label>
                                                            </div>
                                                        </div> 
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-rej" role="tabpanel" aria-labelledby="pills-rej-tab">
                                    <div class="row" style="margin-top:20px;">
                                    @foreach($reject as $d)
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
                                                        <div class="row" style="margin-top: 5px;">
                                                            <div class="col-12">
                                                            @if($d->status == "accepted")
                                                                <img src="{{ asset('img/icons/correct.png') }}" style="width:25px; height:25px;">
                                                            @elseif($d->status == "rejected")
                                                                <img src="{{ asset('img/icons/quit.png') }}" style="width:25px; height:25px;">
                                                            @else
                                                                <img src="{{ asset('img/icons/refresh.png') }}" style="width:25px; height:25px;">
                                                            @endif
                                                            <label class="categorysug">&nbsp;Status : {{$d->status}}</label>
                                                            </div>
                                                        </div> 
                                                        <div class="row" style="margin-top: 25px;">
                                                            <div class="col-12">
                                                                <center>
                                                                <button class="btn btn-danger" style="margin-left:10px; margin-right:10px;">Edit Post</button>
                                                                <button class="btn btn-primary" style="margin-left:10px; margin-right:10px;">Resubmit</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
                        <div class="container">
                        <div class="col-lg-12">
                            <div class="card cardview">
                                <div class="row">
                                    <div class="col-lg-12" style="padding:80px">
                                        <h3 class="type title" style="font-size:28px"> <b>WHAT DO YOU WANT TO REVIEW?</b></h3>   
                                        <br><br>
                                        <form method="POST" action="{{ url('/api/myaccount/uploadPost')}}" enctype="multipart/form-data">

                                            <input type="hidden" value={{$uID}} name="id">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Dish's Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Main Category</label>
                                                        <select class="form-control" id="main-cat" name="main-cat" style="border-radius:5px" onchange="showInput()">
                                                            <option value="Food">Food</option>
                                                            <option value="Drink">Drink</option>
                                                            <option value="Dessert">Desserts & Bakes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Category</label>
                                                        <select class="form-control" id="food" name="food" style="border-radius:5px">
                                                            <option value="Vegetarian">Vegetarian</option>
                                                            <option value="Vegetarian">Meat Lover</option>
                                                            <option value="Vegetarian">Healthy</option>
                                                            <option value="Vegetarian">Spicy Lover</option>
                                                            <option value="Vegetarian">Other</option>
                                                        </select>
                                                        <select class="form-control" id="drink" name="drink" style="border-radius:5px" hidden>
                                                            <option value="Vegetarian">Smoothie</option>
                                                            <option value="Vegetarian">Juice</option>
                                                            <option value="Vegetarian">Energy Drink</option>
                                                            <option value="Vegetarian">Alcoholic Lover</option>
                                                            <option value="Vegetarian">Other</option>
                                                        </select>
                                                        <select class="form-control" id="dessert" name="dessert" style="border-radius:5px" hidden>
                                                            <option value="Vegetarian">Cookie</option>
                                                            <option value="Vegetarian">Cake</option>
                                                            <option value="Vegetarian">Chocolate</option>
                                                            <option value="Vegetarian">Ice Cream</option>
                                                            <option value="Vegetarian">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Country</label>
                                                        <select class="form-control" id="exampleInputEmail1" name="country" style="border-radius:5px">
                                                            @foreach($countries as $country)
                                                                <option value="{{$country}}">{{$country}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" id="labelSp">Spicyness</label>
                                                        <select class="form-control" id="spi" name="spi" style="border-radius:5px">
                                                            <option value="Not Spicy">Not Spicy</option>
                                                            <option value="Spicy">Spicy</option>
                                                            <option value="Super Spicy">Super Spicy</option>
                                                        </select>
                                                        <label for="exampleInputEmail1" hidden id="labelS">Sweetness</label>
                                                        <select class="form-control" id="swe" name="swe" style="border-radius:5px" hidden>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Sweet">Sweet</option>
                                                            <option value="Super Sweet">Super Sweet</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ease of Making</label>
                                                        <select class="form-control" id="exampleInputEmail1" name="ease" tyle="border-radius:5px">
                                                            <option value="Easy">Easy</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Hard">Hard</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ingredient</label>
                                                        <textarea class="form-control" id="exampleInputEmail1" name="ing" cols="30" rows="5" style="border-radius:5px" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Recipe</label>
                                                        <textarea class="form-control" id="exampleInputEmail1" name="rec" cols="30" rows="5" style="border-radius:5px" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Image for Cover</label>
                                                        <input class="form-control" type="file" id="img1" name="img1" required accept="image/*" onchange="preview(event,'img',0)">
                                                        <img src="" width='100%' id='img' style="margin-top:20px;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Image for Gallery (Maximum 2 files)</label>
                                                        <input class="form-control" type="file" id="img2" name="img2[]" style="border-radius:5px" required multiple onchange="checkFiles(this.files, event, 'pre1','pre2')" accept="image/*">
                                                        <div class="row" style="margin-top:20px;">
                                                            <div class="col-lg-6">
                                                                <img src="" width='100%' id='pre1'>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <img src="" width='100%' id='pre2'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12  align-self-center">
                                                <button type="submit" class="btn btn-danger" name="submit" style="border-radius:20px; width:150px;">SUBMIT</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                
                <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
                        
                </div>

                <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="post" action="{{ url('/api/editProfile')}}">
                                <div class="card cardview">
                                    @foreach ($data as $d)
                                    <div class="row">
                                        <div class="col-lg-6 align-self-center" style="text-align:center">
                                            <img src="{{ asset('img/icons/account.png') }}" alt="" class="icon1" id="pro">
                                            <br>
                                            <div class="upload-btn-wrapper" style="margin-top:20px;">
                                                <button class="upload">Upload a file</button>
                                                <input class="form-control" type="file" id="myfile" name="myfile" required accept="image/*" onchange="preview(event,'pro',0)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding:80px">
                                            <h3 class="type title" style="font-size:28px"> <b>HELLO {{$d->username}} !</b></h3>   
                                            <br><br>
                                        
                                            <input type="hidden" value="{{$d->id}}" name="id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius:5px" value="{{$d->username}}">
                                                </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius:5px" value="{{$d->email}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" style="border-radius:5px" readonly>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12  align-self-center">
                                                <button type="submit" class="btn btn-danger" style="border-radius:20px; width:150px;">UPDATE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach  
                                </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<script>
    function showInput()
    {
        var e = document.getElementById("main-cat");
        var strUser = e.options[e.selectedIndex].value;
        var x = document.getElementById("food");
        var y = document.getElementById("drink");
        var z = document.getElementById("dessert");

        var swe = document.getElementById("swe");
        var spi = document.getElementById("spi");
        var ls = document.getElementById("labelS");
        var lsp = document.getElementById("labelSp");
        
        if(strUser == "Food")
        {   
            x.hidden = false;
            y.hidden = true;
            z.hidden = true;

            ls.hidden = true;
            swe.hidden= true;
            lsp.hidden = false;
            spi.hidden = false; 
        }  
        else if(strUser == "Drink")
        {
            x.hidden = true;
            y.hidden = false;
            z.hidden = true;

            ls.hidden = false;
            swe.hidden= false;
            lsp.hidden = true;
            spi.hidden = true; 
        }  
        else
        {
            x.hidden = true;
            y.hidden = true;
            z.hidden = false;

            ls.hidden = false;
            swe.hidden= false;
            lsp.hidden = true;
            spi.hidden = true; 
        }
    }  

    function checkFiles(files, evt, id1, id2) {     

      if(files.length>2) {
        alert("You can only upload 2 files in Image for Gallery. If you choose more than 2 files, only the first 2 files will be uploaded.");
        // files.slice(0,2);
        // return false;
        }    
        preview(evt, id1, 0);
        preview(evt, id2, 1);   
    }

    function preview(evt, id, index)
    {
        var img=document.getElementById(id);
        img.src=URL.createObjectURL(evt.target.files[index])
    }
  
</script>
@endsection