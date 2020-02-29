<div class="container">
    @if(count($item) > 0)
    @php
        $count = 0;
    @endphp
        @foreach($item as $d)
            {{-- <div class="row"> --}}
                <a href="/seeArticleDetail?id={{$d->id}}" class="rev">
                    <div class="row rev" style="border-radius:5px; margin-top:20px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);" class="rev">
                        <div class="col-lg-1 col-sm-2 col-2 col-md-1 justify-content-center d-flex align-items-center" style="border-top-left-radius:5px; border-bottom-left-radius:5px; background-color:#CD454B; ">
                            <div class="justify-content-center d-flex align-items-center" style="width:70px; height:70px;">
                                <label style="color:white; font-size:20px;">{{++$count}}</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-12 col-md-3" style="padding:10px;">
                            <img src="{{ asset($d->image) }}" alt="" style="width:100%; height:130px; object-fit:cover;">
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12 col-md-6" style="padding-top:25px; padding-bottom:25px;">
                            <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>   
                            
                            @if($d->status == "Active")
                                <img src="{{ asset('img/icons/correct.png') }}" style="width:25px; height:25px;">
                            @else
                                <img src="{{ asset('img/icons/quit.png') }}" style="width:25px; height:25px;">
                            @endif
                            <label class="categorysug">Status : {{$d->status}}</label>
                            <br>
    
                            <img src="{{ asset('img/icons/calendar.png') }}" style="width:25px; height:25px;">
                            <label class="categorysug">Posted on : {{date("M d, Y", strtotime($d->created_at ))}}</label>
                            
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 col-sm-12 justify-content-center d-flex align-items-center" style="text-align:center; padding:10px;">
                            <form method="get" action="/editArticle">
                                <input type="hidden" value="{{$d->id}}" name="id">
                                <button class="btn btn-danger" style="margin-left:10px; margin-right:10px;" type="submit">Edit</button>
                            </form>
                        </div>
                    </div>
                </a>
            {{-- </div> --}}
        @endforeach
    @else
        <div class="row">
            <div class="col-lg-12" style="text-align:center;">
                <img src="{{asset('img/icons/notfound.png')}}" style="width:400px;">
            </div>
            <div class="col-lg-12" style="text-align:center;">
                <h3 style="color:#606060; font-size:20px;">No Posts</h3>
            </div>
        </div>
    @endif
</div>