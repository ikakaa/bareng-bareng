
{{-- @foreach ($order as $row )
    {{ $row->id }}
@endforeach --}}
{{-- <?php exit; ?> --}}
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

        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button onclick="location.href='{{url('/profilebuyer')}}'" class="btn-back mx-3">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back
                        </button>
                        <div class="title-upper-left">
                            <h1 class="title txt ">Order History</h1>
                            <large>
                                Here's the list of your order history.
                            </large>
                        </div>

                        <div>
                            <div class="col-md-9">

                                @if (!empty($order))
                                    @foreach ($order as $order)

                                        @foreach ($order->order_details as $detail)
                                            <div class="card p-3">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="user d-flex flex-row align-items-center">
                                                        <img src="../{{ $detail->products->productdetailfiles->filepath }}"
                                                            class="img-detail-size">
                                                        <span>
                                                            <div class="font-weight-bold txt cart-txt">
                                                                {{ $detail->products->product_name }}</div>
                                                            <div class="cart-txt">Purchased at:
                                                                {{ $payments->date->format('d-m-Y') }}</div>

                                                        </span>
                                                    </div>
                                                    <div class="cart-txt">
                                                        Rp. {{ number_format($order->totalPrice) }}
                                                        <br>
                                                        <a href='/orderhistorydetail/{{ $order->id }}'
                                                            class="details">Details</a>
                                                    </div>

                                                </div>
                                            </div><br>
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>



                    </div>
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
