@extends('adminMaster')

@section('title', 'Post Detail')

@section('content')

<style>
    .label{
        margin-top:10px;
        font-size:20px;
        font-family: Chalkduster;
        color: #606060;
    }

    .t{
        margin-top:10px;
        font-size:29px;
        font-family: Chalkduster;
        color: #606060;
    }

    .abc{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

    .abc:hover{
        background-color:white;
    }

    .cde:hover{
        border:2px solid #CD454B; 
        border-radius:10px;
    }

    .cardview{
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        margin:0;
        padding:30px; 
        
    }

    .icon{
        width: 200px;
        height: 200px;
        border-radius:50%;
    }

    .icon1{
        width: 300px;
        height: 300px;
        border-radius:50%;
    }

    .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }

    .upload {
    /* border: 2px solid #CD454B; */
    color: white;
    background-color: #CD454B;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 16px;
    }

    .upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }

    .upload:hover{
        background-color:gray;
        color:white;
    }

    .upload:hover{
        background-color:gray;
        color:white;
    }

    .modal-body{
        padding-left: 30px; padding-right: 30px;
    }

    .mTitle, .modal-header{
        font-family: Chalkduster;
        text-align: center;
        width: 100%;
    }

    .modal-body>p{
        font-family: Chalkduster;
        line-height: 40px;
        font-size: 16px;
    }

</style>

@php $postID =0 @endphp
@foreach ($reviewer as $d)
    <div class="row" style="padding-right:20px; padding-left:20px; margin:0">
        <div class="col-lg-6 col-md-6 offset-md-3">
            <div class="cardview card">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center;margin:0">
                        @if($d->image != null)
                            <img src="{{ asset($d->image) }}" alt="" class="icon" style="object-fit:cover">
                        @else
                            <img src="{{ asset("img/icons/account.png") }}" alt="" class="icon" style="object-fit:cover">
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 align-self-center" style="text-align:center;margin:0">
                        <h6 style="color:#606060; font-size:20px;">Reviewer Name</h6>
                        <h3 class="t">{{$d->username}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br><br>

<div class="container">
    @foreach($data as $d)
    @php $postID =$d->id @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card cardview">
                <div class="row">
                    <div class="col-lg-12" style="padding:80px">
                        <h3 class="type title" style="font-size:28px"> <b>POST REVIEW DETAIL</b></h3>  
                        <h6 style="color:#606060; font-size:16px; text-align:center; margin-top:20px;">Posted on : {{ date("M d, Y", strtotime($d->date))}}</h6> 
                        @if($d->status == "accepted") 
                            <h6 style="color:#606060; font-size:16px; text-align:center; ">Accepted on : {{ date("M d, Y", strtotime($d->date))}} By {{$d->check_by}}</h6> 
                        @elseif($d->status == "rejected")
                            <h6 style="color:#606060; font-size:16px; text-align:center; ">Rejected on : {{ date("M d, Y", strtotime($d->date))}} By {{$d->check_by}}</h6> 
                        @endif
                        <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dish's Name</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->name}}" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Category</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->main_cat}}" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->category}}" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->country}}" >
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        @if($d->main_cat == "Food")
                                            <label for="exampleInputEmail1" id="labelSp">Spicyness</label>
                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->spicyness}}" >
                                        @else
                                            <label for="exampleInputEmail1" id="labelS">Sweetness</label>
                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->sweetness}}" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ease of Making</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" readonly value="{{$d->ease_of_making}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ingredient</label>
                                        <div style="border:1px solid gainsboro; padding:20px; border-radius:5px;">{!!$d->ingredient!!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Recipe</label>
                                        <div style="border:1px solid gainsboro; padding:20px; border-radius:5px;">{!!$d->recipe!!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image for Cover</label>
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-lg-12">
                                                <img src="{{asset($d->cover)}}" width='100%' id='img'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image for Gallery (Maximum 2 files)</label>
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-lg-6">
                                                <img src="{{asset($d->gallery1)}}" width='100%' id='pre1'>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{asset($d->gallery2)}}" width='100%' id='pre2'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($status == "pending")
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/checkAndEdit?postID={{$d->id}}" class="btn btn-danger btn-lg" tabindex="-1" role="button" aria-disabled="true" style="font-size:16px; margin-top:10px;">CHECK & EDIT POST</a>
                                        <button class="btn btn-secondary" data-target="#myModal" data-toggle="modal" style="font-size:18px; margin-top:10px; padding-left:20px; padding-right:20px;">REJECT</button>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>
<br><br>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="mTitle" id="exampleModalLabel" style="color: rgb(230, 100, 100); margin-top: 10px;">GIVE OUR REVIEWER SOME REASON</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ url('/rejectPost')}}" method="get">
            <div class="container">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="postID" value="{{$postID}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Reason</label>
                                <textarea class="form-control" id="reason" name="reason" cols="30" rows="5" style="border-radius:5px" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">REJECT</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>  
@endsection