@extends('detailMaster')

@section('title', 'More Data')

@section('content')

    <div class="container" style="margin-bottom:30px;">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="type title"> <b>{{$title}}</b></h5>      
            </div>    
        </div>

        <br>
        
        <div class="row" id="itemsContainer">    
            @foreach($data as $d)
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

                                    {{-- @if($code != "1")
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
                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                            </div>
                                            
                                            
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                <input type="hidden" id="postID{{$d->id}}" value="{{$d->id}}">
                                                <input type="hidden" id="dishID{{$d->dishID}}" value="{{$d->dishID}}">
                                                <input type="hidden" id="uid{{$uid}}" value="{{$uid}}">
                                                    
                                                    @if($d->saverID == $uid)
                                                            <i class="fa fa-heart" id="fav{{$d->id}}" style="font-size:30px; width:100%; text-align:right;" onclick="submitFavWithoutReload('fav{{$d->id}}', 'unfav{{$d->id}}', 'postID{{$d->id}}', 'dishID{{$d->dishID}}','uid{{$uid}}')" hidden></i>
                                                            <i class="fa fa-heart" id="unfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right; color:#CD454B" onclick="submitUnfavWithoutReload('fav{{$d->id}}', 'unfav{{$d->id}}', 'postID{{$d->id}}', 'dishID{{$d->dishID}}','uid{{$uid}}')"></i>
                                                    @else
                                                            <i class="fa fa-heart" id="fav{{$d->id}}" style="font-size:30px; width:100%; text-align:right;" onclick="submitFavWithoutReload('fav{{$d->id}}', 'unfav{{$d->id}}', 'postID{{$d->id}}', 'dishID{{$d->dishID}}','uid{{$uid}}')"></i>
                                                            <i class="fa fa-heart" id="unfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right; color:#CD454B" onclick="submitUnfavWithoutReload('fav{{$d->id}}', 'unfav{{$d->id}}', 'postID{{$d->id}}', 'dishID{{$d->dishID}}','uid{{$uid}}')" hidden></i>
                                                    @endif
                                            </div>

                                        </div>
                                    @else --}}
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
                                    {{-- @endif  --}}
                                </div>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        <br>
       {{ $data->links() }}
        
    </div>

    <div id="snackbar">Favourite Post..</div>
    <div id="snackbar1">Unfavourite Post..</div>

    <script>
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
            url: '/myaccount/favouriteMoreData',
            data:
            {
                postID:pid,
                uID:uid,
                dishID:did
            },
            success:function(response)
            {
                // $('#toprating').html(response.toprating);
                // $('#itemContainer').html(response.allitem);
                // $('#topviewContainer').html(response.topview);

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
            url: '/myaccount/unfavouriteMoreData',
            data:
            {
                postID:pid,
                uID:uid
            },
            success:function(response)
            {
                // $('#toprating').html(response.toprating);
                // $('#itemContainer').html(response.allitem);
                // $('#topviewContainer').html(response.topview);

                fav.hidden = false;
                unfav.hidden = true;

                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    }
    </script>
@endsection