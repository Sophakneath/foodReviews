@extends('detailMaster')

@section('title', 'Article Detail')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($article as $d)
            <div class="col-lg-8">
        
                <div class="card" style="width: 100%; margin-bottom:40px; margin-top:10px; box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.1);">
                    <img class="card-img-top" src="{{ asset($d->image) }}" alt="Card image cap" style="height:400px; object-fit: cover;">
                    <div class="card-body">
                        <h3 class="card-text" style="font-family: Chalkduster;">{{$d->name}}</h3>
                        <p class="card-text"><small class="text-muted" id="time">
                            @php 
                                $timestamp = strtotime($d->created_at);	
                                
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
                    
                    </div>
                </div>
                
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="font-size:18px;"><strong>Overview</strong></a>
                </div>
                  
                <div class="tab-content" id="nav-tabContent" >
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="padding:16px;">
                                {{$d->overview}}
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="true" style="font-size:18px;"><strong>Detail</strong></a>
                </div>
                  
                <div class="tab-content" id="nav-tabContent" >
                    <div class="tab-pane fade show active" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab" style="padding:15px;">
                        <div class="row" style="border:1px solid gainsboro; border-top:none; padding-right:20px; padding-left:20px;">
                            <div class="col-lg-12" style="padding:16px;">
                                @php echo $d->detail; @endphp
                            </div>
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
                            {{-- <label style="font-size:12px; width:100%;" class="text-muted"> {{$d->short_des}} </label> --}}
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
           
            <label style="margin-top:40px;"> <strong> Recommended Dishes </strong></label>
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
<br><br>
@endsection