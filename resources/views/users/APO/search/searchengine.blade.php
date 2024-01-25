@extends('users/mainMaster')

@section('title')

search 

@endsection

@section('content')

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="/assets/css/search.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s003">
      <h2 class="searchP">Search Engine</h2>
      <form class="searchform" method="GET" action="{{route('apology.data')}}">
        @csrf
        @method('GET')
        <div class="inner-form">
          <div class="drop">
           <select required name="action">
            <option value="order">order</option>
            <option value="id">ID</option>
           </select>
          </div>
         
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
                
          
    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->


@endsection