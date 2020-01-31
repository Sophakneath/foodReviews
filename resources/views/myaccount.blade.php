@extends('detailMaster')

@section('title', 'My Account')

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
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
    }

    .icon{
        width: 80%;
    
        
    }
</style>
<div class="container-fluid" >
    <div class="row" style="">
        <div class="col-lg-12">
            {{-- <center> --}}
            <div style="width:100%; border-radius:10px;">
                <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/reviews.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/write.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">Write A Reviews</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-meat-tab" data-toggle="pill" href="#pills-meat" role="tab" aria-controls="pills-meat" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/profile.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Profile</label>
                            </center>
                        </div>
                    </li>
                    <li class="nav-item cde" style="margin-right:10px; margin-left:10px;">
                        <div class="item slidecat" style="padding-top:30px; padding-bottom:30px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                            <center><span class="logohelper"></span><img src="{{ asset('img/icons/fav.png') }}" style="width:100px; display:inline-block;">
                            <br>
                            <label class="label">My Favourite</label>
                            </center>
                        </div>
                    </li>   
                </ul>
            </div>
            {{-- </center> --}}
        </div>
        <div class="col-lg-12">
            <div class="container">
                <hr style="height:1px; background-color:gainsboro;">
                <br>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="container">
                        <div class="row">
                            <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:20px; padding-right:20px;  width:265px;" id="pills-any-tab" data-toggle="pill" href="#pills-any" role="tab" aria-controls="pills-hea" aria-selected="true">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/paper.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">All</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:20px; padding-right:20px;  width:265px;" id="pills-pen-tab" data-toggle="pill" href="#pills-pen" role="tab" aria-controls="pills-veg" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/pending.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Pending</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:20px; padding-right:20px;  width:265px;" id="pills-acc-tab" data-toggle="pill" href="#pills-acc" role="tab" aria-controls="pills-meat" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/accept.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Accepted</label>
                                    </div>
                                </li>
                                <li class="nav-item" style="margin-right:10px; margin-left:10px; margin-top:10px; margin-bottom:10px;">
                                    <div class="item slidecat abc" style="padding-left:20px; padding-right:20px;  width:265px;" id="pills-rej-tab" data-toggle="pill" href="#pills-rej" role="tab" aria-controls="pills-on" aria-selected="false">
                                        <span class="logohelper"></span><img src="{{ asset('img/icons/cancellation.png') }}" style="width:40px; display:inline-block;">
                                        <label class="categorysug">Rejected</label>
                                    </div>
                                </li>
                            </ul>

                            <div class="tab-pane fade" id="pills-any" role="tabpanel" aria-labelledby="pills-any-tab">
                                {{-- <div class="row">
                                    @php $count=0; @endphp 
                                    @foreach($tview as $d)
                                        @php $count++; @endphp
                                        @if($count > 6) @break; @endif
                                        @php $rating = $d->rating; @endphp
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom:20px;">
                                            <div class="card c" style="background-color:white;">
                                            <div class="top-sec">
                                                <img class="img" src="{{ asset('img/cover1.png') }}">
                                            </div>
                                            <br>
                                            <div class="container">
                                                <div class="bottom-sec">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h2 class="smalltitle title"><b> {{$d->name}}</b></h2>      
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
                            
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
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
                                                                <label class="categorysug" style="background-color:#FFE200; border-radius:5px; color:white; width:100%; margin-left:0; padding-top:2px; padding-bottom:2px;">{{ $d->rating }}</label>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                                <i class="fa fa-heart" style="font-size:30px; width:100%; text-align:right;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> --}}
                           </div>
                           <div class="tab-pane fade" id="pills-pen" role="tabpanel" aria-labelledby="pills-pen-tab">
                               
                           </div>
                           <div class="tab-pane fade" id="pills-acc" role="tabpanel" aria-labelledby="pills-acc-tab">
                                   
                           </div>
                           <div class="tab-pane fade" id="pills-rej" role="tabpanel" aria-labelledby="pills-rej-tab">
                                   
                        </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
                     <div class="container">
                        <div class="col-lg-12">
                            <div class="card cardview">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-12" style="padding:80px">
                                            <h3 class="type title" style="font-size:28px"> <b>WHAT DO YOU WANT TO REVIEW?</b></h3>   
                                            <br><br>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Dish's Name</label>
                                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" style="border-radius:5px" placeholder="LokLak Beef">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Main Category</label>
                                                            <select class="form-control" id="exampleInputEmail1" name="email" style="border-radius:5px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Category</label>
                                                            <select class="form-control" id="exampleInputEmail1" name="email" style="border-radius:5px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Country</label>
                                                            <select class="form-control" id="exampleInputEmail1" name="email" style="border-radius:5px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Spicyness</label>
                                                            <select class="form-control" id="exampleInputEmail1" name="email" style="border-radius:5px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ease of Making</label>
                                                            <select class="form-control" id="exampleInputEmail1" name="email" tyle="border-radius:5px">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Ingredient</label>
                                                            <textarea class="form-control" id="exampleInputEmail1" name="email" cols="30" rows="5" style="border-radius:5px"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Recipe</label>
                                                            <textarea class="form-control" id="exampleInputEmail1" name="email" cols="30" rows="5" style="border-radius:5px"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Gallery</label>
                                                            <input class="form-control" type="file" id="exampleInputEmail1" name="email" style="border-radius:5px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12  align-self-center">
                                                    <button type="submit" class="btn btn-danger" name="login" style="border-radius:10px; width:150px;">SUBMIT</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="tab-pane fade" id="pills-meat" role="tabpanel" aria-labelledby="pills-meat-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card cardview">
                                    <div class="row">
                                        <div class="col-lg-6 align-self-center" style="text-align:center">
                                            <img src="{{ asset('img/about/d.png') }}" alt="" class="icon">
                                        </div>
                                        <div class="col-lg-6" style="padding:80px">
                                            <h3 class="type title" style="font-size:28px"> <b>HELLO ABC!</b></h3>   
                                            <br><br>
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Full Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius:5px" placeholder="Hongky">
                                                  </div>
                                                <div class="form-group">
                                                  <label for="exampleInputEmail1">Email address</label>
                                                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="border-radius:5px" placeholder="abc@gmail.com">
                                                </div>
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">Password</label>
                                                  <input type="password" class="form-control" id="exampleInputPassword1" style="border-radius:5px" placeholder="*************">
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12  align-self-center">
                                                    <button type="submit" class="btn btn-danger" style="border-radius:20px; width:150px;">UPDATE</button>
                                                    </div>
                                                </div>
                                              </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
                        
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection