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
                        <div class="row txt-center">
                            <h1 class="title txt">Waiting for your payment</h1><br>
                            <p style="color: green">
                                Transfer the fund to OVO 085351748536 - Adrian Putra or BRI - 008501018457534
                            </p>
                            <large style="color: red">
                                Please finish your payment at once, or else your order will not be placed.
                            </large>
                        </div>

                        <br>
                        <div class="txt d-flex justify-content-center">
                            <div class="spinner-border" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                          </div>

                            <form action="/uploadproof/{{$payments->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                @error('file')

                                <div class="alert alert-warning mb-3 mt-1 w-2/3">File must be image and max 10mb!</div>
                                @enderror
                                <label for="payment_proof" class="block sm:mb-2 mb-1 w-full  mt-2">Already Paid? Upload your proof here.</label>
                                <input type="file" name="payment_proof" id="payment_proof" required>

                                <br><br>
                                <label for="account_name" class="block sm:mb-2 mb-1 w-full  mt-2">Account Name</label>
                                <input type="text" maxlength="150" name="account_name" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="John Doe">

                                <label for="date" class="block sm:mb-2 mb-1 w-full  mt-2">Date</label>
                                <input type="date" name="date" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Jl. Raya Kb. Jeruk No.27">

                                <label for="payment_amount" class="block sm:mb-2 mb-1 w-full  mt-2">Payment Amount</label>
                                <input type="text" maxlength="150" name="payment_amount" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="2.000.000">

                                <div class="button-right-bottom">
                                    <button class="button-style" type="submit">Confirm</button>
                               </div>

                               </div>
                            </form>
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
