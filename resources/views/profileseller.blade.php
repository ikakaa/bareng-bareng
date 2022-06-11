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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>



        <link rel="stylesheet" href="tailwind.css">
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card card-size h-auto pb-12">

                <div class="d-flex flex-column justify-content-center align-items-center">
                    @if (session('status'))
                    <div class="alert alert-success mb-3 mt-1 w-2/3">Selected product group buy ended!</div>
                    @endif
                    <img src="../src/FullLogo-removebg-preview (2).png" style="height: 80px; width: 80px" alt="">
                </div>
                <div class="row space">
                    <div class="col-md-6 box">
                        <div class="font-weight-bold txt profile-txt">Account Details</div>
                        <div class=" profile-txt">{{ Auth::user()->name }}</div>
                        <div class=" profile-txt">{{ Auth::user()->email }}</div>
                        <div class=" profile-txt">{{ Auth::user()->phonenum }}</div>
                        <small> <a href="/editprofile"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a> </small>

                    </div>
                    <div class="col-md-6 box">
                        <div class="font-weight-bold txt profile-txt">Address</div>
                        @if (Auth::user()->address == '0')

                            <a href="editprofile">Please add your address.</a>
                        @else
                            <h1>{{Auth::user()->address}}</h1>
                        @endif

                        <div class="font-weight-bold txt profile-txt pt-3">My Funds: </div>
                        @if ($sellerfund->totalfund == 0)
                        <p>Rp. 0</p>
                        <small><a href="#" class="text-danger">Request Withdraw</a></small>
                        @else
                        <p>Rp. {{number_format($sellerfund->totalfund)}}</p>
                        <small><a href="#"  data-toggle="modal" data-target="#exampleModal" class="text-primary">Request Withdraw</a></small>
                        @endif

                        <div class="modal fade" id="exampleModal" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Request Withdraw</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1>Withdrawal process takes 2-7 days to finish. Are you sure you want to withdraw all your fund?</h1>
                                    </div>
                                    <form method="POST" action="/request">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Yes</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <br>
                <div class="box3">
                    <a href="/uploadproduct">
                        <i class="fa fa-plus-square" style="font-size:15px"></i>
                        <span class="pl-2">Upload Products</span>
                    </a><br>
                    <a href="/ongoingseller">
                        <i class="fa fa-shopping-cart" style="font-size:15px"></i>
                        <span class="pl-2">On-going Seller Transaction </span>
                    </a><br>
                    <a href="myproductlist">
                        <i class="fa fa-bars"aria-hidden="true" style="font-size:15px"></i>
                        <span class="pl-2">My Product List</span>
                    </a><br>

                    <a href="/productverificationlist">
                        <i class="fa fa-check-circle" aria-hidden="true" style="font-size:15px"></i>
                        <span class="pl-2">Product Verification</span>
                    </a><br><br>

                    <a href="/profilebuyer">
                        <i class="fas fa-bags-shopping" aria-hidden="true" style="font-size:15px"></i>
                        <span class="pl-2">Buyer Page</span>
                    </a>
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
