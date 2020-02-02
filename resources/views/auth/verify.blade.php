@extends('detailMaster')

@section('title', 'My Account')

@section('content')
<div class="container" style="margin-top:220px; margin-bottom:160px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>

                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
