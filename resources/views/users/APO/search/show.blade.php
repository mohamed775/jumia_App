@extends('users/mainMaster')

@section('title')

search 

@endsection

@section('content')

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="/assets/css/search.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  </head>
  <body>
    <h2 class="searchP">Search Engine</h2>

    <div class="s003">
      <form method="GET" action="{{route('apology.data')}}">
        @csrf
        @method('GET')
        <div class="inner-form">
          <div class="drop">
           <select required name="action">
            <option value="order">order</option>
            <option value="id">ID</option>
           </select>
          </div>
          {{-- <div class="input-field second-wrap">
            <input required id="search" type="text" placeholder="Order OR Id  ?" name="action" />
          </div> --}}
          <div class="input-field second-wrap">
            <input required id="search" type="text" placeholder="Enter Number ?" name="number" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">
              <img src="/assets/img/images/systemsearch_104123.png" width="40px" height="40px" class="imgsearch">
            </button>
          </div>
        </div>
      </form>
    </div>
    
    <table class="table"  >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Week Issued</th>
          <th scope="col">Code</th>
          <th scope="col">Amount</th>
          <th scope="col">Voucher Expiration date</th>
          <th scope="col">Contact Reason </th>
          <th scope="col">Order Number</th>
          <th scope="col">Customer ID</th>
          <th scope="col">Channal</th>
        </tr>
      </thead>
      
    @if (isset($APOData))
          
      <tbody>
          <?php 
          $i=0 ?>
           @foreach ($APOData as $APOData)
           <?php $i++ ?>
           <th scope="row"> {{$i}} </th>
           <th > {{$APOData->WeekIssued}}  </th>
           <td> {{$APOData->Code}} </td>
           <td>{{$APOData->Amount}}</td>
           <td>{{$APOData->ExpaireDate}}</td>
           <td>{{$APOData->ContactReason}}</td>
           <td>{{$APOData->OrderNumber}}</td>
           <td>{{$APOData->CustomerID}}</td>
           <td>{{$APOData->Channel}}</td>
  
          </tr>
          @endforeach            
     
            <tr>
         </tbody>
    @endif

    </table>

    @if(isset($message))
        <div class="alert alert-danger" role="alert">
         {{ $message }}
        </div>
    @endif
     



    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


@endsection















{{-- 


<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Week Issued</th>
        <th scope="col">Code</th>
        <th scope="col">Amount</th>
        <th scope="col">Voucher Expiration date</th>
        <th scope="col">Contact Reason </th>
        <th scope="col">Order Number/SF Tkt</th>
        <th scope="col">Customer ID</th>
        <th scope="col">Date Given</th>
        <th scope="col">Channal</th>
      </tr>
    </thead>
 
    <tbody>
      @foreach ($APOData as $APOData)
      <th scope="row"> {{$APOData->WeekIssued}}  </th>
         <td> {{$APOData->Code}} </td>
         <td>{{$APOData->Amount}}</td>
         <td>{{$APOData->VoucherExpiretionDate}}</td>
         <td>{{$APOData->ContactReason}}</td>
         <td>{{$APOData->OrderNumber}}</td>
         <td>{{$APOData->CustomerID}}</td>
         <td>{{$APOData->DateGiven}}</td>
         <td>{{$APOData->Channel}}</td>

      </tr>
      @endforeach
      <tr>
    </tbody>
  </table>





  {{-- <tbody>
    <th scope="row">#####</th>
    <td>#####</td>
    <td>####</td>
    <td>####</td>
    <td>####</td>
    <td>####</td>
    <td>####</td>
    <td>####</td>
    <td>####</td>
  </tbody> --}} 