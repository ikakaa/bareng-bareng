
@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800&display=swap">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body>
        <p class="card-title uppercase  text-white mx-4 py-3">Edit Profile</p>

        <div class="tempat-form mx-4">
        <div class="form-card  shadow justify-start  flex-nowrap px-4 py-3 rounded w-2/3 " style="background:#F4F9E9">
            @error('file')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">File must be image and max 10mb!</div>
            @enderror
            @error('name')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">Username : Input at least 5 characters or username is used!</div>
            @enderror
            @error('phonenum')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">Phone Number : Input at least 12 number!</div>
            @enderror
            @error('email')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">Email : Must be email format or email is used!</div>
            @enderror
            @if (session()->has('successedit'))
            <div class="alert alert-success mb-3 mt-1 w-2/3">Profile edit success!</div>
            <?php session()->forget('successedit') ?>     @endif
        <form action="/do_editprofile" method="POST" enctype="multipart/form-data">

            @csrf
            <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">User Image</label>
          <img src="{{$ambildata->profilepicture}}" alt="" width="300px" name="userpicture" height="300px">
            <input type="hidden" value="{{ Auth::user()->name }}" name="name">
            <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">Username </label>
            <input type="text" name="name"  required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="10000" value="{{$ambildata->name}}">
<input type="hidden" value="{{$ambildata->id}}" name="id">
            <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">Email </label>
            <input type="text" name="email"  required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="10000" value="{{$ambildata->email}}">

            <label for="shortdesc" class="block sm:mb-2 mb-1 w-full  mt-2">Phone Number</label>
            <input type="number" name="phonenum" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="GMK-234 Up Close And Personal With Malaysia's Custom Keyboard Makers" value="{{$ambildata->phonenum}}">



           <label for="uploadphoto" class="block sm:mb-2 mb-1 w-full  mt-2">Upload Photo</label>
           <input type="file" name="file" id="photo">


           <div class="button-right-bottom">
                <button class="button-style">Upload</button>
           </div>

        </form>
    </div>
    </div>
        <div class="footer mt-10">
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
    </body>

    </html>
@endsection
