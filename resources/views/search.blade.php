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

        <div>
            <div class="title search-title">
                <h1>Search Results</h1>
            </div>

                <div class="tempat-card flex justify-center pb-24 row row-cols-3 mb-3">
                    @foreach ($products as $product)
                    <div class="card-custom mr-4 col" onclick="location.href='{{url('/product')}}/{{$product->id}}'">
                        <div class="ic-box-card txt-center"><i class="fas fa-door-open"></i> Group Buy Starts</div>
                        <div class="card-img mt-3">
                            <img src="../{{$product->productdetailfiles->filepath}}" alt="">
                        </div>
                        <div class="card-text w-full px-2 pb-3 txt-center">
                            <a class="card-header2 pt-1" href="/product/{{$product->id}}">{{$product->product_name}}</a>
                            <div class="flex justify-between w-full ">

                            </div>
                            <div class="mini-card-box ">

                                <p class="price-number block">Rp. {{number_format($product->productprice)}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>

        <div class="footer mt-10">
            <div class="footer-1 py-5 pt-8 w-full bg-navbar">
                <div class="justify-center flex">
                       <a target="_blank" href="https://twitter.com/adrianp55368958" class="text-black mr-6 register-icon"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" href="https://www.facebook.com/adrian.putra.14224/" class="text-black mr-6 register-icon"><i class="fab fa-facebook"></i></a>
                    <a target="_blank" href="https://wa.me/+6285351748536" class="text-black mr-6 register-icon"><i class="fab fa-whatsapp"></i></a>
                    <a target="_blank" href="https://www.instagram.com/adrian_sevenn/" class="text-black mr-6 register-icon"><i class="fab fa-instagram"></i></a>

                </div>
                <div class="footer-text-container flex justify-center py-8 sm:pl-3">
                             <a target="_blank" href="https://wa.me/+6285351748536" class="footer-href ">Contact</a>
                    <a target="_blank" href="../../../interestcheck" class="footer-href ">Interest Check</a>
                    <a target="_blank" href="../../../groupbuy" class="footer-href2 ">Group Buy</a>
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
