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
    .cornerRadius{
        border-radius:20px;
    }
    
</style>

<div class="container" style="margin-bottom:60px;">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card cardview">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 align-self-center" style="text-align:center">
                            <img src="{{ asset('img/img-01.png') }}" alt="" class="icon">
                    </div>
                    <div class="col-md-6" style="padding:80px">
                    <h3 class="type title" style="font-size:28px"> <b>Welcome to THEFOOD!</b></h3>   
                                <br><br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input class="form-control cornerRadius" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control cornerRadius @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control cornerRadius @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control cornerRadius" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-3">
                                <button type="submit" class="btn btn-danger cornerRadius" style="width:200px;">
                                    {{ __('Register') }}
                                </button>
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
@endsection
