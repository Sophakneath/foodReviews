<div class="row">
    @php $count=0; @endphp
    @foreach($tview as $d)
        @php $count++; @endphp
        @if($count > 6) @break; @endif
        @php $rating = $d->rating @endphp
        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="margin-bottom:20px;">
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
                    </a>
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
                            
                            {{-- @if($uid != 0)
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <input type="hidden" id="vpostID{{$d->id}}" value="{{$d->id}}">
                                    <input type="hidden" id="vdishID{{$d->dishID}}" value="{{$d->dishID}}">
                                    <input type="hidden" id="vuid{{$uid}}" value="{{$uid}}">

                                    @if($d->saverID == $uid)
                                            <i class="fa fa-heart" id="vfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right;" onclick="submitFavWithoutReload('vfav{{$d->id}}', 'vunfav{{$d->id}}', 'vpostID{{$d->id}}', 'vdishID{{$d->dishID}}','vuid{{$uid}}')" hidden></i>
                                            <i class="fa fa-heart" id="vunfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right; color:#CD454B" onclick="submitUnfavWithoutReload('vfav{{$d->id}}', 'vunfav{{$d->id}}', 'vpostID{{$d->id}}', 'vdishID{{$d->dishID}}','vuid{{$uid}}')"></i>
                                    @else
                                            <i class="fa fa-heart" id="vfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right;" onclick="submitFavWithoutReload('vfav{{$d->id}}', 'vunfav{{$d->id}}', 'vpostID{{$d->id}}', 'vdishID{{$d->dishID}}','vuid{{$uid}}')" ></i>
                                            <i class="fa fa-heart" id="vunfav{{$d->id}}" style="font-size:30px; width:100%; text-align:right; color:#CD454B" onclick="submitUnfavWithoutReload('vfav{{$d->id}}', 'vunfav{{$d->id}}', 'vpostID{{$d->id}}', 'vdishID{{$d->dishID}}','vuid{{$uid}}')" hidden></i>
                                    @endif
                                </div>
                            @else
                                <a href="/login"><i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right; color:black;"></i></a>
                            @endif --}}
                        </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>  