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
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    </head>

    <body>
        <div>
            @foreach ($products as $product)
            <div class="card-detail">
                <br>
                <div class="tempat-back pb-3">
                    <a href="/groupbuy">
                        <i class="fas fa-arrow-left pl-3"></i>
                        Back</a>
                </div>
                @if ($product->isfinish==0)
                    <p class="interest-detail-ic pt-1 ic-box txt-center">Group Buy is live!</p>
                    <div class="row no-gutters">
                        <div class="col-md-4 marginleft">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($productfile as $row)
                                        @if ($row->productid == $product->id && $row->deleted==0)
                                            <div class="swiper-slide"><img src="../{{ $row->filepath }}" alt=""> </div>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="col-md-5 marginleft">
                            <div class="card-body">
                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-title">{{$product->product_name}}</p>
                                <p class="interest-detail-title2">Rp. {{number_format($product->productprice)}}</p>
                            </div>
                            <p class="card-text">{{$product->shortdesc}}</p><br>
                            <p class="card-text">Stocks: {{$product->productstock}}</p>
                            <p class="card-text">Shipment Date: {{$product->shippingdate->format('d-m-Y')}}</p>
                            Variant :
                            <form method="POST" action="{{url('order')}}/{{$product->id}}">
                                @csrf
                            <select name="producttype"
                                class="appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10">
                                <?php  $splitdata=explode(";",$product['productlist']);
                                 foreach($splitdata as $data){ ?>
                                <option value="{{ $data }}">{{ $data }}</option>
                                <?php  } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <input class="form-control box-size" type="number" id="qty" name="qty" placeholder="Input Qty" required="" min="1" max="{{$product->productstock}}">
                        </div>
                        @if($product->productstock<=0)
                          <button type="button" disabled class="button-style buy-bottom-right">Out of stock</button>
                          @endif
                        @if($product->isfinish==1)

                        <button type="button" disabled class="button-style buy-bottom-right h-auto">In-Production</button>
                        @endif
                        @if($product->productstock>0 && $product->isfinish==0)
                          <button type="submit" class="button-style buy-bottom-right">Buy</button>
                          @endif
                      </div>
                    </form>
                @elseif($product->isfinish==2)
                <p class="interest-detail-ic pt-1 ic-box2 txt-center">In-Production!</p>
                <div class="row no-gutters">
                        <div class="col-md-4 marginleft">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($productfile as $row)
                                        @if ($row->productid == $product->id && $row->deleted==0)
                                            <div class="swiper-slide"><img src="../{{ $row->filepath }}" alt=""> </div>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="col-md-5 marginleft">
                            <div class="card-body">
                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-title">{{$product->product_name}}</p>
                                <p class="interest-detail-title2">Rp. {{number_format($product->productprice)}}</p>
                            </div>
                            <p class="card-text">{{$product->shortdesc}}</p><br>
                            <p class="card-text">Shipment Date: {{$product->shippingdate->format('d-m-Y')}}</p>
                        </div>
                @endif



            </div>

            @endforeach
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
    <script>
        var swiper = new Swiper(".mySwiper", {
          loop: true,
          pagination: {
              el: ".swiper-pagination",
          },
      });
</script>
    </html>
@endsection

