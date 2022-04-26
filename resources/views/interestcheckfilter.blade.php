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
        <link rel="stylesheet" href="../style.css">
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
                defer></script>
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
            crossorigin="anonymous">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="../tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>

    <body>
        <div  class="swiffy-slider slider-item-reveal slider-nav-page slider-nav-autoplay slider-nav-animation slider-nav-animation-appear slider-item-ratio slider-item-ratio-21x9"
        data-slider-nav-autoplay-interval="3000" id="slider1">
            <ul class="slider-container">
                <li><a href="/category"><img src="../src/slider1.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="../src/slider2.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="../src/slider3.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="../src/slider4.png" loading="lazy" alt="..."></a></li>
            </ul>

            <button type="button" class="slider-nav" aria-label="Go left"></button>
            <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>

            <div class="slider-indicators slider-indicators-square d-none d-md-flex">
                <button class="active" aria-label="Go to slide"></button>
                <button aria-label="Go to slide"></button>
                <button aria-label="Go to slide"></button>
                <button aria-label="Go to slide"></button>
            </div>
        </div>

        <div>
            <p class="card-title text-center text-white py-12">Featured Products</p>

            <div class="action-btn mb-10 d-flex justify-content-center">
                <a href="/interestcheck" class="button-style button-border mr-1">All</a>
                <a href="/interestcheck/customkeyboard" class="button-style button-border mr-1">Keyboard</a>
                <a href="/interestcheck/customdeskmat" class="button-style button-border mr-1">Deskmat</a>
                <a href="/interestcheck/others" class="button-style button-border">Others</a>
            </div>

                <div class="tempat-card flex justify-center pb-24 row row-cols-3 mb-3">
                    @foreach ($products as $product)
                    <div class="card-custom mr-4 col" onclick="location.href='{{url('/interestcheckdetail')}}/{{$product->id}}'">
                        <div class="ic-box-card txt-center"><i class="far fa-thumbs-up"></i> Interest Check</div>
                        <div class="card-img mt-3">
                            <img src="../../{{$product->productdetailfiles->filepath}}" alt="">
                        </div>
                        <div class="card-text w-full px-2 pb-3 txt-center">
                            <a class="card-header2 pt-1">{{$product->product_name}}</a>
                            <div class="flex justify-between w-full ">

                            </div>
                            <div class="mini-card-box ">

                                <p class="price-number block mb-2">Rp. {{number_format($product->productprice)}}</p>
                                <button class="button-style font-semibold rounded-md">Details</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-center">
                    {{$products->links()}}
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
