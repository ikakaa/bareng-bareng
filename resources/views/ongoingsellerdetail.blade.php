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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>

    <body>
        <button onclick="location.href='{{url('/ongoingseller')}}'" class="btn-back mx-4">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Back
        </button>

        <p class="card-title uppercase  text-white mx-4 py-3">Seller Confirmation</p>

        <div class="tempat-form mx-4">
            <div class="form-card  shadow justify-start  flex-nowrap px-4 py-3 rounded w-2/3 " style="background:#F4F9E9">
                @error('file')
                    <div class="alert alert-warning mb-3 mt-1 w-2/3">File must be image and max 10mb!</div>
                @enderror
                @error('moq')
                    <div class="alert alert-warning mb-3 mt-1 w-2/3">Max moq is 10!</div>
                @enderror
                @if (session()->has('successupload'))
                    <div class="alert alert-success mb-3 mt-1 w-2/3">Product added. Please wait for the verification process!
                    </div>
                    <?php session()->forget('successupload'); ?>
                @endif
                {{-- add form header text --}}
                <div class="form-header ">
                    <p class="text-black font-bold">
                        <span class="font-bold">Please send the product to user with these detail</span>
                    </p>
                    <form action="/itemsent" method="POST" enctype="multipart/form-data">

                        @csrf
                        <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">Buyer Username</label>
                        <input type="text" maxlength="150" disabled name="productname" required
                            class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            value="{{ $ambilpayment[0]->account_name }}">
                        <label for="productname" class="block sm:mb-2 mb-1 w-full  mt-2">Recipient Name</label>
                        <input type="text" maxlength="150" disabled name="productname" required
                            class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            value="{{ $ambilpayment[0]->recipient_name }}">

                        <label for="productprice" class="block sm:mb-2 mb-1 w-full  mt-2">Buyer Address</label>
                        <input type="text" maxlength="150" disabled name="productprice" required
                            class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            value="{{ $ambilpayment[0]->address }}">
                            <br>
                            <br>
                            <span class="font-bold">Please insert shipment service name and shipment number</span>
                            <br>
                            <label for="productprice" class="block sm:mb-2 mb-1 w-full  mt-2">Shipment service name</label>
                            <input type="text" maxlength="150"  name="shipmentname" required
                                class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                placeholder="JNE">
                            <label for="productprice" class="block sm:mb-2 mb-1 w-full  mt-2">Shipment Number</label>
                            <input type="text" maxlength="150"  name="shipmentnumber" required
                                class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                placeholder="1350813587138">
                        <input type="hidden" name="orderdetailid" value="{{ $ambilorderdetail[0]->id }}">
                        {{-- <label for="shortdesc" class="block sm:mb-2 mb-1 w-full  mt-2">Short Description</label>
            <input type="text" maxlength="150" name="shortdesc" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="GMK-234 Up Close And Personal With Malaysia's Custom Keyboard Makers"> --}}

                        <div class="pt-3">
                            <button class="button-style"
                                onclick="return confirm('Are you sure you sent the product to buyer ?')">Done</button>
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
                           <a href="https://wa.me/+6285351748536" class="footer-href ">Contact</a>
                              <a href="../../../interestcheck" class="footer-href ">Interest Check</a>
                        <a href="../../../groupbuy" class="footer-href2 ">Group Buy</a>
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
        $(document).ready(function() {
            $("#productlist").select2({
                tags: true,
            })
        });
    </script>

    </html>
@endsection
