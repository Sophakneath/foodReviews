@extends('detailMaster')

@section('title', 'My Account')

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
    
    .rev:hover{
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="col-lg-12">
        <div class="card cardview">
            <div class="row">
                @foreach($data as $d)
                <div class="col-lg-12" style="padding:80px">
                    <h3 class="type title" style="font-size:28px"> <b>YOUR REVIEW DETAIL</b></h3>   
                    <h6 style="color:#606060; font-size:16px; text-align:center; margin-top:20px;">Posted on : {{ date("M d, Y", strtotime($d->date))}}</h6> 
                    <h6 style="color:#606060; font-size:16px; text-align:center;">Status : {{ strtoupper($d->status) }}</h6> 
                    <br><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dish's Name</label>
                                    <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value={{$d->name}} readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Main Category</label>
                                    <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value={{$d->main_cat}} readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    @if($d->main_cat == "Food")
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->category}}" readonly>
                                    @else
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->type}}" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country</label>
                                    <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->country}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    @if($d->main_cat == "Food")
                                        <label for="exampleInputEmail1">Spicyness</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->spicyness}}" readonly>
                                    @else
                                        <label for="exampleInputEmail1">Sweetness</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->sweetness}}" readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ease of Making</label>
                                    <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" value="{{$d->ease_of_making}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ingredient</label>
                                    <textarea class="form-control" id="exampleInputEmail1" name="ing" cols="30" rows="5" style="border-radius:5px" readonly>{{$d->ingredient}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Recipe</label>
                                    <textarea class="form-control" id="exampleInputEmail1" name="rec" cols="30" rows="5" style="border-radius:5px" readonly>{{$d->recipe}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image for Cover</label>
                                    <br>
                                    <img src="{{$d->cover}}" width='100%' id='img' style="margin-top:20px;">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image for Gallery (Maximum 2 files)</label>
                                    {{-- <input class="form-control" type="file" id="img2" name="img2[]" style="border-radius:5px" required multiple onchange="checkFiles(this.files, event, 'pre1','pre2')" accept="image/*"> --}}
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-lg-6">
                                            <img src="{{$d->gallery1}}" width='100%' id='pre1'>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{$d->gallery2}}" width='100%' id='pre2'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($d->status == "rejected")
                            <br>
                            <div class="row">
                                <div class="col-lg-12  align-self-center">
                                    <a href="/myaccount/editpost?postID={{$d->id}}"><button type="submit" class="btn btn-danger" name="submit" style="width:150px;">EDIT REVIEW</button></a>
                                </div>
                            </div>
                        @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
<br><br>
@endsection