@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800&display=swap">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="tailwind.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<div class="main-container">
    <div class="register-card px-5 py-12 mt-10 mb-10">
        <div class="tempat-image-register mx-auto block ">
            <img src="src/TextLogo.png" alt="" class=" mx-auto block">
        </div>
        <div class="tempat-register-form mx-auto block ">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="text-center register-text pb-10 pt-3">Create Account</p>

                        @if (session()->has('errorusername'))
                        <div class="alert alert-warning  mx-auto mb-3 mt-1">Username already exist!</div>
                        <?php session()->forget('errorusername') ?>
                        @endif

                        @if (session()->has('erroremail'))
                        <div class="alert alert-warning  mx-auto mb-3 mt-1">Email already exist!</div>
                        <?php session()->forget('erroremail') ?>
                        @endif

                        @if (session()->has('successregister'))
                        <div class="alert alert-success  mx-auto mb-3 mt-1">Register Success!</div>
                        <?php session()->forget('successregister') ?>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="block sm:mb-2 mb-1 mx-auto w-full">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div>Name must be filled with minimum 5 characters.</div>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email" class="block sm:mb-2 mb-1 mx-auto w-full">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <div>Email must be filled with email format and unique.</div>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="phonenum" class="block sm:mb-2 mb-1 mx-auto w-full">{{ __('Phone Number') }}</label>
                                <input id="text" type="phonenum" class="form-control @error('phonenum') is-invalid @enderror shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" name="phonenum" value="{{ old('phonenum') }}" required autocomplete="phonenum" placeholder="Your Phone Number">
                                @error('phonenum')
                                    <span class="invalid-feedback" role="alert">
                                        <div>Phone number must be filled with minimum 12 characters.</div>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password" class="block sm:mb-2 mb-1 mx-auto w-full">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" name="password" required autocomplete="new-password" placeholder="Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <div>Password must be filled with alphanumeric and minimum 6 characters length.</div>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="block sm:mb-2 mb-1 mx-auto w-full">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <div>Must be filled and same with password.</div>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="button-style mx-auto mb-5">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="footer-1 py-5 pt-8 w-full bg-navbar">
        <div class="justify-center flex">
            <a href="#" class="text-black mr-6 register-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-black mr-6 register-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-black mr-6 register-icon"><i class="fab fa-whatsapp"></i></a>
            <a href="#" class="text-black mr-6 register-icon"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="footer-text-container flex justify-center py-8 sm:pl-3">
            <a href="#" class="footer-href ">Contact</a>
            <a href="#" class="footer-href ">FAQs</a>
            <a href="#" class="footer-href2 ">Order Tracking</a>
        </div>
        <div class="copyright-text pt-12">
            <p>Indonesia shipping available!</p>
        </div>
        <div class="copyright-text pt-16 py-8">
            — Powered by <a href="#" class="underline italic">BarengBareng</a>
        </div>
    </div>

</div>
@endsection
