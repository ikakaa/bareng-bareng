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
                        <button onclick="location.href='{{ url('/profileseller') }}'" class="btn-back mx-3">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back
                        </button>
                        <div class="title-upper-left">
                            <h1 class="title txt">My Product List</h1>
                            <large>
                                Here's the list of your products. You can't edit product if it fail the interest check or
                                group buy has begun.
                            </large>
                        </div>

                        <div>
                            <div class="col-md-9">
                                @foreach ($products as $product)
                                    @if ($product->verified == 1)
                                        <div class="card p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center">
                                                    @foreach ($productfiles as $productfile)
                                                        @if ($productfile->productid == $product->id && $productfile->deleted == 0)
                                                            <img src="../{{ $productfile->filepath }}"
                                                                class="img-detail-size">
                                                        @break
                                                    @endif
                                                @endforeach
                                                <span>
                                                    <div class="font-weight-bold txt cart-txt">
                                                        {{ $product->product_name }}</div>
                                                    @if ($product->icfail != 1)
                                                        <div>Group Buy starts at: {{ $product->enddate }}</div>
                                                    @endif
                                                    @if ($product->icfail == 1)
                                                        <div>Product didn't pass the interest check.</div>
                                                    @endif
                                                </span>
                                            </div>
                                            <button class="btn-view"
                                                onclick="location.href='{{ url('/edit') }}/{{ $product->id }}'">View
                                                Product</button>
                                        </div>
                                    </div><br>
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
