<div class="container">
@if(count($item) > 0)
    @foreach($item as $d)
        @php $rating = $d->rating; @endphp
        <div class="row">
            <a href="/seePostDetail?postID={{$d->id}}&status={{$d->status}}&reviewerID={{$d->reviewerID}}" class="rev">
                <div class="row" style="border-radius:5px; margin-top:20px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <div class="col-lg-1 col-sm-2 col-2 col-md-1 justify-content-center d-flex align-items-center" style="border-top-left-radius:5px; border-bottom-left-radius:5px; background-color:#CD454B; ">
                        <div class="justify-content-center d-flex align-items-center" style="width:70px; height:70px;">
                            <label style="color:white; font-size:20px;">{{$d->id}}</label>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-12 col-md-3" style="padding:10px;">
                        <img src="{{ asset($d->cover) }}" alt="" style="width:100%; height:130px; object-fit:cover;">
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12 col-md-6" style="padding-top:12px; padding-bottom:12px;">
                        <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>   
                        <label class="categorysug" style="margin-left:0;">Reviewed by {{$d->username}}</label>
                        <br>
                        <img src="{{ asset('img/icons/spoon.png') }}" style="width:25px; height:25px;">
                        @if($d->main_cat == "Food")
                            <label class="categorysug">Category : {{$d->category}}</label>
                        @else
                            <label class="categorysug">Category : {{$d->type}}</label>
                        @endif
                        <br>
                        <img src="{{ asset('img/icons/calendar.png') }}" style="width:25px; height:25px;">
                        @if($d->status == "accepted")
                            <label class="categorysug" style="white-space: pre-wrap;">&nbsp;Accepted on : {{ date("M d, Y", strtotime($d->checked_at))}}</label>
                        @elseif($d->status == "rejected")
                            <label class="categorysug" style="white-space: pre-wrap;">&nbsp;Rejected on : {{ date("M d, Y", strtotime($d->checked_at))}}</label>
                        @else
                        <label class="categorysug" style="white-space: pre-wrap;">&nbsp;Posted on : {{ date("M d, Y", strtotime($d->checked_at))}}</label>
                        @endif
                    </div>
                    @if($d->status == "pending")
                        <div class="col-lg-2 col-md-2 col-12 col-sm-12 justify-content-center d-flex align-items-center" style="text-align:center; padding:10px;">
                            <form method="get" action="/checkAndEdit">
                                <input type="hidden" value="{{$d->id}}" name="postID">
                                <button class="btn btn-danger" style="margin-left:10px; margin-right:10px;" type="submit">Check & Edit</button>
                            </form>
                        </div>
                    @endif
                </div>
            </a>
        </div>
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