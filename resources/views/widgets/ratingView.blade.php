@php
    $rate = $rating;
@endphp
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

&nbsp; {{ round($rate,2)}} &nbsp; | &nbsp; {{ $num}}&nbsp; Rating &nbsp;