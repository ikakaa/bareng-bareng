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
                        <div class="title txt title-upper-left">
                            <h1>Payment</h1>
                        </div>
                    
                        <div>
                            <div class="col-md-9">
                                    @foreach ($orderdetails as $orderdetail)
                                    <div class="card p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center"> 
                                                <img src="../{{$orderdetail->products->productdetailfiles->filepath}}" class="img-detail-size"> 
                                                <span>
                                                    <div class="font-weight-bold txt cart-txt">{{$orderdetail->products->product_name}}</div>
                                                    <div class="cart-txt">Quantity: {{$orderdetail->qty}}</div>
                                                    <div class="cart-txt">Shipment Date: {{$orderdetail->products->shippingdate}}</div>
                                                </span> 
                                            </div>
                                            <div class="cart-txt">Rp. {{number_format($orderdetail->totalPrice)}}</div>
                                        </div>
                                    </div><br> 
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <form action="/makeorder" method="POST" enctype="multipart/form-data">

                                @csrf
                                <label for="recipient_name" class="block sm:mb-2 mb-1 w-full  mt-2">Recipient Name</label>
                                <input type="text" name="recipient_name" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="John Doe">
                                
                                @if (Auth::user()->address == '0')
                                <label for="address" class="block sm:mb-2 mb-1 w-full  mt-2">Address</label>
                                <input type="text" name="address" disabled class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" placeholder="Jl. Kebun Jeruk">
                                <small><a href="editprofile">Please add your address here.</a></small>
                                @else
                                <label for="address" class="block sm:mb-2 mb-1 w-full  mt-2">Address</label>
                                <input type="text" name="address" required class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" value="{{Auth::user()->address}}">
                                @endif

                                <label for="payment_method" class="block sm:mb-2 mb-1 w-full  mt-2">Payment Method</label>
                                    <select name="payment_method" class="shadow  appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10">
                                        <option value="1">Bank Transfer</option>
                                        <option value="2">E-Wallet</option>
                                        <option value="3">Credit Card</option>
                                     </select>
                                
                               </div>
                                <div class="checkout-bottom-right font-weight-bold txt cart-txt">
                                <h1 style="margin-left: -5px">Rp. {{number_format($orders->totalPrice)}}</h1>
                                <button class="button-style" type="submit">Order</button>
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
