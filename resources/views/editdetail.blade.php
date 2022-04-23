
@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800&display=swap">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
                integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
            <link rel="stylesheet" href="/style.css">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <link rel="stylesheet" href="/tailwind.css">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        </head>

    <body>
        <p class="card-title uppercase  text-white mx-4 py-3">Edit Product</p>

        <div class="tempat-form mx-4">
        <div class="form-card  shadow justify-start  flex-nowrap px-4 py-3 rounded w-2/3 " style="background:#F4F9E9">
            @error('file')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">File must be image and max 10mb!</div>
            @enderror
            @error('moq')

            <div class="alert alert-warning mb-3 mt-1 w-2/3">Max moq is 10!</div>
            @enderror
            @if (session()->has('successupload'))
            <div class="alert alert-success mb-3 mt-1 w-2/3">Product added. Please wait for the verification process!</div>
            <?php session()->forget('successupload') ?>     @endif
        <form action="/editdetail/{{$products->id}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('patch')

            <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">Product Name</label>
            <input type="text" name="productname" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->product_name}}">
            <input type="hidden" value="{{ Auth::user()->name }}" name="name">
            <label for="productprice" class="block sm:mb-2 mb-1 w-full  mt-2">Product Price (Inc. prox Indonesia Shipping Fee )</label>
            <input type="number" name="productprice" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->productprice}}">

            <label for="shortdesc" class="block sm:mb-2 mb-1 w-full  mt-2">Short Description</label>
            <input type="text" name="shortdesc" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->shortdesc}}">

            <label for="producttype" class="block sm:mb-2 mb-1 w-full  mt-2">Category</label>
            <select name="producttype" class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10">
               <option value="customkeyboard">Custom Keyboard</option>
               <option value="customdeskmat">Custom Deskmat</option>
               <option value="others">Others</option>
           </select>

           <label for="moq" class="block sm:mb-2 mb-1 w-full  mt-2">Minimum Order Quantity</label>
           <input type="number" name="moq" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->moq}}">

            <label for="maxorder" class="block sm:mb-2 mb-1 w-full  mt-2">Max Order (for stock)</label>
            <input type="number" name="maxorder" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->productstock}}">

            <br><h3 style="font-size: 22px">Interest Check</h3>

            <h3>You can only edit the shipping date</h3><br>
            <label for="shippingdate" class="block sm:mb-2 mb-1 w-full">Shipping Date</label>
            <input type="date" name="shippingdate" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth2  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->shippingdate}}">


            <label for="discord" class="block sm:mb-2 mb-1 w-full  mt-2">Link Discord (for updates or chat)</label>
            <input type="text" name="discord" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{$products->discordlink}}">

           {{-- <label for="uploadphoto" class="block sm:mb-2 mb-1 w-full  mt-2">Upload Photo</label>
           <input type="file" name="file" id="photo"> --}}


           <div class="button-right-bottom">
                <button class="button-style">Update</button>
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
