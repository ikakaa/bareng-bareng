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

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="../style.css">
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
                                    <br>
                                    Shipment service = {{$orderdetails[0]->orders->shipmentname}}
                                    <br>
                                    Shipment number = {{$orderdetails[0]->orders->shipmentnumber}}
                                    <br>
                                @endif
                                @if ($orderdetails[0]->orders->status == 5)
                                    Transaction Complete
                                @endif
                                @if ($orderdetails[0]->orders->status == 6)
                                    Refund Requested
                                @endif
                                @if ($orderdetails[0]->orders->status == 7)
                                    Refund Rejected
                                    <br>
                                    Reason : {{$orderdetails[0]->orders->rejetStatus}}
                                @endif

                            </span>
                        </div>
                    </div>
                    <br>
                    {{-- make container with 2 button --}}
                    <div class="d-flex flex-row justify-content-center">

                        {{-- make text with css --}}
                        @if ($orderdetails[0]->orders->status !=0 && $orderdetails[0]->orders->status !=2 && $orderdetails[0]->orders->status !=3 )
                        <a href="../transactiondone/{{ $orderdetails[0]->id }}"
                            onClick="return confirm('Are you sure you already receive the product?')"
                            class="btn btn-info text-white self-center mr-2">Confirm</a>
                            @endif
                            @if ($orderdetails[0]->orders->status == 4)


                        <button type="button" class="btn btn-warning text-center  self-center" style="color: #212529"
                            data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap">Refund</button>
                            @endif
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Request Form</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="../refundsend">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$orderdetails[0]->id}}">
                                            <input type="hidden" name="orderid" value="{{$orderdetails[0]->order_id}}">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Title:</label>
                                                <input type="text" maxlength="150" name="title" class="form-control" id="recipient-name" placeholder="Refund Request">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Payment Type:</label>
                                                <select name="paymenttype" class="form-control" id="recipient-name" >
                                                <option value="bca">Bca</option>
                                                <option value="bri">Bri</option>
                                                <option value="mandiri">Mandiri</option>
                                                <option value="ovo">Ovo</option>
                                                <option value="dana">Dana</option>
                                                <option value="gopay">Gopay</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Payment Number:</label>
                                                <input type="text" maxlength="150" name="paymentnumber" class="form-control" id="recipient-name" placeholder="08xxxxxxxxx">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Message/Reason:</label>
                                                <textarea class="form-control" name="message" id="message-text" ></textarea>
                                            </div>


                                    </div>
                                    <script>

                                        $('#exampleModal').on('show.bs.modal', function(event) {
                                            var button = $(event.relatedTarget) // Button that triggered the modal
                                            var recipient = button.data('whatever') // Extract info from data-* attributes
                                            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                                            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                                            var modal = $(this)
                                            modal.find('.modal-title').text('New message to ' + recipient)
                                            modal.find('.modal-body input').val(recipient)
                                        })
                                    </script>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send message</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>


                <br>


            </div>
        </div>
        <script></script>

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
