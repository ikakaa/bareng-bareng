{{-- @dd($refund->order->order_details->products->product_name); --}}
{{-- @dd($refund->order->order_details[0]->products->product_name); --}}
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

            <div class="card-detail pb-5">
                <br>
                <p class="interest-detail-ic pt-1 ic-box txt-center">Group Buy is live!</p>
                <div class="row no-gutters">
                    <div class="col-md-4 marginleft">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($productfile as $row)
                                    @if ($row->productid == $refund->order->order_details[0]->products->id)
                                        <div class="swiper-slide"><img src="../{{ $row->filepath }}" alt=""> </div>
                                    @endif
                                    @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-md-5 marginleft">
                        <div class="card-body">
                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-title">
                                    {{$refund->order->order_details[0]->products->product_name }}
                                </p>
                                <div class="">
                                    <p class="interest-detail-title2">Total Paid : Rp. {{ number_format($refund->order->totalPrice) }}</p>
                                    <p class="interest-detail-title2">Status : Refund requested</p></div>
                            </div>
                            {{-- <p class="card-text">{{ $product->shortdesc }}</p><br>
                            <p class="card-text">Stocks: {{ $product->productstock }}</p>
                            <p class="card-text">Shipment Date: {{ $product->shippingdate->format('d-m-Y') }}</p> --}}
                            Variant : {{ $refund->order->order_details[0]->variant}}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                        </div>
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
