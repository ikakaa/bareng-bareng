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
        <link rel="stylesheet" href="tailwind.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container min-h-screen pt-3">
            <div class=" mx-auto w-auto table-card">
                <div class=" table-card-body">
                    <h4 class="table-card-title mb-4">Refund Verification</h4>


                    <table id="table_id" class="display table-hover bg-white">
                        <thead>
                            <tr>
                                <th class="text-black">No.</th>
                                <th class="text-black">Username</th>
                                <th class="text-black">Total Paid</th>
                                <th class="text-black">Order Detail</th>
                                <th class="text-black">Title</th>
                                <th class="text-black">Reason/Message</th>
                                <th class="text-black">Payment Type</th>
                                <th class="text-black">Payment Number</th>
                                <th class="text-black">Requested at</th>
                                <th class="text-black">Approve</th>
                                <th class="text-black">Reject</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($refunds as $row)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> {{ $row->user->name }} </td>
                                    <td><a href="#"> {{ $row->order->totalPrice }} </a></td>
                                    <td><a href="refundetail/{{ $row->id }}"> Detail </a></td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->reason }}</td>
                                    <td>{{ $row->paymentType }}</td>
                                    <td>{{ $row->paymentNumber }}</td>

                                    <td>{{ $row->created_at }}</td>
                                    <td><a href="/refundapprove/{{ $row->id }}" class="btn-icon bg-custom"><i
                                                class="fa fa-check"></i></a></td>
                                    <td>
                                        <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reject Product
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/refundreject">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Reject
                                                                    Reason:</label>
                                                                <textarea class="form-control" id="message-text" name="reason"></textarea>
                                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>

                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-icon bg-warning" data-toggle="modal"
                                            data-target="#exampleModal{{ $row->id }}"><i
                                                class="fa fa-times"></i></button>


                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

    </html>
@endsection
