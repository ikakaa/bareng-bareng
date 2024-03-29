{{-- @dd($orderdetails->products) --}}
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
                        <button onclick="location.href='{{url('/profileseller')}}'" class="btn-back mx-3">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back
                        </button>
                        <div class="title-upper-left">
                            <h1 class="title txt ">On-going Seller Transaction</h1>
                            <large>
                                Here's the list of your on-going transaction.
                            </large>
                        </div>

                        <div>
                            <div class="col-md-9">


                                @foreach ($orderdetails as $detail)
                                    @if ($detail->products->owner == $sellername)

                                    @if($detail->orders->status == 1 || $detail->orders->status ==7  )
                                        <a href="/ongoingsellerdetail/{{ $detail->id }}">
                                            @endif
                                            {{-- @endif --}}
                                            <div class="card p-3 cursor-pointer">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="user d-flex flex-row align-items-center">
                                                        <img src="../{{ $detail->products->productdetailfiles->filepath }}"
                                                            class="img-detail-size">
                                                        <span>
                                                            <div class="font-weight-bold txt cart-txt">
                                                                {{ $detail->products->product_name }}</div>
                                                            <div class="cart-txt">Price: Rp.
                                                                {{ number_format($detail->totalPrice) }} </div>

                                                        </span>
                                                    </div>
                                                    <div>

                                                        @if ($detail->orders->status == 1)
                                                            <button class="btn-on-progress">Status: Payment received from
                                                                buyer, waiting for you to finish and send the
                                                                product</button>
                                                        @endif
                                                        @if ($detail->orders->status == 2)
                                                            <button class="btn-rejected">Status: Payment proof
                                                                rejected</button>
                                                        @endif
                                                        @if ($detail->orders->status == 3)
                                                            <button class="btn-on-progress">Status: Verification
                                                                Process</button>
                                                        @endif
                                                        @if ($detail->orders->status == 4)
                                                            <button class="btn-on-progress">Status: Waiting for product
                                                                arrive to buyer address, please wait</button>
                                                        @endif
                                                        @if ($detail->orders->status == 5)
                                                            <button class="btn-verified">Status: Transaction
                                                                Complete</button>
                                                        @endif
                                                        @if ($detail->orders->status == 6)
                                                            <button class="btn-on-progress">Status: Buyer requested a refund, please contact us if you still making the product</button>
                                                        @endif
                                                        @if ($detail->orders->status == 7)
                                                            <button class="btn-on-progress">Status: Buyer Refund Rejected. <br>
                                                                Reason : {{ $detail->orders->rejetStatus }} <br>  Please re-confirm the shipment detail</button>
                                                        @endif
                                                        @if ($detail->orders->status == 8)
                                                            <button class="btn-rejected">Status: Buyer Refund Approved
                                                            </button>
                                                        @endif


                                                    </div>

                                                </div>
                                            </div>

                                            @if($detail->orders->status == 1 || $detail->orders->status ==7 )

                                        </a>
                                        @endif
                                        <br>
                                    @endif
                                @endforeach
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
