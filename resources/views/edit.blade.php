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
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>

    <body>
        <div>
            @foreach ($products as $product)
                <div class="card-detail">
                    <br>
                    <div class="tempat-back pb-2">
                        <a href="/myproductlist">
                            <i class="fas fa-arrow-left pl-3"></i>
                            Back</a>
                    </div>
                    <p class="interest-detail-ic pt-1 ic-box txt-center">Your product detail</p>
                    <div class="row no-gutters">
                        <div class="col-md-4 marginleft">
                            <br>
                            @foreach ($productfiles as $productfile)
                                @if ($productfile->productid == $product->id && $productfile->deleted == 0)
                                    <img src="../{{ $productfile->filepath }}" class="card-img" alt="..."
                                        style="height:350px;">
                                @break
                            @endif
                        @endforeach
                        <br>
                    </div>
                    <div class="col-md-5 marginleft">
                        <div class="card-body">
                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-title">{{ $product->product_name }}</p>
                                <p class="interest-detail-title2">Rp. {{ number_format($product->productprice) }}</p>
                            </div>
                            <p class="card-text">{{ $product->shortdesc }}</p><br>
                            <p class="card-text">Stocks: {{ $product->productstock }}</p>
                            <p class="card-text">Shipment Date: {{ $product->shippingdate }}</p>
                        </div>
                    </div>

                    @if ($product->interestdone == 0)
                        <button type="submit" class="button-style buy-bottom-right"
                            onclick="location.href='{{ url('/editdetail') }}/{{ $product->id }}'">Edit</button>
                    @endif
                    @if ($product->interestdone == 1)
                        <button type="button" disabled class="button-style buy-bottom-right">Can't edit</button>
                    @endif
                    @if ($product->interestdone == 1 && $product->icfail != 1)
                        <a href="../endgroupbuy/{{ $product->id }}" class="button-style h-auto buy-bottom-right"
                            onclick="return confirm('Are you sure you want to end this product group buy?')">End Group
                            Buy</a>
                    @endif
                </div>
        @endforeach
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

</html>
@endsection
