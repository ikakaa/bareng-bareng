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
    </head>

    <body>
       
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card card-size">
                <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button> 
                    <span class="name mt-3">{{ Auth::user()->name }}</span> 

                    <div class="action-button">
                        <button name="submit" type="submit" class="button-style" onclick="location.href='{{url('/profilebuyer')}}'">Buyer</button>
                        <button class="button-selected-style mb-3">Seller</button>
                    </div>
                </div>
                <div class="mb-4 p-2 d-flex justify-content-center">
                    <a href="/uploadproduct">
                        <i class="fa fa-plus-square" aria-hidden="true" style="font-size:20px"></i>
                        <span class="pl-2">Upload Products</span>
                    </a>
                    <br>
                </div>

                <div class="mb-4 p-2 d-flex justify-content-center">
                    <a href="#">
                        <i class="fa fa-bars" aria-hidden="true" style="font-size:20px"></i>
                        <span class="pl-2">My Product List</span>
                    </a>
                    <br>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="#">
                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size:20px"></i>
                        <span class="pl-2">Product Verification</span>
                    </a>
                </div>

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