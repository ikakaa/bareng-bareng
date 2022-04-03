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
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        </head>

    <body>
        <div>
            @foreach ($products as $product)
            <div class="card-detail pt-5">
                <div class="row no-gutters">
                    <div class="col-md-4 marginleft">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="../{{$product->productdetailfiles->filepath}}" alt=""> </div>
                                <div class="swiper-slide"><img src="../{{$product->productdetailfiles->filepath}}" alt=""> </div>
                                <div class="swiper-slide"><img src="../{{$product->productdetailfiles->filepath}}" alt=""> </div>
                                <div class="swiper-slide"><img src="../{{$product->productdetailfiles->filepath}}" alt=""> </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="interest-check-detail-kanan">
                        <div class="interest-check-title-wrapper flex justify-between">
                            <p class="interest-detail-title">{{$product->product_name}}</p>
                            <p class="interest-detail-title2">Rp. {{number_format($product->productprice)}}</p>
        
                        </div>
                        <p class="interest-detail-description pt-7">{{$product->shortdesc}}</p>
                        <p class="interest-detail-ic pt-3">Interest Check</p>
                        <p class="interest-detail-ic pt-2">Ends in: 10 days</p>
                        <p class="interest-detail-ic pt-2">Countdown: 12:39:35</p>
                        <p class="interest-detail-ic pt-2">Artist : <a href="#" class="text-blue-200">{{$product->owner}}</a> </p>

                        <div class="interest-check-title-wrapper flex justify-between">
                            <p class="interest-detail-ic pt-4">Shipment date: {{$product->shippingdate}}</p>
                            {{-- <p class="interest-detail-ic pt-4"> <i class="fas fa-heart custiconsize"></i></p> --}}
                            <div class="heart"></div>
                        </div>
                    </div>

                    <div class="tempat-comment w-full">
                        <form action="/do_addcomment" method="POST">
                            @csrf
                            <br>
                            <p class="interest-detail-ic pt-4 pb-2">Add Comment</p>
                            <textarea name="comment" class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-2/5  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" cols="30" rows="10"></textarea>
                            <div class="w-2/5 flex justify-between">
                                <p></p>
                                <button type="submit" class="button-register-primary2 block mt-3  px-2 bg-primary py-1 mb-5">Submit</button>
                        </form>
                    </div>

                    <div>
                        <div class="col-md-6">
                            <p class="interest-detail-ic pt-4 pb-2">Comments</p>
                            @foreach ($comments as $comment)
                            <div class="card p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> 
                                        <span><small class="font-weight-bold txt">{{$comment->commentname}}</small> <br><small class="font-weight-bold">{{$comment->comment}}</small></span> </div> <small>2 days ago</small>
                                    </div>
                                </div><br> 
                            @endforeach
                        </div>
                    </div>
            </div>
            @endforeach
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
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>

    </html>
@endsection
