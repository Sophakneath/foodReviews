@extends('adminMaster')

@section('title', 'Article Detail')

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

    .hoverItem
    {
        transition: 0.3s;
        margin-top:50px;
        text-decoration: none;
    }

    .hoverItem:hover, .rev:hover
    {
        transition: 0.3s;
        margin-top:36px;
        text-decoration: none;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @foreach($data as $d)
                <div class="card cardview">
                    <div class="row">
                        <div class="col-lg-12" style="padding:80px">
                            <h3 class="type title" style="font-size:28px"> <b>ARTICLE DETAIL</b></h3>   
                            <br><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" readonly value="{{ $d->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="labelSp">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" style="border-radius:5px" value="{{ $d->status}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="labelSp">Created on</label>
                                        <input type="text" class="form-control" id="status" name="status" style="border-radius:5px" value="{{ date("M d, Y", strtotime($d->created_at))}}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Overview</label>
                                        <textarea type="text" class="form-control" id="overview" name="overview" cols="30" rows="3" style="border-radius:5px" readonly>{{ $d->overview}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Detail</label>
                                        {{-- @php echo $d->detail; @endphp --}}
                                        <div style="border:1px solid gainsboro; padding:20px; border-radius:5px;">{!!$d->detail!!}</div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Icon</label>
                                        @if($d->icon == 'none')
                                            <br>
                                        @endif
                                        <br>
                                        <img src="{{ $d->icon }}" width='50%' id='img' style="margin-top:20px;" alt="image to be shown">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image for Cover</label>
                                        @if($d->image == 'none')
                                            <br>
                                        @endif
                                        <img src="{{ $d->image }}" width='100%' id='img' style="margin-top:20px;" alt="image to be shown">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <br><br>
                            <div class="row">
                                <div class="col-lg-12 align-self-center" style="text-align:center">
                                    <a href="/editArticle?id={{$d->id}}"><button type="submit" class="btn btn-danger" name="submit">EDIT ARTICLE</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br><br>
@endsection