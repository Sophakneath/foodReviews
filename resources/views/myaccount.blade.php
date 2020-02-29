@php
    session_start();
@endphp
@extends('detailMaster')

@section('title', 'My Account')

@section('content')

<style>
    /* .ani{
        transition: 10s;
    } */

    .mTitle, .modal-header{
        font-family: Chalkduster;
        text-align: center;
        width: 100%;
    }

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

    .sub{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

    .sub:hover{
        box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); 
        transition: 0.3s;
    }

    .cde:hover{
        box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); 
        border-radius:10px;
        transition: 0.3s;
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
    
    .rev:hover{
        text-decoration: none;
    }

    .coupon {
        border: 5px dashed #bbb;
        width: 80%;
        border-radius: 10px;
        margin: 0 auto;
        max-width: 600px;
    }

    .con {
        padding: 2px 16px;
    }
</style>

<div class="container">

    @if(isset($_SESSION['success']))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
            @php
                // echo $_SESSION['success'];
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php session_destroy(); @endphp
    @endif

    @if(isset($_SESSION['profile']))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
            @php
                echo $_SESSION['profile'];
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php session_destroy(); @endphp
    @endif

    @if(isset($_SESSION['reupload']))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
            @php
                echo $_SESSION['reupload'];
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php session_destroy(); @endphp
    @endif
    
    @php $uID =0 @endphp
    @foreach ($data as $d)
    @php $uID = $d->id; @endphp
    <div class="row">
        <div class="col-lg-6 col-md-6 offset-md-3">
            <div class="cardview card">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center">
                        @if($d->image != null)
                            <img src="{{ asset($d->image) }}" alt="" class="icon" style="object-fit:cover">
                        @else
                            <img src="{{ asset("img/icons/account.png") }}" alt="" class="icon" style="object-fit:cover">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center">
                        <h3 class="t">{{$d->username}}</h3>
                        <h6 style="color:#606060; font-size:18px; margin-top:20px;">{{$d->email}}</h6>
                        <button class="btn btn-danger" style="font-size:18px; margin-top:10px; width:100%;" data-toggle="modal" data-target="#modal">Total Point : {{$d->point}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <div style="width:100%; border-radius:10px;">
                <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                    <li class="nav-item cde" id="review" style="margin-right:10px; margin-left:10px;" onclick="changeState('review','write','fav','edit')">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/reviews.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" id="write" style="margin-right:10px; margin-left:10px;" onclick="changeState('write','review','fav','edit')">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/write.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">Write A Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" id="fav" style="margin-right:10px; margin-left:10px;" onclick="changeState('fav','review','write','edit')">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/fav.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Favourite</label>
                            </center>
                        </div>
                    </li>  
                    <li class="nav-item cde" id="edit" style="margin-right:10px; margin-left:10px;" onclick="changeState('edit','review','write','fav')">
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="container">
                            <ul class="swipetabnav nav nav-pills mb-3 justify-content-center" id="pills-tab1" role="tablist" style="overflow-x: auto;">
                                <li class="nav-item" id="all" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('all','pending','accepted','rejected')">
                                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;  width:220px;" id="pills-any-tab" data-toggle="pill" href="#pills-any" role="tab" aria-controls="pills-any" aria-selected="true">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/paper.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">All</label>
                                    </div>
                                </li>
                                <li class="nav-item" id="pending" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('pending','all','accepted','rejected')">
                                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:220px;" id="pills-pen-tab" data-toggle="pill" href="#pills-pen" role="tab" aria-controls="pills-pen" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/refresh.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Pending</label>
                                    </div>
                                </li>
                                <li class="nav-item" id="accepted" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('accepted','all','pending','rejected')">
                                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:220px;" id="pills-acc-tab" data-toggle="pill" href="#pills-acc" role="tab" aria-controls="pills-acc" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/correct.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Accepted</label>
                                    </div>
                                </li>
                                <li class="nav-item" id="rejected" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('rejected','all','pending','accepted')">
                                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:220px;" id="pills-rej-tab" data-toggle="pill" href="#pills-rej" role="tab" aria-controls="pills-rej" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/quit.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Rejected</label>
                                    </div>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-any" role="tabpanel" aria-labelledby="pills-any-tab">
                                    @include('widgets.myreview',['item'=>$myReview])
                                </div>
                                <div class="tab-pane fade" id="pills-pen" role="tabpanel" aria-labelledby="pills-pen-tab">
                                    @include('widgets.myreview',['item'=>$pending])
                                </div>
                                <div class="tab-pane fade" id="pills-acc" role="tabpanel" aria-labelledby="pills-acc-tab">
                                    @include('widgets.myreview',['item'=>$accept])
                                </div>
                                <div class="tab-pane fade" id="pills-rej" role="tabpanel" aria-labelledby="pills-rej-tab">
                                    <div class="row" style="margin-top:20px;">
                                        @if(count($reject) > 0)
                                            @foreach($reject as $d)
                                                @php $rating = $d->rating; @endphp
                                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="padding-bottom:20px;">
                                                    <a href="/myReviewDetail?postID={{$d->id}}" class="rev">
                                                        <div class="card c" style="background-color:white;">
                                                            <div class="top-sec">
                                                                <img class="img" src="{{ asset($d->cover) }}" style="height:180px; object-fit:cover">
                                                            </div>
                                                            <br>
                                                            <div class="container">
                                                                <div class="bottom-sec">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <h2 class="smalltitle title" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b> {{$d->name}}</b></h2>      
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
                                                                        <label class="categorysug">&nbsp;Status : {{ strtoupper($d->status) }}</label>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="row" style="margin-top: 25px;">
                                                                        <div class="col-lg-6 col-6 col-sm-6" style="text-align:right">
                                                                            <form method="get" action="/myaccount/editpost">
                                                                                <input type="hidden" value="{{$d->id}}" name="postID">
                                                                                <button class="btn btn-danger" style="margin-left:10px; margin-right:10px;" type="submit">Edit Post</button>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-lg-6 col-6 col-sm-6" style="text-align:left">
                                                                            <form method="get" action="/myaccount/resubmit">
                                                                                <input type="hidden" value="{{$d->id}}" name="postID">
                                                                                <button class="btn btn-primary" style="margin-left:10px; margin-right:10px;" type="submit" onclick="return confirm('Are you sure you want to resubmit without edit it?')">Resubmit</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-lg-12" style="text-align:center;">
                                                <img src="{{asset('img/icons/notfound.png')}}" style="width:400px;">
                                            </div>
                                            <div class="col-lg-12" style="text-align:center;">
                                                <h3 style="color:#606060; font-size:20px;">No Rejected Posts</h3>
                                            </div>
                                        @endif
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
                                                            <option value="Meat Lover">Meat Lover</option>
                                                            <option value="Healthy">Healthy</option>
                                                            <option value="Spicy Lover">Spicy Lover</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        <select class="form-control" id="drink" name="drink" style="border-radius:5px" hidden>
                                                            <option value="Smoothie">Smoothie</option>
                                                            <option value="Juice">Juice</option>
                                                            <option value="Energy Drink">Energy Drink</option>
                                                            <option value="Alcoholic">Alcoholic</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        <select class="form-control" id="dessert" name="dessert" style="border-radius:5px" hidden>
                                                            <option value="Cookie">Cookie</option>
                                                            <option value="Cake">Cake</option>
                                                            <option value="Chocolate">Chocolate</option>
                                                            <option value="Ice Cream">Ice Cream</option>
                                                            <option value="Other">Other</option>
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
                                                        <textarea type="text" class="form-control" id="ing" name="ing" style="border-radius:5px" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Recipe</label>
                                                        <textarea type="text" class="form-control" id="rec" name="rec" style="border-radius:5px" required></textarea>
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
                                                    <button type="submit" class="btn btn-danger" name="submit" style="width:150px;">SUBMIT</button>
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
                    <div class="row" id="fav-container">
                        @if(count($saves) > 0)
                            @foreach($saves as $d)
                                @php $rating = $d->rating; @endphp
                                <div id="item{{$d->saveID}}" class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                                    <div class="card c" style="background-color:white;">
                                        <a href="/reviewDetail?postID={{$d->id}}&name={{$d->name}}" class="rev">
                                        <div class="top-sec">
                                            <img class="img" src="{{ asset($d->cover) }}" style="height:180px; object-fit:cover">
                                        </div>
                                        </a>
                                    <br>
                                    <div class="container">
                                        <div class="bottom-sec">
                                            <a href="/reviewDetail?postID={{$d->id}}&name={{$d->name}}" class="rev">
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
                                            </a>
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
                                                        <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ round($d->rating,2) }}</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                        {{-- <form method="GET" action="" onsubmit=""> --}}
                                                            <input type="hidden" value="{{$d->saveID}}" name="saveID" id="saveID">
                                                            <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right; color:#CD454B" onclick="submitWithoutReload()"></i>
                                                        {{-- </form> --}}
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12" style="text-align:center;">
                                <img src="{{asset('img/icons/notfound.png')}}" style="width:400px;">
                            </div>
                            <div class="col-lg-12" style="text-align:center;">
                                <h3 style="color:#606060; font-size:20px;">No Favourite Posts</h3>
                            </div>
                        @endif
                    </div>    
                </div>

                <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="post" action="{{ url('/api/editProfile')}}" enctype="multipart/form-data">
                                <div class="card cardview">
                                    @foreach ($data as $d)
                                    <div class="row">
                                        <div class="col-lg-6 align-self-center" style="text-align:center">
                                            @if($d->image != null)
                                                <img src="{{ asset($d->image) }}" alt="" class="icon1" id="pro" style="object-fit:cover">
                                            @else
                                                <img src="{{ asset("img/icons/account.png") }}" alt="" class="icon1" id="pro" style="object-fit:cover">
                                            @endif
                                            
                                            <br>
                                            <div class="upload-btn-wrapper" style="margin-top:20px;">
                                                <button class="upload">Upload a file</button>
                                                <input class="form-control" type="file" id="myfile" name="myfile" accept="image/*" onchange="preview(event,'pro',0)">
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
                                                <button type="submit" class="btn btn-danger" style="border-radius:5px; width:150px;">UPDATE</button>
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

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="mTitle" id="exampleModalLabel" style="color: rgb(230, 100, 100); margin-top: 10px;">REWARD DETAIL</h5>
        </div>
        <div class="container">
            <div class="modal-body">
                <br>
                <div class="row">
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>20% OFF FROM THE PIZZA COMPANY</b></h5> 
                              <p>Redeem Your Reward With 200 Points.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>30% OFF FROM KOI THE CAMBODIA</b></h5> 
                              <p>Redeem Your Reward With 300 Points.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>20% OFF FROM THE PIZZA COMPANY</b></h5> 
                              <p>Redeem Your Reward With 200 Points.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>30% OFF FROM KOI THE CAMBODIA</b></h5> 
                              <p>Redeem Your Reward With 300 Points.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>20% OFF FROM THE PIZZA COMPANY</b></h5> 
                              <p>Redeem Your Reward With 200 Points.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="margin-bottom:20px;">
                        <div class="coupon">
                            <img src="{{asset('/img/cover1.png')}}" alt="Avatar" style="width:100%; height:200px; padding:10px; border-radius: 10px;">
                            <div class="con" style="background-color:white">
                              <h5><b>30% OFF FROM KOI THE CAMBODIA</b></h5> 
                              <p>Redeem Your Reward With 300 Points.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
</div>  

<br><br>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var roxyFileman = 'fileman/index.html'; 
    CKEDITOR.replace( 'rec',{filebrowserBrowseUrl:roxyFileman,
                            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                            removeDialogTabs: 'link:upload;image:upload'}); 

    CKEDITOR.replace( 'ing',{filebrowserBrowseUrl:roxyFileman,
                            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                            removeDialogTabs: 'link:upload;image:upload'}); 
</script>

<script>
    $(document).ready(function()
    {
        $('#review').css({'box-shadow':'0 0 16px 1px rgba(0, 0, 0, 0.1)'});
        $('#all').css({'box-shadow':'0 0 16px 1px rgba(0, 0, 0, 0.1)'});
        $('#all').css({'border-radius':'10px'});
    });

    function changeState(a,b,c,d){
        var c1 = document.getElementById(a);
        var c2 = document.getElementById(b);
        var c3 = document.getElementById(c);
        var cc = document.getElementById(d);
        c1.style.boxShadow = "0 0 16px 1px rgba(0, 0, 0, 0.1)"; 
        c1.style.borderRadius = "10px"; 
        c2.style.boxShadow = "none"; 
        c3.style.boxShadow = "none"; 
        cc.style.boxShadow = "none"; 
    }

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

    function submitWithoutReload()
    {
        var id = document.getElementById('saveID').value;
        $.ajax({
            type: 'get',
            url: '/myaccount/unfavourite',
            data:
            {
                saveID:id
            },
            success:function(response)
            {
                var did = '#item'+id;
                var i=0;
                var nodata = '<div class="col-lg-12" style="text-align:center;"> <img src="{{asset("img/icons/notfound.png")}}" style="width:400px;"></div><div class="col-lg-12" style="text-align:center;"><h3 style="color:#606060; font-size:20px;">No Favourite Posts</h3></div>';
                $(did).remove();
                if ( $('#fav-container').children().length <= 0 ) {
                    $('#fav-container').html(nodata);
                }
            }
        });
    }
</script>
@endsection