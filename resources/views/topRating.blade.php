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
        
        
            <div class="row">
            @foreach($data as $d)
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
       {{ $data->links() }}
        
    </div>

@endsection