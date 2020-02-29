@extends('detailMaster')

@section('title', 'Review Detail')

{{-- @section('Maintitle', 'HEALTHY & TASTY') --}}

{{-- @section('Subtitle', 'Laughter is brightest, where Food is best.') --}}

@section('content')

<style>
    .send{
        border:1px solid gainsboro; padding:5px; text-align:center; border-radius:5px;
    }

    .send:hover{
        background-color: ghostwhite;
    }

    .mTitle, .modal-header{
        font-family: Chalkduster;
        text-align: center;
        width: 100%;
    }

    .modal-body>p{
        font-family: Chalkduster;
        line-height: 40px;
        font-size: 16px;
    }

    .icon{
        width: 150px;
        height: 150px;
        border-radius:50%;
    }

    .cardview{
        /* border: 1px solid #CD454B; */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        margin:0;
        padding:30px; 
    }

    .sub{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

    .sub:hover{
        box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); 
        transition: 0.3s;
    }

</style>

<div class="container">
    <div class="row">
        
        @foreach ($data as $d)
            @php $rating = $d->rating; @endphp
            <div class="col-lg-8">
                {{-- <label> --}}
                    <label id="ratingConTop">
                        @include('widgets.ratingView',['rating'=>$rating,'num'=>$d->num_of_pp_rating])
                    </label>
                     | &nbsp; <i class="fa fa-eye"></i> &nbsp; {{$d->click_count}} Viewers 
                {{-- </label> --}}

                <div class="card" style="width: 100%; margin-bottom:40px; margin-top:10px; box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1);">
                    <img class="card-img-top" src="{{ asset($d->cover) }}" alt="Card image cap" style="height:400px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-text" style="font-family: Chalkduster;">{{$d->name}}</h3>
                        <h6 class="card-text" style="margin-top:20px; font-size:18px;" data-target="#myModal" data-toggle="modal">Reviewed by &nbsp;
                            @if($d->image != null)
                                <img src="{{ asset($d->image) }}" style="width:40px; height:40px; border-radius:50%; object-fit:cover">
                            @else
                                <img src="{{ asset("img/icons/account.png") }}" style="width:40px; height:40px; border-radius:50%; object-fit:cover">
                            @endif
                            &nbsp; {{$d->username}}
                        </h6>
                        <p class="card-text"><small class="text-muted" id="time">
                            @php 
                                $timestamp = strtotime($d->date);	
                                
                                $strTime = array("second", "minute", "hour", "day", "month", "year");
                                $length = array("60","60","24","30","12","10");

                                $currentTime = time();
                                if($currentTime >= $timestamp) {
                                        $diff     = time()- $timestamp;
                                        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                        $diff = $diff / $length[$i];
                                        }

                                        $diff = round($diff);

                                        $ago = $diff . " " . $strTime[$i] . "s ago ";
                                        echo $ago;
                                } 
                            @endphp
                        </small></p>
                        
                        <hr>
                        @if($uid != 0)
                            <input type="hidden" id="postID{{$d->id}}" value="{{$d->id}}">
                            <input type="hidden" id="dishID{{$d->dishID}}" value="{{$d->dishID}}">
                            <input type="hidden" id="uid{{$uid}}" value="{{$uid}}">

                            @if(count($saves) > 0)
                                <button type="button" id="unfav" class="btn btn-danger" style="margin-right:10px;" onclick="submitUnfavWithoutReload('fav','unfav','postID{{$d->id}}','dishID{{$d->dishID}}','uid{{$uid}}')"><i class="fa fa-heart"></i>&nbsp; Unfavourite</button>
                                <button type="button" id="fav" class="btn btn-outline-secondary" style="margin-right:10px;" onclick="submitFavWithoutReload('fav','unfav','postID{{$d->id}}','dishID{{$d->dishID}}','uid{{$uid}}')" hidden><i class="fa fa-heart"></i>&nbsp; Favourite</button>
                            @else
                                <button type="button" id="unfav" class="btn btn-danger" style="margin-right:10px;" onclick="submitUnfavWithoutReload('fav','unfav','postID{{$d->id}}','dishID{{$d->dishID}}','uid{{$uid}}')" hidden><i class="fa fa-heart"></i>&nbsp; Unfavourite</button>
                                <button type="button" id="fav" class="btn btn-outline-secondary" style="margin-right:10px;" onclick="submitFavWithoutReload('fav','unfav','postID{{$d->id}}','dishID{{$d->dishID}}','uid{{$uid}}')"><i class="fa fa-heart"></i>&nbsp; Favourite</button>
                            @endif
                            
                            @if(count($rate) > 0)
                                @foreach ($rate as $r)
                                    <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-star"></i>&nbsp; Rate &nbsp;<strong id='showCount'>{{$r->rate}}</strong>
                                    </button>
                                    <div class="collapse" id="collapseExample" style="margin-top:20px;">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-3">Rating</div>
                                                <div class="col-lg-3 col-md-3 col-sm-5 col-5">
                                                    @for($i=0; $i<$r->rate; $i++)
                                                        <i class="fa fa-star" id="star2" style="font-size: 18px; margin-right:5px; color:#FFE200;"></i>
                                                    @endfor
                                                    @for($i=0; $i<5-($r->rate); $i++)
                                                        <i class="fa fa-star" id="star3" style="font-size: 18px; margin-right:5px;"></i>
                                                    @endfor
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-2 col-2">
                                                    <label id="count">{{$r->rate}} </label> &nbsp; <i class="fa fa-star" style="font-size: 18px; color:#FFE200;"></i>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-star"></i>&nbsp; Rate &nbsp;<strong id='showCount'></strong>
                                </button>
                                <div class="collapse" id="collapseExample" style="margin-top:20px;">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-3">Rating</div>
                                            <div class="col-lg-3 col-md-3 col-sm-5 col-5">
                                                <i class="fa fa-star" id="star1" style="font-size: 18px; margin-right:5px;" onclick="star1()"></i>
                                                <i class="fa fa-star" id="star2" style="font-size: 18px; margin-right:5px; color:#FFE200;" hidden onclick="star2()"></i>
                                                <i class="fa fa-star" id="star3" style="font-size: 18px; margin-right:5px;" onclick="star3()"></i>
                                                <i class="fa fa-star" id="star4" style="font-size: 18px; margin-right:5px; color:#FFE200;" hidden onclick="star4()"></i>
                                                <i class="fa fa-star" id="star5" style="font-size: 18px; margin-right:5px;" onclick="star5()"></i>
                                                <i class="fa fa-star" id="star6" style="font-size: 18px; margin-right:5px; color:#FFE200;" hidden onclick="star6()"></i>
                                                <i class="fa fa-star" id="star7" style="font-size: 18px; margin-right:5px;" onclick="star7()"></i>
                                                <i class="fa fa-star" id="star8" style="font-size: 18px; margin-right:5px; color:#FFE200;" hidden onclick="star8()"></i>
                                                <i class="fa fa-star" id="star9" style="font-size: 18px;" onclick="star9()"></i>
                                                <i class="fa fa-star" id="star10" style="font-size: 18px; color:#FFE200;" hidden onclick="star10()"></i>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-2 col-2">
                                                <label id="count">0 </label> &nbsp; <i class="fa fa-star" style="font-size: 18px; color:#FFE200;"></i>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <label onclick="sendRating()" id="submit">Submit</label>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            @endif    
                        @else
                            <a href="/login"><button type="button" id="fav" class="btn btn-outline-secondary" style="margin-right:10px;"><i class="fa fa-heart"></i>&nbsp; Favourite</button></a>
                            <a href="/login"><button class="btn btn-outline-secondary" type="button"><i class="fa fa-star"></i>&nbsp; Rate</button></a>
                        @endif
                    </div>
                </div>
                
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size:18px;"><strong>Overview</strong></a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="font-size:18px;"><strong>Ingredient</strong></a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" style="font-size:18px;"><strong>Recipe</strong></a>
                </div>
                  
                <div class="tab-content" id="nav-tabContent" >
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="border-bottom:1px dashed #606060; padding:16px;">
                                @if($d->main_cat == "Food")
                                    <label>Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->category}}</label>
                                @else
                                    <label>Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->type}}</label>
                                @endif
                            </div>
                            <div class="col-lg-12" style="border-bottom:1px dashed #606060; padding:16px;">
                                <label>Country &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->country}}</label>
                            </div>
                            <div class="col-lg-12" style="border-bottom:1px dashed #606060; padding:16px;">
                                @if($d->main_cat == "Food")
                                    <label>Spicyness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->spicyness}}</label>
                                @else
                                    <label>Sweetness &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->sweetness}}</label>
                                @endif
                            </div>
                            <div class="col-lg-12" style="padding:16px;">
                                <label>Ease Of Making &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$d->ease_of_making}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="border-bottom:1px dashed #606060; padding:16px;">
                                <label>What you need for cooking this dish?</label>
                            </div>
                            <div class="col-lg-12" style="padding:16px;">
                                {!!$d->ingredient!!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="border-bottom:1px dashed #606060; padding:16px;">
                                <label>Step to make this dish?</label>
                            </div>
                            <div class="col-lg-12" style="padding:16px;">
                                {!!$d->recipe!!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top:20px;">
                    <a class="nav-item nav-link active" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size:18px;"><strong>Gallery</strong></a>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="padding-top:16px; padding-bottom:10px;">
                                <div class="owl-carousel owl-theme custom2">
                                    <div class="item">
                                        <img src="{{ asset($d->gallery1) }}" alt="Card image cap" style="height:400px; object-fit: cover;">
                                    </div> 
                                    <div class="item">
                                        <img src="{{ asset($d->gallery2) }}" alt="Card image cap" style="height:400px; object-fit: cover;">
                                    </div> 
                                    <div class="item">
                                        <img src="{{ asset($d->cover) }}" alt="Card image cap" style="height:400px; object-fit: cover;">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top:20px;">
                    <a class="nav-item nav-link active" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size:18px;"><strong>Reviews</strong></a>
                </div>
                <div class="tab-content" id="nav-tabContent" style="margin-bottom:40px;">
                    <div class="tab-pane fade show active" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:60px; padding-left:60px; padding-bottom:10px;">
                            <div class="col-lg-12" style="padding-top:16px; padding-bottom:10px; text-align:center; margin-bottom:10px;">
                                @foreach ($data as $d)
                                @php $rating = $d->rating; @endphp

                                <input type="hidden" id="postID" value="{{$d->id}}">
                                <input type="hidden" id="uid" value="{{$uid}}">

                                <label id="ratingConBottom" style="text-align:center; width:50%; border:2px solid gainsboro; border-radius:20px; padding:10px;">
                                    {{-- <label > --}}
                                        @include('widgets.ratingView',['rating'=>$rating,'num'=>$d->num_of_pp_rating])
                                    {{-- </label> --}}
                                </label>
                                @endforeach
                            </div>
                            
                            <div  id="commentContainer" style="width:100%;">
                                @include('widgets.commentView',['comments'=>$comments])
                            </div>

                            @if($uid != 0)
                                <div class="col-lg-12" style="margin-top:20px; margin-bottom:20px;">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-1" style="border:1px solid gainsboro; padding:5px; text-align:center; border-radius:5px;">
                                            <img src="{{asset('img/icons/comment.png')}}" style="width:20px; height:20px; ">
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                                            <input class="input form-control" id="comment" type="text" placeholder=" Write your comment">
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-1 send" onclick="sendComment()">
                                            <img src="{{asset('img/icons/send.png')}}" style="width:20px; height:20px; ">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12" style="margin-top:20px; margin-bottom:20px;">
                                    <a href="/login">
                                        <div class="row">
                                            <div class="col-lg-1" style="border:1px solid gainsboro; padding:5px; text-align:center; border-radius:5px;">
                                                <img src="{{asset('img/icons/comment.png')}}" style="width:20px; height:20px; ">
                                            </div>
                                            
                                            <div class="col-lg-10">
                                                <input class="input form-control" id="comment" type="text" placeholder=" Write your comment">
                                            </div>
                                            <div class="col-lg-1 send" onclick="sendComment()">
                                                <img src="{{asset('img/icons/send.png')}}" style="width:20px; height:20px; ">
                                            </div>   
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-lg-4">
            <label> <strong> Get to know about this Restaurants </strong></label>
                <div class="row">
                    @foreach($res as $d)
                    <div class="col-lg-6" style="margin-top:20px;">
                        <a href="{{$d->link}}" target="_blank" class="rev">
                            <div class="card" style="width: 100%; height:100%; box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1);">
                                <img class="card-img-top" src="{{ asset($d->image) }}" alt="Card image cap" style="height:110px; object-fit:cover;">
                                <div class="card-body">
                                <label style="font-size:12px; width:100%;"> <strong style="font-size:15px;">{{$d->name}}</strong>
                                    <br><br>
                                    Serve : {{$d->serve}}
                                </label>
                                {{-- <label class="block-ellipsis" class="text-muted"> {{$d->short_des}} </label> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
           
            <label style="margin-top:40px;"> <strong> EASY PEASY Preparation </strong></label>
            <div class="container" style="margin-top:10px;">
                @foreach($suggest as $d)
                <a href="/reviewDetail?postID={{$d->id}}&name={{$d->name}}" class="rev">
                    <div class="row" style="padding-top:10px; padding-bottom:10px; border-radius:5px; margin-top:10px; box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1); margin-bottom:20px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <img src="{{ asset($d->cover) }}" alt="" style="width:100%; height:50px; object-fit:cover;">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 justify-content-center d-flex align-items-center" style="height:100%;">
                            <label style="font-size:13px; width:100%;"> <strong style="font-size:15px;">{{$d->name}}</strong>
                            <br>
                            @if($d->main_cat == "Food")
                                Cateogry : {{$d->category}}
                            @else
                                Cateogry : {{$d->type}}
                            @endif
                            </label>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-2 justify-content-center d-flex align-items-center">
                            <label style="font-size:13px; background-color:#FFE200; width:100%; padding:5px; text-align:center; border-radius:5px; color:white;">{{$d->rating}}</label>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div> 
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="mTitle" id="exampleModalLabel" style="color: rgb(230, 100, 100); margin-top: 10px;">PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            @foreach ($reviewer as $d)
            <div class="row"  style="padding:20px;">
                <div class="col-lg-12 col-md-12">
                    <div class="cardview card">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 align-self-center" style="text-align:center">
                                @if($d->image != null)
                                    <img src="{{ asset($d->image) }}" alt="" class="icon" style="object-fit:cover">
                                @else
                                    <img src="{{ asset("img/icons/account.png") }}" alt="" class="icon" style="object-fit:cover">
                                @endif
                            </div>
                            <div class="col-lg-8 col-md-8 col-12 align-self-center" style="text-align:center">
                                <h3 class="t">{{$d->username}}</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-3" style="margin-top:10px;">
                                        <label><strong style="font-size:18px;"> 
                                            @php
                                                echo count($food) + count($drink) + count($dessert)
                                            @endphp 
                                        </strong></label>
                                        <br>
                                        <label>Total Posts</label>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:10px;">
                                        <label><strong style="font-size:18px;"> @php echo count($food) @endphp </strong></label>
                                        <br>
                                        <label>Food Posts</label>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:10px;">
                                        <label><strong style="font-size:18px;"> @php echo count($drink) @endphp </strong></label>
                                        <br>
                                        <label>Drink Posts</label>
                                    </div>
                                    <div class="col-lg-3" style="margin-top:10px;">
                                        <label><strong style="font-size:18px;"> @php echo count($dessert) @endphp </strong></label>
                                        <br>
                                        <label>D&B Posts</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <br>
            <ul class="swipetabnav nav nav-pills mb-3 justify-content-center" id="pills-tab1" role="tablist" style="overflow-x: auto;">
                <li class="nav-item" id="pending" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('pending','accepted','rejected')">
                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:160px;" id="pills-pen-tab" data-toggle="pill" href="#pills-pen" role="tab" aria-controls="pills-pen" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/sandwich.png') }}" style="width:30px; display:inline-block;">
                        <label class="categorysug">Food</label>
                    </div>
                </li>
                <li class="nav-item" id="accepted" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('accepted','pending','rejected')">
                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:160px;" id="pills-acc-tab" data-toggle="pill" href="#pills-acc" role="tab" aria-controls="pills-acc" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/soft-drink.png') }}" style="width:30px; display:inline-block;">
                        <label class="categorysug">Drink</label>
                    </div>
                </li>
                <li class="nav-item" id="rejected" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;" onclick="changeState('rejected','pending','accepted')">
                    <div class="item slidecat sub" style="padding-left:10px; padding-right:10px;   width:200px;" id="pills-rej-tab" data-toggle="pill" href="#pills-rej" role="tab" aria-controls="pills-rej" aria-selected="false">
                        <span class="logohelper"></span><img src="{{ asset('img/icons/muffin.png') }}" style="width:30px; display:inline-block;">
                        <label class="categorysug">Dessert & Bake</label>
                    </div>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-pen" role="tabpanel" aria-labelledby="pills-pen-tab">
                    <div class="container">
                        @include('widgets.userreview',['item'=>$food])
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-acc" role="tabpanel" aria-labelledby="pills-acc-tab">
                    <div class="container">
                        @include('widgets.userreview',['item'=>$drink])
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-rej" role="tabpanel" aria-labelledby="pills-rej-tab">
                    <div class="container">
                        @include('widgets.userreview',['item'=>$dessert])
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">CLOSE</button>
        </div>
        
    </div>
    </div>
</div>  

<br><br>
<div id="snackbar">Favourite Post..</div>
<div id="snackbar1">Unfavourite Post..</div>
<script>
  
    $(document).ready(function()
    {
        $('#pending').css({'box-shadow':'0 0 16px 1px rgba(0, 0, 0, 0.1)'});
        $('#pending').css({'border-radius':'10px'});
    });

    function changeState(a,b,c){
        var c1 = document.getElementById(a);
        var c2 = document.getElementById(b);
        var c3 = document.getElementById(c);
        c1.style.boxShadow = "0 0 16px 1px rgba(0, 0, 0, 0.1)"; 
        c1.style.borderRadius = "10px"; 
        c2.style.boxShadow = "none"; 
        c3.style.boxShadow = "none"; 
    }

    var count = document.getElementById('count');
    $('.custom2').owlCarousel({
            items:1,
            margin:30,
            autoplay:true,
            stagePadding:30,
            smartSpeed:450
    });

    function sendRating()
    {
        var sc = document.getElementById('showCount');
        var submit = document.getElementById('submit');
        var c = document.getElementById('count').textContent;
        var p = document.getElementById('postID').value;
        var uid = document.getElementById('uid').value;
        var score=0;
        
        switch(c){
            case '1': score = 20; break;
            case '2': score = 40; break;
            case '3': score = 60; break;
            case '4': score = 80; break;
            case '5': score = 100; break;
            case '0': return; break;
        }

        $.ajax({
            type: 'get',
            url: '/rating',
            data:
            {
                postID:p,
                uID:uid,
                rating:c,
                ratingScore:score
            },
            success:function(response)
            {
                sc.innerHTML = c;
                submit.hidden = true;
                $('#ratingConTop').html(response.showRating);
                $('#ratingConBottom').html(response.showRating);
            },
            error:function(error){
                console.log('error ',error);
            }
        });
    }

    function star1()
    {
        var star1 = document.getElementById('star1');
        var star2 = document.getElementById('star2');
        
        star1.hidden = true;
        star2.hidden = false;
        count.innerHTML = "1";
    }

    function star2()
    {
        var star1 = document.getElementById('star1');
        var star2 = document.getElementById('star2');

        star4();
        count.innerHTML = "0";
        star1.hidden = false;
        star2.hidden = true;
    }

    function star3()
    {
        var star3 = document.getElementById('star3');
        var star4 = document.getElementById('star4');

        star1();
        count.innerHTML = "2";
        star3.hidden = true;
        star4.hidden = false;
    }

    function star4()
    {
        var star3 = document.getElementById('star3');
        var star4 = document.getElementById('star4');

        star6();
        count.innerHTML = "1";
        star3.hidden = false;
        star4.hidden = true;
    }

    function star5()
    {
        var star5 = document.getElementById('star5');
        var star6 = document.getElementById('star6');

        star3();
        count.innerHTML = "3";
        star5.hidden = true;
        star6.hidden = false;
    }

    function star6()
    {
        var star5 = document.getElementById('star5');
        var star6 = document.getElementById('star6');
        star8();
        count.innerHTML = "2";
        star5.hidden = false;
        star6.hidden = true;
    }

    function star7()
    {
        var star7 = document.getElementById('star7');
        var star8 = document.getElementById('star8');

        star5();
        count.innerHTML = "4";
        star7.hidden = true;
        star8.hidden = false;
    }

    function star8()
    {
        var star7 = document.getElementById('star7');
        var star8 = document.getElementById('star8');
        star10();
        count.innerHTML = "3";
        star7.hidden = false;
        star8.hidden = true;
    }
    
    function star9()
    {
        var star9 = document.getElementById('star9');
        var star10 = document.getElementById('star10');

        star7();
        count.innerHTML = "5";
        star9.hidden = true;
        star10.hidden = false;
    }

    function star10()
    {
        var star9 = document.getElementById('star9');
        var star10 = document.getElementById('star10');
        count.innerHTML = "4";
        star9.hidden = false;
        star10.hidden = true;
    }
    
    function sendComment()
    {
        var cmt = document.getElementById('comment').value;
        var p = document.getElementById('postID').value;
        var u = document.getElementById('uid').value;

        $.ajax({
            type: 'get',
            url: '/sendComment',
            data:
            {
                comment:cmt,
                postID:p,
                uid:u
            },
            success:function(response)
            {
                $('#commentContainer').html(response.cmt);
                $('#comment').val(null);
            },
            error:function(error){
                console.log('error ',error);
            }
        });   
    }

    function submitFavWithoutReload(a,b,postid,dishid,id)
    {
        // alert('hello');
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
        // alert('hello');
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
                fav.hidden = false;
                unfav.hidden = true;

                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    }
</script>
@endsection