<br><br>
<div class="row">
    @php $count=0; @endphp
    @foreach($trating as $d)
        @php $count++; @endphp
        @if($count > 10) @break; @endif
        @php $rating = $d->rating; @endphp
        <div class="col-6">
            <a href="/reviewDetail?postID={{$d->id}}&name={{$d->name}}" class="rev">
                <div class="card abc mb-3" style="max-width: 100%;">
                    <div class="row no-gutters">
                        
                        <div class="col-md-4">
                            <img src="{{ asset($d->cover) }}" class="card-img" style="height:100%; padding:10px; object-fit:cover">
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

                        <div class="col-lg-2" style=" text-align:center; height:100%; padding-left:10px; padding-right:10px; padding-top:20px; padding-bottom:20px;">
                            <label class="categorysug toprate">{{round($d->rating,2)}}</label>
                        </div>
                        
                        {{-- @if($uid != 0)
                            <div class="col-lg-2" style=" text-align:center; height:100%; padding-left:10px; padding-right:10px;">
                                <label class="categorysug toprate">{{$d->rating}}</label>
                                <input type="hidden" id="rpostID{{$d->id}}" value="{{$d->id}}">
                                <input type="hidden" id="rdishID{{$d->dishID}}" value="{{$d->dishID}}">
                                <input type="hidden" id="ruid{{$uid}}" value="{{$uid}}">
                                    @if($d->saverID == $uid)
                                        <i class="fa fa-heart" id="rfav{{$d->id}}" style="font-size:30px; width:100%;" onclick="submitFavWithoutReload('rfav{{$d->id}}', 'runfav{{$d->id}}', 'rpostID{{$d->id}}', 'rdishID{{$d->dishID}}','ruid{{$uid}}')" hidden></i>
                                        <i class="fa fa-heart" id="runfav{{$d->id}}" style="font-size:30px; width:100%; color:#CD454B" onclick="submitUnfavWithoutReload('rfav{{$d->id}}', 'runfav{{$d->id}}', 'rpostID{{$d->id}}', 'rdishID{{$d->dishID}}','ruid{{$uid}}')"></i>
                                    @else
                                        <i class="fa fa-heart" id="rfav{{$d->id}}" style="font-size:30px; width:100%;" onclick="submitFavWithoutReload('rfav{{$d->id}}', 'runfav{{$d->id}}', 'rpostID{{$d->id}}', 'rdishID{{$d->dishID}}','ruid{{$uid}}')"></i>
                                        <i class="fa fa-heart" id="runfav{{$d->id}}" style="font-size:30px; width:100%; color:#CD454B" onclick="submitUnfavWithoutReload('rfav{{$d->id}}', 'runfav{{$d->id}}', 'rpostID{{$d->id}}', 'rdishID{{$d->dishID}}','ruid{{$uid}}')" hidden></i>
                                    @endif
                            </div>
                        @else
                        
                            <div class="col-lg-2" style=" text-align:center; height:100%; padding-left:10px; padding-right:10px;">
                                <label class="categorysug toprate">{{$d->rating}}</label>
                                <i class="fa fa-heart" style="font-size:30px; width:100%;"></i>
                            </div>
                        
                        @endif --}}
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
