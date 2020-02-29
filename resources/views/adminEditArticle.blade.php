@extends('adminMaster')

@section('title', 'Edit Article')

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
                            <h3 class="type title" style="font-size:28px"> <b>EDIT ARTICLE?</b></h3>   
                            <br><br>
                            <form method="POST" action="{{ url('/api/uploadEditArticle')}}" enctype="multipart/form-data">

                                <input type="hidden" value={{$d->id}} name="id">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" required value="{{$d->name}}">
                                        </div>
                                    </div>
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
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Overview</label>
                                            <textarea type="text" class="form-control" id="overview" name="overview" cols="30" rows="3" style="border-radius:5px" required>{{ $d->overview}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- @php echo $d->detail; @endphp --}}
                                            <label for="exampleInputEmail1">Detail</label>
                                            <textarea type="text" class="form-control" id="detail" name="detail" style="border-radius:5px" required>{{$d->detail}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Icon</label>
                                            <input class="form-control" type="file" id="icon" name="icon" accept="image/*" onchange="preview(event,'iconshow',0)">
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <img src="{{$d->icon}}" width='50%' id='iconshow' style="margin-top:20px;" alt="Image to be shown">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <img src="{{$d->image}}" width='100%' id='img' style="margin-top:20px;" alt="Image to be shown">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-lg-12 align-self-center" style="text-align:center">
                                    <button type="submit" class="btn btn-danger" name="submit">EDIT ARTICLE</button>
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var roxyFileman = 'fileman/index.html'; 
    CKEDITOR.replace( 'detail',{filebrowserBrowseUrl:roxyFileman,
                            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
                            removeDialogTabs: 'link:upload;image:upload'}); 
</script>
@endsection