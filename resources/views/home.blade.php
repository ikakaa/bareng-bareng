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
        <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
        <link rel="stylesheet" href="tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>
    
<body>
    <div class="swiffy-slider slider-item-reveal slider-nav-page slider-nav-autoplay slider-nav-animation slider-nav-animation-appear slider-item-ratio slider-item-ratio-21x9" data-slider-nav-autoplay-interval="3000"  id="slider1">
        <ul class="slider-container">
            <li><img src="src/slider1.jpg" loading="lazy" alt="..."></li>
            <li><img src="src/slider2.jpg" loading="lazy" alt="..."></li>
            <li><img src="src/slider1.jpg" loading="lazy" alt="..."></li>
            <li><img src="src/slider2.jpg" loading="lazy" alt="..."></li>
        </ul>
    
        <button type="button" class="slider-nav" aria-label="Go left"></button>
        <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
    
        <div class="slider-indicators slider-indicators-square d-none d-md-flex">
            <button class="" aria-label="Go to slide"></button>
            <button aria-label="Go to slide" class="active"></button>
            <button aria-label="Go to slide"></button>
            <button aria-label="Go to slide"></button>
        </div>
    
        
    </div>

    <div class="footer mt-7">
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
