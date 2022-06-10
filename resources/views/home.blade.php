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
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
                defer></script>
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
            crossorigin="anonymous">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>

    <body>
        <div class="swiffy-slider slider-item-reveal slider-nav-page slider-nav-autoplay slider-nav-animation slider-nav-animation-appear slider-item-ratio slider-item-ratio-21x9"
            data-slider-nav-autoplay-interval="3000" id="slider1">
            <ul class="slider-container">
                <li><a href="/category"><img src="src/slider1.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="src/slider2.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="src/slider3.png" loading="lazy" alt="..."></a></li>
                <li><a href="#"><img src="src/slider4.png" loading="lazy" alt="..."></a></li>
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

        <div class="tempat-highlight flex flex-nowrap justify-center px-64 pt-20">

            <div class="highlight-kiri relative mr-4"> <a href="/productdetail">
                    <img src="src/img.jpg" alt="" class="absolute">
                    <div class="tempat-highlight-heading">
                        <h4 class="highlight-title">MONOKEI X FRIENDS EXTRAS</h4>
                        <h1 class="highlight-title-sub">Hidari</h1>
                    </div>
                    <div class="tempat-highlight-desc">
                        <p class="highlight-desc">Limited in stock units available at 10am, 14th of March 2022 (GMT+8)</p>
                    </div>
                </a>
            </div>
            <div class="highlight-kanan flex items-baseline flex-wrap ">
                <div class="highlight-kanan-item "> <a href="#">
                        <img src="src/img.jpg" alt="" class="absolute hightlight-img-kanan">
                        <div class="tempat-highlight-heading">
                            <h4 class="highlight-title">IN STOCK</h4>
                            <h1 class="highlight-title-sub">Kaban</h1>
                        </div>
                        <div class="tempat-highlight-desc">
                            <p class="highlight-desc">Limited in stock units available at 10am, 14th of March 2022 (GMT+8)
                            </p>
                        </div>
                    </a></div>
                <div class="highlight-kanan-item"> <a href="#">
                        <img src="src/img.jpg" alt="" class="absolute hightlight-img-kanan2">
                        <div class="tempat-highlight-heading">
                            <h4 class="highlight-title">UPDATES</h4>
                            <h1 class="highlight-title-sub">Hidari</h1>
                        </div>
                        <div class="tempat-highlight-desc">
                            <p class="highlight-desc">Limited in stock units available at 10am, 14th of March 2022 (GMT+8)
                            </p>
                        </div>
                    </a></div>
            </div>
        </div>
        <p class="card-title text-center  text-white pt-16 pb-6">Featured Products</p>
        <div class="tempat-card flex justify-center w-full pb-24">
            <div class="card-custom mr-4">
                <div class="card-img">
                    <img src="src/a.jpg" alt="">
                </div>
                <div class="card-text w-full px-2 pb-3 ">
                    <p class="card-header2 pt-1">GMK Frost Witch </p>
                    <p class="card-info pt-2 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, alias?
                    </p>
                    <div class="flex justify-between w-full ">
                        <div class="mini-card-box ">
                            <p class="price">Price</p>
                            <p class="price-number block">$29.99</p>
                        </div>
                        <div class="mini-card-button">

                            <button
                                class="py-2 px-3 bg-blue-500 text-white text-sm font-semibold rounded-md shadow-lg shadow-blue-500/50 focus:outline-none hover:bg-blue-600 transition ">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-custom mr-4">
                <div class="card-img">
                    <img src="src/a.jpg" alt="">
                </div>
                <div class="card-text w-full px-2 pb-3 ">
                    <p class="card-header2 pt-1">GMK Frost Witch </p>
                    <p class="card-info pt-2 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, alias?
                    </p>
                    <div class="flex justify-between w-full ">
                        <div class="mini-card-box ">
                            <p class="price">Price</p>
                            <p class="price-number block">$29.99</p>
                        </div>
                        <div class="mini-card-button">

                            <button
                                class="py-2 px-3 bg-blue-500 text-white text-sm font-semibold rounded-md shadow-lg shadow-blue-500/50 focus:outline-none hover:bg-blue-600 transition ">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-custom mr-4">
                <div class="card-img">
                    <img src="src/a.jpg" alt="">
                </div>
                <div class="card-text w-full px-2 pb-3 ">
                    <p class="card-header2 pt-1">GMK Frost Witch </p>
                    <p class="card-info pt-2 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, alias?
                    </p>
                    <div class="flex justify-between w-full ">
                        <div class="mini-card-box ">
                            <p class="price">Price</p>
                            <p class="price-number block">$29.99</p>
                        </div>
                        <div class="mini-card-button">

                            <button
                                class="py-2 px-3 bg-blue-500 text-white text-sm font-semibold rounded-md shadow-lg shadow-blue-500/50 focus:outline-none hover:bg-blue-600 transition ">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- @dd($productrecommendation) --}}

            @isset($productrecommendation)
            <p class="card-title text-center  text-white ">Recommended Products For You</p>
            <div class="tempat-card flex justify-center w-full pb-24">
                <?php $limitrecommendation = 0; ?>
                @foreach ($productrecommendation as $product)
                    <?php if ($limitrecommendation == 3) {
                        // break;
                    } ?>
                    @if ($product->product->interestdone == 0 && $product->product->isfinish == 0 && $product->product->verified == 1)
                        <div class="card-custom mr-4">
                            <div class="card-img">
                                @foreach ($productfiles as  $file)
                                    @if ($file->productid == $product->product->id && $file->deleted==0)
                                        <img src="{{$file->filepath}}" alt="">
                                        @break
                                    @endif

                                @endforeach
                            </div>
                            <div class="card-text w-full px-2 pb-3 ">
                                <p class="card-header2 pt-1">{{ $product->product->product_name }} </p>
                                <p class="card-info pt-2 ">{{ $product->product->shortdesc }}
                                </p>
                                <div class="flex justify-between w-full ">
                                    <div class="mini-card-box ">
                                        <p class="price">Price</p>
                                        <p class="price-number block">{{ $product->product->productprice }}</p>
                                    </div>
                                    <div class="mini-card-button">

                                        <a href="{{url('/interestcheckdetail')}}/{{$product->product->id}}" target="_blank"
                                            class="py-2 px-3 bg-blue-500 text-white text-sm font-semibold rounded-md shadow-lg shadow-blue-500/50 focus:outline-none hover:bg-blue-600 transition ">Add
                                            to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $limitrecommendation++; ?>
                    @endif
                @endforeach
            @endisset
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
