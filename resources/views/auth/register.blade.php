@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800&display=swap">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="tailwind.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
 
    <div class="main-container">
        <div class="register-card px-5 py-12  mt-10 mb-10">
            <div class="tempat-image-register mx-auto block ">
                <img src="src/TextLogo.png" alt="" class=" mx-auto block">
            </div>
            <div class="tempat-register-form mx-auto block ">
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

                    <label for="name" class="block sm:mb-2 mb-1 mx-auto w-full  ">Name</label>
                    <input type="text" name="name" required class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Your Name">
                    

                    <label for="email" class="block sm:mb-2 mb-1 mx-auto w-full  ">Email</label>
                    <input type="email" name="email" required class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Your Email">

                    <label for="phonenum" class="block sm:mb-2 mb-1 mx-auto w-full  ">Phone Number</label>
                    <input type="text" name="phonenum" required class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Your Phone Number">
                    
                    <label for="password" class="block sm:mb-2 mb-1 mx-auto w-full  ">Password</label>
                    <input type="password" name="password" required class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Your Password">

                    <label for="confirmPassword" class="block sm:mb-2 mb-1 mx-auto w-full  ">Confirm Password</label>
                    <input type="password" name="confirmPassword" required class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-full mx-auto block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Confirm Password">

                    <button class="button-register-primary block mt-3 mx-auto px-10 bg-primary py-1 mb-5 shadow" type="submit">Register</button>
                    <div class="text-wrapper-register w-full text-center"> <a href="/login" class="forgot-text  ">Have an account? Sign In</a>

                </div>
            </form>

        </div>
    </div>
    </div>


    <div class="footer">
        <div class="footer-1 py-5 pt-8 w-full ">
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
</body>
<script src="tailwind.config.js "></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
</script>

</html>

@endsection
