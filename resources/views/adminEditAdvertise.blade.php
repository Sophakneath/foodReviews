@extends('adminMaster')

@section('title', 'Edit Advertisement')

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
                            <h3 class="type title" style="font-size:28px"> <b>EDIT ADVERTISEMENT?</b></h3>   
                            <br><br>
                            <form method="POST" action="{{ url('/api/uploadEditAdvertise')}}" enctype="multipart/form-data">

                                <input type="hidden" value={{$d->restaurantID}} name="id">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" required value="{{$d->name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contact</label>
                                            <input type="text" class="form-control" id="contact" name="contact" style="border-radius:5px" placeholder="+85512 299 299" required value="{{$d->contact}}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" style="border-radius:5px" placeholder="#F21, Street.K4B, Teuk Thla District, San Sok Commune, Phnom Penh, Cambodia" required value="{{$d->location}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link</label>
                                            <input type="text" class="form-control" id="link" name="link" style="border-radius:5px" placeholder="https://www.thefood.com/start/home" required value="{{$d->link}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Short Description</label>
                                            <textarea type="text" class="form-control" id="short-des" name="short-des" cols="30" rows="2" style="border-radius:5px" required>{{$d->short_des}}</textarea>
                                            {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Serve</label>
                                            <textarea type="text" class="form-control" id="serve" name="serve" cols="30" rows="2" style="border-radius:5px" required>{{$d->serve}}</textarea>
                                            {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" id="labelSp">Status</label>
                                            <select class="form-control" id="status" name="status" style="border-radius:5px">
                                                @if($d->status == "Active")
                                                    <option value="Active" selected>Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                @else
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive" selected>Inactive</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image for Cover</label>
                                            <input class="form-control" type="file" id="img1" name="img1" accept="image/*" onchange="preview(event,'img',0)">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 offset-md-3">
                                        <div class="form-group">
                                            <img src="{{$d->image}}" width='100%' id='img' style="margin-top:20px;" alt="Image to be shown">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-lg-12 align-self-center" style="text-align:center">
                                    <button type="submit" class="btn btn-danger" name="submit">EDIT ADVERTISEMENT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br><br>
<script>
    function preview(evt, id, index)
    {
        var img=document.getElementById(id);
        img.src=URL.createObjectURL(evt.target.files[index])
    }
</script>
@endsection