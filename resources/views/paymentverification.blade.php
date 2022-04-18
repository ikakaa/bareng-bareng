@extends('layouts.app')

@section('content')
@can('isAdmin')
    
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
            <div class=" mx-auto w-4/5 table-card">
                <div class=" table-card-body">
                    <h4 class="table-card-title mb-4">Payment Verification</h4>


                    <table id="table_id" class="display table-hover bg-white">
                        <thead>
                            <tr>
                                <th class="text-black">No.</th>
                                <th class="text-black">Order ID</th>
                                <th class="text-black">Payment Method</th>
                                <th class="text-black">Account Name</th>
                                <th class="text-black">Date</th>
                                <th class="text-black">Payment Amount</th>
                                <th class="text-black">Preview</th>
                                <th class="text-black">Approve</th>
                                <th class="text-black">Reject</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=0; ?>
                            @foreach ($payments as $payment) <?php $i++; ?>
                            @if ($payment->orders->status==3)
                            <tr>
                                    
                                    <td>{{$i}}</td>
                                    <td>{{$payment->order_id}}</td>
                                    @if ($payment->payment_method == 1)
                                        <td>Bank Transfer</td>
                                    @elseif ($payment->payment_method == 2)
                                        <td>E-Wallet</td>
                                    @else 
                                        <td>Credit Card</td>
                                    @endif
                                    <td>{{$payment->account_name}}</td>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->payment_amount}}</td>
                                    <td><a href="../img/{{$payment->payment_proof}}" target="_blank">Image</a></td>
                                    <td><a href="/paymentapprove/{{$payment->order_id}}" class="btn-icon bg-custom"><i class="fa fa-check"></i></a></td>
                                    <td><a href="/paymentreject/{{$payment->order_id}}" class="btn-icon bg-warning"><i class="fa fa-times"></i></a></td>
                                    
                                </tr>
                            @endif
                                    
                                
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
@endcan
@endsection
