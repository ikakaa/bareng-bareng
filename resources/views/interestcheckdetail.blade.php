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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <body>
        <div class="w-full px-24 flex justify-between flex-nowrap">
            <div class="interest-check-detail-kiri">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="src/item1.png" alt=""> </div>
                        <div class="swiper-slide"><img src="src/item1.png" alt=""> </div>
                        <div class="swiper-slide"><img src="src/item1.png" alt=""> </div>
                        <div class="swiper-slide"><img src="src/item1.png" alt=""> </div>


                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="interest-check-detail-kanan">
                <div class="interest-check-title-wrapper flex justify-between">
<p class="interest-detail-title">GMK Frost Witch</p>
<p class="interest-detail-title2">Rp. 30.000,00-</p>

</div>
<p class="interest-detail-description pt-7">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit totam exercitationem alias illum a adipisci magnam officia dolorum itaque aut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, consequatur.</p>
<p class="interest-detail-ic pt-3">Interest Check</p>
<p class="interest-detail-ic pt-2">Ends in: 10 days</p>
<p class="interest-detail-ic pt-2">Countdown: 12:39:35</p>
<p class="interest-detail-ic pt-2">Artist : <a href="#" class="text-blue-200"> Udin</a> </p>
<div class="interest-check-title-wrapper flex justify-between">

    <p class="interest-detail-ic pt-4">Shipment/Fullfilment date</p>
    <p class="interest-detail-ic pt-4"> <i class="fas fa-heart custiconsize"></i></p>

    </div>
            </div>



        </div>
        <div class="tempat-comment w-full px-24 pt-12 ">
            <form action="/do_addcomment" method="POST">
                @csrf
            <p class="interest-detail-ic pt-4 text-white pb-2">Add Comment</p>
<textarea name="comment" class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-2/5  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" cols="30" rows="10"></textarea>
<input type="hidden" name="commentby" value="ADRIAN">
<div class="w-2/5 flex justify-between">
<p></p>
<button type="submit" class="button-register-primary2 block mt-3  px-2 bg-primary py-1 mb-5">Submit</button>
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
