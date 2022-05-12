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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="../tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>

    <body>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card card-size">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="title-upper-left">
                        <h1 class="title txt ">Transaction Detail</h1>
                    </div>
                    <br>
                    <div class="txt mt-16">
                        <div class="font-weight-bold">
                            <span>Product Status :
                                @if ($orderdetails[0]->orders->status == 0)
                                    Waiting for Payment
                                @endif
                                @if ($orderdetails[0]->orders->status == 1)
                                    Waiting for seller to finish and send product
                                @endif
                                @if ($orderdetails[0]->orders->status == 2)
                                    Payment proof rejected
                                @endif
                                @if ($orderdetails[0]->orders->status == 3)
                                    Waiting Admin Verificate your payment
                                @endif
                                @if ($orderdetails[0]->orders->status == 4)
                                    Waiting for product arrive to your address, please wait
                                @endif
                                @if ($orderdetails[0]->orders->status == 5)
                                    Transaction Complete
                                @endif

                            </span>
                        </div>
                    </div>
                    <br>
                    {{-- make container with 2 button --}}
                    <div class="d-flex flex-row justify-content-center">

                        {{-- make text with css --}}

                        <a href="../transactiondone/{{ $orderdetails[0]->id }}"
                            onClick="return confirm('Are you sure you already receive the product?')"
                            class="btn btn-info text-white self-center mr-2">Confirm</a>
                        <a href="#" class="btn btn-warning text-center  self-center" style="color: #212529">Refund</a>
                    </div>





                </div>


                <br>


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
