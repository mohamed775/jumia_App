@extends('dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/css/upload.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if(session('failed'))
    <div class="alert alert-danger alert-dismissible fade show  align-items-center justify-content-center" role="alert">
      <div class="text-center">
        {{ session('failed') }}
      </div>  
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success  alert-dismissible fade show  align-items-center justify-content-center" role="alert">
      <div class="text-center">
        {{ session('success') }}
      </div>  
    </div>
@endif

                  <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="container">
                        <div class="card">
                          <h3>Upload Files</h3>
                          <div class="drop_box">
                            <header>
                              <h4>Select File here</h4>
                            </header>
                            <p>Files Supported: CSV only</p>
                            <input type="file" name="mycsv" >
                            <button class="btn" type="submit">upload</button>
                            
                          </div>
                      
                        </div>
                      </div>
                  </form>
@endsection
@section('js')
<script src="{{URL::asset('assets/js/upload.js')}}"></script>

@endsection