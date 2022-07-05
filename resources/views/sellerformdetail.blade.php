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
        <button onclick="location.href='{{url('/sellerverification')}}'" class="btn-back mx-4">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Back
        </button>
        <p class="card-title uppercase  text-white mx-4 py-3">Request Seller Form</p>

        <div class="tempat-form mx-4">
            <div class="form-card  shadow justify-start  flex-nowrap px-4 py-3 rounded w-2/3 " style="background:#F4F9E9">



                <form action="/do_uploadrequestseller" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" value="{{ Auth::user()->name }}" name="name">

                    <label for="shortdesc" class="block sm:mb-2 mb-1 w-full  mt-2">Address</label>
                    <input type="text" maxlength="150" name="address" required
                        class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                        placeholder="Sibolga, jalan u no 4a" disabled value="{{$detail->address}}">

                        <label for="shortdesc" class="block sm:mb-2 mb-1 w-full  mt-2">Identity type</label>
                        <input type="text" maxlength="150" name="address" required
                            class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            placeholder="Sibolga, jalan u no 4a" value="{{$detail->identitytype}}" disabled>

                    <label for="identitynumber" class="block sm:mb-2 mb-1 w-full  mt-2">Identity Number [KTP / SIM / Paspor]
                        [Won't
                        be shared]</label>
                    <input type="text" maxlength="150" name="identitynumber" required
                        class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                        placeholder="12363486748748" value="{{$detail->identitynumber}}" disabled>


                        <label for="identitynumber" class="block sm:mb-2 mb-1 w-full  mt-2">Payment Type</label>
                        <input type="text" maxlength="150" name="identitynumber" required
                            class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            placeholder="12363486748748" value="{{$detail->paymenttype}}" disabled>

                    <label for="address" class="block sm:mb-2 mb-1 w-full  mt-2">Payment Number</label>
                    <input type="text" maxlength="150" name="paymentnumber" required
                        class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                        placeholder="085351784357" value="{{$detail->paymentnumber}}" disabled>

                    <label for="uploadphoto" class="block sm:mb-2 mb-1 w-full  mt-2">Seller selfie with identity
                        card</label>
                    <img src="../{{$detail->identitypath}}" alt="" width="450x" height="500px">

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

    </html>
@endsection
