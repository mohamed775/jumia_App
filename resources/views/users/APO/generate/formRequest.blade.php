@extends('users/mainMaster')

@section('title')

form 

@endsection

@section('content')

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/form2.css" rel="stylesheet" media="all">

</head>

<body>
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Generate Apology</h2>
                    <form method="POST" action="{{url('/generate')}}">
                        @csrf
                        @method('POST')

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Customer Email</label>
                                    <input class="input--style-4" type="text" name="CustomerEmail" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-4" type="" value="{{ Auth::user()->email }} " name="AgentName" required hidden>
                                </div>
                            </div>
                            
                        </div>
                   
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Customer ID</label>
                                    <input class="input--style-4" type="text" name="CustomerID" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Order Number</label>
                                    <input class="input--style-4" type="text" name="OrderNumber"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="datetime-local" name="DateGiven"  required> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Amount</label>
                                    <input class="input--style-4" type="text" name="Amount"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Case Number</label>
                                    <input class="input--style-4" type="text" name="CaseNumber"  required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Payment Method</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="paidMethod"  required>
                                            <option disabled="disabled" selected="selected">customer payment</option>
                                            <option>Cash on Delivery</option>
                                            <option>prepaid</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        

                        <div class="input-group">
                            <label class="label">Contact Reason</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="ContactReason"  required>
                                    <option disabled="disabled" selected="selected">Select Your Reason</option>
                                    <option>Cancellation by Jumia/Seller</option>
                                    <option>Delivery agent misbehaviour/appearance</option>
                                    <option>Delivery delay</option>
                                    <option>Late Refund</option>
                                    <option>Failed Delivery</option>
                                    <option>Late return pickup / Tax invoice</option>
                                    <option>Invalid voucher</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                     
                        <div class="input-group">
                            <label class="label">Channel</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="Channel" required>
                                    <option disabled="disabled" selected="selected">Select Your Channel</option>
                                    <option>CS Inbound</option>
                                    <option>Live Chat</option>
                                    <option>Social Media</option>
                                    <option>IR Team</option>
                                    <option>Sales</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space " id="exception">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Apology amount</label>
                                    <input class="input--style-4" type="text" name="Apo_Amount" >
                                </div>
                            </div>
                        </div>
                        <div class="checkboxlocation">
                            <input class="checkBox" type="checkbox" name="typeRequest"  id="myCheckbox"  onchange="handleCheckboxChange()" >
                            <label class="label" style="display:inline-flex">Exceptional</label>
                        </div>
                        <br>
                       
                        <div class="p-t-15">
                            <button class="bn632-hover bn19" type="submit">Submit</button>
                            <button class="button" type="reset">
                                <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                            </button>                        
                        </div>
                    
                        @if(session('success'))
                        <div class="alert alert-success" role="alert" ">
                          {{ session('success') }}
                        </div>
                        @endif
                        @if(session('failed')) 
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed') }}
                          </div>
                       @endif
                     
                       
                    </form>
                </div>
            </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets/js/form.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


@endsection

