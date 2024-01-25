@extends('users/mainMaster')


@section('title')

Apology page 

@endsection

@section('content')

<head>
    <link href="assets/css/homeApo.css" rel="stylesheet" />
    <script type="script" src="assets/js/homeApo.js"></script>
</head>

    <h2 >Select your Option :</h2>
    <ul class="">
       <a href="cs/search">
        <li class="card">
            <div>
                <h3 class="card-title"> Search </h3>
                <div class="card-content">
                    <p> Feature provide to find an Apology that our customer take it before  , It scalable and easy to use ,</p>
                </div>
            </div>
        </li>
       </a>

        <br>

      <a href="/generation_Form">
        <li class="card">
            <div>
                <h3 class="card-title"> Generate Apology </h3>
                <div class="card-content">
                    <p>Feature provide unique and comprehensive service to generate Apology By automation in Standard cases</p>
                </div>
            </div>
        </li>
       </a>

    </ul>
  


@endsection