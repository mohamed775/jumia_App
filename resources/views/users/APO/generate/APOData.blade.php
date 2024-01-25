@extends('users/mainMaster')

@section('title')

Data
@endsection

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/back.css" rel="stylesheet" >

</head>

  <div class="alert alert-success" role="alert">
   <strong>Success!</strong>Your Apology Generated Successfully     *_*   
  </div>
<br>
@if (isset($inputs->Code))
    
<table class="table">
    <thead>
      <tr>
        <th scope="col">WeekIssued</th>
        <th scope="col">Code</th>
        <th scope="col">Amount</th>
        <th scope="col">VoucherExpiretionDate</th>
        <th scope="col">OrderNumber</th>
        <th scope="col">Case Number</th>
        <th scope="col">CustomerID</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$inputs->WeekIssued}}</th>
        <td>{{$inputs->Code}} </td>
        <td>{{$inputs->Amount}}</td>
        <td>{{$inputs->ExpaireDate}}</td>
        <td>{{$inputs->OrderNumber}}</td>
        <td>{{$inputs->CaseNumber}}</td>
        <td>{{$inputs->CustomerID}}</td>
      </tr>
    </tbody>
  </table>
  @endif

<br>
<a href="{{route('form.view')}}">
  <button class="btn" type="button">
    <strong>New Apology</strong>
    <div id="container-stars">
      <div id="stars"></div>
    </div>
  
    <div id="glow">
      <div class="circle"></div>
      <div class="circle"></div>
    </div>
  </button>
</a>
@endsection

