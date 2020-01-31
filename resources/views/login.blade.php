@extends('detailMaster')

@section('title', 'My Account')

@section('content')

<style>

    .cardview{
        border: none;
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;

    }

    .icon{
        width: 70%;
    
        
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card cardview">
                <div class="row">
                    <div class="col-lg-6 align-self-center" style="text-align:center">
                        <img src="{{ asset('img/img-01.png') }}" alt="" class="icon">
                    </div>
                    <div class="col-lg-6" style="padding:80px">
                        <h3 class="type title" style="font-size:28px"> <b>Welcome to THEFOOD!</b></h3>   
                        <br><br>

                        

                        <form method="post" action="{{ url('/api/signin/checkLogin')}}">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" style="border-radius:20px" placeholder="abc@gmail.com" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password" style="border-radius:20px" placeholder="*************" required>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12  align-self-center">
                                <button type="submit" class="btn btn-danger" name="login" style="border-radius:20px; width:150px;">SIGN IN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    <?php
                        if(isset($_POST['login']))
                        {
                            $email = $_POST['email'];
                            $pass = $_POST['password'];
                            $i = login($email, $pass);
                            if(!$i)
                            {
                                echo "<p class='text-danger'>Invalid username or password!</p>";
                            }
                            else{
                                
                                header('location: myaccount.blade.php');
                            }
                        }
                    ?>
<br><br>

@endsection