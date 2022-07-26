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

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center ">
            <div class="card card-size h-auto pb-12">


                <div class="d-flex flex-column justify-content-center align-items-center">

                    @error('file')

                    <div class="alert alert-warning mb-3 mt-1 w-2/3">File must be image and max 10mb!</div>
                    @enderror
                @if (session()->has('successupload'))
                    <div class="alert alert-success mb-3 mt-1 w-2/3">Request success, please wait for admin to verify!</div>

                    <?php session()->forget('successupload'); ?>
                @endif
                    <img src="../src/FullLogo-removebg-preview (2).png" style="height: 80px; width: 80px" alt="">
                </div>

                @if (Auth::user()->id == '1')
                    <br>
                    <h1 class="txt-center"><i class="fa fa-user-cog" aria-hidden="true" style="font-size:15px"></i>
                        <span>Admin</span>
                    </h1><br>

                    <div class="box2 row align-items-center h-auto">
                        <a href="productverification">
                            <i class="fa fa-cubes" style="font-size:15px"></i>
                            <span class="pl-2">Products Verification</span>
                        </a><br>

                        <a href="paymentverification">
                            <i class="far fa-credit-card" style="font-size:15px"></i>
                            <span class="pl-2">Payments Verification</span>
                        </a><br>

                        <a href="sellerverification">
                            <i class="fas fa-user-check" style="font-size:15px"></i>
                            <span class="pl-2">Seller Verification</span>
                        </a><br>
                        <a href="refundverification">
                            <i class="fas fa-undo" style="font-size:15px"></i>
                            <span class="pl-2">Refund Verification</span>
                        </a><br>
                        <a href="withdrawalrequest">
                            <i class="fas fa-money-bill-alt" style="font-size:15px"></i>
                            <span class="pl-2">Withdrawal Request</span>
                        </a><br>
                    </div>
                @else
                    <div class="row space">

                        <div class="col-md-6 box">
                            <div class="font-weight-bold txt profile-txt">Account Details</div>
                            <div class="profile-txt">{{ Auth::user()->name }}</div>
                            <div class="profile-txt">{{ Auth::user()->email }}</div>
                            <div class="profile-txt">{{ Auth::user()->phonenum }}</div>
                            <small> <a href="/editprofile"><i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    Profile</a>
                            </small>

                        </div>
                        <div class="col-md-6 box">
                            <div class="font-weight-bold txt profile-txt">Address</div>
                            @if (Auth::user()->address == '0')
                                <a href="editprofile">Please add your address.</a>
                            @else
                                <h1>{{ Auth::user()->address }}</h1>
                            @endif
                        </div>
                    </div>

                    <br>
                    <div class="box2 row align-items-center h-auto">
                        <a href="ongoing">
                            <i class="fa fa-shopping-cart" style="font-size:15px"></i>
                            <span class="pl-2">On-going Transaction </span>
                        </a><br>

                        <a href="orderhistory">
                            <i class="fa fa-history" aria-hidden="true" style="font-size:15px"></i>
                            <span class="pl-2">Order History</span>
                        </a><br><br>

                        @if (Auth::user()->sellerapprovalsubmit == 0 && Auth::user()->sellerapproval == 0)
                            <a href="/sellerform">
                                <i class="fas fa-store" aria-hidden="true" style="font-size:15px"></i>
                                <span class="pl-2">Request to be seller</span>
                            </a>
                        @endif
                        @if (Auth::user()->sellerapproval == 2)
                            <a href="/resetsellerform">
                                <i class="fas fa-store" aria-hidden="true" style="font-size:15px"></i>
                                <span class="pl-2">Request again to be seller</span>
                            </a>
                            <p>Reject Reason : {{Auth::user()->sellerrejectreason}}</p>
                        @endif
                        @if (Auth::user()->sellerapprovalsubmit == 1 && Auth::user()->sellerapproval == 1)
                            <a href="profileseller">
                                <i class="fas fa-store" aria-hidden="true" style="font-size:15px"></i>
                                <span class="pl-2">Seller Page</span>
                            </a>
                        @endif
                        @if (Auth::user()->sellerapprovalsubmit == 1 && Auth::user()->sellerapproval == 0)
                            <p>
                                <i class="fas fa-store" aria-hidden="true" style="font-size:15px"></i>
                                <span class="pl-2">Seller Status : Waiting approval</span>
                            </p>
                        @endif
                        <br> <br>
                        <a href="/requestlist">
                            <i class="fas fa-info-circle" aria-hidden="true" style="font-size:15px"></i>
                            <span class="pl-2">Refund Request</span>
                        </a>
                @endif

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
