@if(count($comments) > 0)
    @foreach ($comments as $c)
        <div class="col-lg-12" style="border:2px solid gainsboro; border-radius:20px; margin-bottom:20px; padding:20px;">
            <div class="row">
                <div class="col-lg-1">
                    @if($c->image != null)
                        <img src="{{ asset($c->image) }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover">
                    @else
                        <img src="{{ asset("img/icons/account.png") }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover">
                    @endif
                </div>
                <div class="col-lg-11">
                    <label style="padding-left:20px; font-size:13px; width:100%;">
                        <strong style="font-size:16px;"> {{$c->username}} </strong>
                        <br> 
                        @php 
                            $timestamp = strtotime($c->date);	
                            
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
                            // else {
                            //     echo $timestamp."<br>";
                            //     echo $currentTime;
                            // }
                        @endphp
                    </label>
                    <br>
                    <label style="padding-left:20px; font-size:13px; margin-top:5px;">{{$c->comment}}</label>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row">
        <div class="col-lg-12" style="text-align:center;">
            <label>No Comment</label>
        </div>
    </div>
    
@endif