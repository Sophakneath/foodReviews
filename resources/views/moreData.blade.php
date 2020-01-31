@extends('detailMaster')

@section('title', 'MoreData')

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
       {{ $data->links() }}
        
    </div>

   

@endsection