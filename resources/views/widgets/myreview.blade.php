<div class="row" style="margin-top:20px;">
    @if(count($item) > 0)
        @foreach($item as $d)
            @php $rating = $d->rating; @endphp
            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-bottom:20px; width:100%;">
                <a href="/myReviewDetail?postID={{$d->id}}" class="rev">
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
                                    <label class="categorysug">&nbsp;Status : {{strtoupper($d->status)}}</label>
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
            <h3 style="color:#606060; font-size:20px;">No Posts</h3>
        </div>
    @endif
</div>