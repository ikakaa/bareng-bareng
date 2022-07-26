@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    {{-- <script src="js/jquery.timeago.js"></script>
        <script src="http://timeago.yarp.com/jquery.timeago.js" type="text/javascript"></script> --}}

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
                <div class="card-detail"> <br>
                    <div class="tempat-back pb-3">
                        <a href="/interestcheck">
                            <i class="fas fa-arrow-left pl-3"></i>
                            Back </a>
                    </div>
                    <p class="interest-detail-ic pt-1 ic-box txt-center">Interest Check</p>
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

                        <div class="interest-check-detail-kanan">
                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-title">{{ $product->product_name }}</p>
                                <p class="interest-detail-title2">Rp. {{ number_format($product->productprice) }}</p>

                            </div>
                            <p class="interest-detail-description pt-7">{{ $product->shortdesc }}</p><br>
                            Variant :
                            <select name="producttype"
                                class="appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-1 custwidth  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10">
                                <?php  $splitdata=explode(";",$product['productlist']);
                                 foreach($splitdata as $data){ ?>
                                <option value="{{ $data }}">{{ $data }}</option>
                                <?php  } ?>

                            </select>
                            <p class="interest-detail-ic pt-2">Ends at: {{ $product->enddate->format('d-m-Y') }} at
                                {{ $product->endtime }}</p>

                            <p class="interest-detail-ic pt-2"><i class="fa fa-clock" style="font-size: 15px"></i>
                                Countdown:

                            <div id="countdown">
                                <ul>
                                    <small><span id="days"></span></small>
                                    <small><span id="hours"></span></small>
                                    <small><span id="minutes"></span></small>
                                    <small><span id="seconds"></span></small>
                                </ul>
                            </div>
                            </p>
                            <p class="interest-detail-ic pt-2">Artist : <a href="#"
                                    class="text-blue-200">{{ $product->owner }}</a> </p>
                            <p class="interest-detail-ic pt-2">Discord : <a href="{{ $product->discordlink }}" target="_blank"
                                    class="text-blue-200">{{ $product->discordlink }}</a> </p>

                            <div class="interest-check-title-wrapper flex justify-between">
                                <p class="interest-detail-ic pt-4">Estimated shipment date:
                                    {{ $product->shippingdate->format('d-m-Y') }}</p>
                                {{-- <p class="interest-detail-ic pt-4"> --}}
                                <div class="items-center align-middle flex">
                                    @if ($checklike == 0)
                                        <div class="tempat-text-heart">
                                            <p class="pr-3" style="opacity: .7;">{{ $totallike }} / 5.0</p>
                                        </div>
                                        <a href="/dislikeproduct/{{ $product->id }}"> <i
                                                class="fas fa-heart custiconsize"></i></p></a>
                                </div>
            @endif
            @if ($checklike == 1)
                <div class="tempat-text-heart">
                    <p style="opacity: .7;">{{ $totallike }}  / 5.0</p>
                </div>
                {{-- <a href="/likeproduct/{{ $product->id }}"> --}}
                <button type="button" class="heart" data-toggle="modal" data-target="#exampleModal"></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">


                    <div class="modal-dialog" role="document">
                        <form action="/likeproduct" method="POST" enctype='multipart/form-data'>
                            @csrf
                        <div class="modal-content">




                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Interest Check</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <input type="hidden" value="ABC" name="test">
                                    <div class="modal-body">

                                        <div class="form-group ">

                                            <label for="recipient-name"
                                                class="col-form-label flex justify-center flex-nowrap">How interested are
                                                you
                                                for this product please rate 1-5 </label>

                                        </div>


                                    </div>
                                    <div class="flex justify-center mb-5">

                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label
                                                class="full" for="star5"
                                                title="Awesome - 5 stars"></label>

                                            <input type="radio" id="star4" name="rating" value="4" /><label
                                                class="full" for="star4"
                                                title="Pretty good - 4 stars"></label>

                                            <input type="radio" id="star3" name="rating" value="3" checked /><label
                                                class="full" for="star3" title="Meh - 3 stars"></label>

                                            <input type="radio" id="star2" name="rating" value="2" /><label
                                                class="full" for="star2"
                                                title="Kinda bad - 2 stars"></label>

                                            <input type="radio" id="star1" name="rating" value="1" /><label
                                                class="full" for="star1"
                                                title="Sucks big time - 1 star"></label>

                                        </fieldset>

                                    </div>
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>

                            </form>

                    </div>

                </div>
        </div>
        </div>
        {{-- </a> --}}
        </div>
        @endif

        </div>

        </div>

        <div class="tempat-comment w-full">
            <form action="/do_addcomment/{{ $product->id }}" method="POST">
                @csrf
                <br>
                <p class="interest-detail-ic pt-4 pb-2">Add Comment</p>
                <textarea name="comment"
                    class="shadow appearance-none border border-red rounded  py-2 sm:py-3 px-3 text-grey-darker mb-2 w-2/5  block focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                    cols="30" rows="10"></textarea>
                <div class="w-2/5 flex justify-between">
                    <p></p>
                    <button type="submit"
                        class="button-register-primary2 block mt-3  px-2 bg-primary py-1 mb-5">Submit</button>
            </form>
        </div>

        <div>
            <div class="col-md-6">
                <p class="interest-detail-ic pt-4 pb-2">Comments</p>
                @foreach ($comments as $comment)
                    @if ($product->id == $comment->product_id)
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center">
                                    <span><small class="font-weight-bold txt">
                                            {{ $comment->commentname }}</small>
                                        <br><small class="font-weight-bold">{{ $comment->comment }}</small></span>
                                </div> <small id="demo">{{ $comment->created_at }} </small>
                            </div>
                        </div><br>
                    @endif
                @endforeach
            </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            modal.find('.modal-body input').val(recipient)
        })
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
            },
        });

        CountDownTimer('{{ $product->enddate }}', 'countdown');

        function CountDownTimer(dt, id) {
            var end = new Date('{{ $product->enddate }}');
            var second = 1000;
            var minute = second * 60;
            var hour = minute * 60;
            var day = hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);
                    return;
                }
                var days = Math.floor(distance / day);
                var hours = Math.floor((distance % day) / hour);
                var minutes = Math.floor((distance % hour) / minute);
                var seconds = Math.floor((distance % minute) / second);

                document.getElementById(id).innerHTML = days + ' : ';
                document.getElementById(id).innerHTML += hours + ' : ';
                document.getElementById(id).innerHTML += minutes + ' : ';
                document.getElementById(id).innerHTML += seconds + '';
            }
            timer = setInterval(showRemaining, 1000);
        }


        //make function that convert time difference with timeago
    </script>

    </html>




    </html>
@endsection
