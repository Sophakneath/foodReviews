@php
    session_start();
@endphp

@extends('adminMaster')

@section('title', 'Advertisement')

@section('content')

<style>
    /* .ani{
        transition: 10s;
    } */

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
    .cardview{
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.2s;
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

    .rev
    {
        transition: 0.3s;
        padding-left:0px;
        text-decoration: none;
    }

    .rev:hover
    {
        transition: 0.3s;
        padding-left:20px;
        text-decoration: none;
    }

</style>

    <div class="container">
        @if(isset($_SESSION['addAdvetise']))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
            @php
                echo $_SESSION['addAdvertise'];
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @php session_destroy(); @endphp
        @endif
        @if(isset($_SESSION['editAdvertise']))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:20px;">
                @php
                    echo $_SESSION['editAdvertise'];
                @endphp
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php session_destroy(); @endphp
        @endif
    </div>
    
    @foreach ($data as $d)
    @php $creator = $d->username @endphp
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
                        <h3 class="t">{{$d->username}}</h3>
                        <h6 style="color:#606060; font-size:18px; margin-top:20px;">{{ $d->email}}</h6>
                        <h6 style="color:#606060; font-size:18px; margin-top:20px;">Role : {{ strtoupper($d->role)}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <br><br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="width:100%; border-radius:10px;">
                    <ul class="swipetabnav nav  nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist" style="overflow-x: auto;">
                        <li class="nav-item cde" id="active" style="margin-right:10px; margin-left:10px;" onclick="changeState('active','inactive','write')">
                            <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-hea" aria-selected="true">
                                <center><span class="logohelper"></span><img src="{{ asset('img/icons/active.png') }}" style="width:100px; display:inline-block;">
                                <br>
                                <label class="label">Active</label>
                                </center>
                            </div>
                        </li>
                        <li class="nav-item cde" id="inactive" style="margin-right:10px; margin-left:10px;" onclick="changeState('inactive','active','write')">
                            <div class="item slidecat" style="padding-top:30px; padding-bottom:30px; width:200px;" id="pills-veg-tab" data-toggle="pill" href="#pills-veg" role="tab" aria-controls="pills-veg" aria-selected="false">
                                <center><span class="logohelper"></span><img src="{{ asset('img/icons/offline.png') }}" style="width:100px; display:inline-block;">
                                <br>
                                <label class="label">InActive</label>
                                </center>
                            </div>
                        </li>
                        <li class="nav-item cde" id="write" style="margin-right:10px; margin-left:10px;" onclick="changeState('write','active','inactive')">
                            <div class="item slidecat" style="padding-top:30px; padding-bottom:30px;  width:200px;" id="pills-hea-tab" data-toggle="pill" href="#pills-hea" role="tab" aria-controls="pills-on" aria-selected="false">
                                <center><span class="logohelper"></span><img src="{{ asset('img/icons/addmore.png') }}" style="width:100px; display:inline-block;">
                                <br>
                                <label class="label">Add More</label>
                                </center>
                            </div>
                        </li>  
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="container">
                    <hr style="height:1px; background-color:gainsboro;">
                    <br>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-7 col-7 offset-md-2 offset-1">
                                    <input class="input form-control" id="ac" type="text" placeholder=" Search by name">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-3">
                                    <button class="btn btn-danger" style="width:100%" onclick="searchActive()">Search</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container" id="activeContainer">
                            @include('widgets.advertiseItem',['item'=>$active])  
                        </div>   
                    </div>
                    
                    <div class="tab-pane fade" id="pills-veg" role="tabpanel" aria-labelledby="pills-veg-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-7 col-7 offset-md-2 offset-1">
                                    <input class="input form-control" id="iac" type="text" placeholder=" Search by name">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-3">
                                    <button class="btn btn-danger" style="width:100%" onclick="searchInactive()">Search</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container" id="inactiveContainer">
                            @include('widgets.advertiseItem',['item'=>$inactive])
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="pills-hea" role="tabpanel" aria-labelledby="pills-hea-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card cardview">
                                    <div class="row">
                                        <div class="col-lg-12" style="padding:80px">
                                            <h3 class="type title" style="font-size:28px"> <b>ADD MORE ADVERTISEMENT?</b></h3>   
                                            <br><br>
                                            <form method="POST" action="{{ url('/api/uploadAvertisement')}}" enctype="multipart/form-data">
    
                                                <input type="hidden" value={{$creator}} name="creator">
    
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Contact</label>
                                                            <input type="text" class="form-control" id="contact" name="contact" style="border-radius:5px" placeholder="+85512 299 299" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Location</label>
                                                            <input type="text" class="form-control" id="location" name="location" style="border-radius:5px" placeholder="#F21, Street.K4B, Teuk Thla District, San Sok Commune, Phnom Penh, Cambodia" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Link</label>
                                                            <input type="text" class="form-control" id="link" name="link" style="border-radius:5px" placeholder="https://www.thefood.com/start/home" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Short Description</label>
                                                            <textarea type="text" class="form-control" id="short-des" name="short-des" cols="30" rows="2" style="border-radius:5px" required></textarea>
                                                            {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Serve</label>
                                                            <textarea type="text" class="form-control" id="serve" name="serve" cols="30" rows="2" style="border-radius:5px" required></textarea>
                                                            {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" id="labelSp">Status</label>
                                                            <select class="form-control" id="status" name="status" style="border-radius:5px">
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Image for Cover</label>
                                                            <input class="form-control" type="file" id="img1" name="img1" required accept="image/*" onchange="preview(event,'img',0)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-6 offset-md-3">
                                                        <div class="form-group">
                                                            <img src="" width='100%' id='img' style="margin-top:20px;" alt="Image to be shown" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-lg-12 align-self-center" style="text-align:center">
                                                        <button type="submit" class="btn btn-danger" name="submit">ADD ADVERTISEMENT</button>
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
            </div>
        </div>
    </div>
<br><br>

<script>
    
    $(document).ready(function()
    {
        $('#active').css({'box-shadow':'0 0 16px 1px rgba(0, 0, 0, 0.1)'});
    });

    function changeState(a,b,c){
        var c1 = document.getElementById(a);
        var c2 = document.getElementById(b);
        var c3 = document.getElementById(c);
        c1.style.boxShadow = "0 0 16px 1px rgba(0, 0, 0, 0.1)"; 
        c2.style.boxShadow = "none"; 
        c3.style.boxShadow = "none"; 
    }

    function preview(evt, id, index)
    {
        var img=document.getElementById(id);
        img.src=URL.createObjectURL(evt.target.files[index])
    }
    function gotoEdit(url)
    {
        window.open(url,"_self");
    }
    function searchActive()
    {
        // alert('abc');
        var n = document.getElementById('ac').value;
        // alert(n);

        $.ajax({
            type: 'get',
            url: '/searchActiveAdvertise',
            data:
            {
                name:n
            },
            success:function(response)
            {
                $('#activeContainer').html(response.activeAdvertise);
            }
        });
    }
    function searchInactive()
    {
        // alert('abc');
        var n = document.getElementById('iac').value;

        $.ajax({
            type: 'get',
            url: '/searchInactiveAdvertise',
            data:
            {
                name:n
            },
            success:function(response)
            {
                $('#inactiveContainer').html(response.inactiveAdvertise);
            }
        });
    }
</script>
@endsection