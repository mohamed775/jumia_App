@extends('dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!--- Internal Sweet-Alert css-->
<link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Userlist</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Requests TABLE</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">this table show exceptional requests via agent </p>
							</div>
							@if(session('success'))
                            <div class="alert alert-success  alert-dismissible fade show  align-items-center justify-content-center" role="alert">
                              <div class="text-center">
								{{ session('success') }}
							  </div>
                            </div>
                            @endif
							@if(session('data'))
                            <div class="alert alert-success  alert-dismissible fade show  align-items-center justify-content-center" role="alert">
                              <div class="text-center">
                                 WEEK : {{ session('data')['week'] }} _____ CODE : {{ session('data')['Code'] }} _____ AMOUNT : {{ session('data')['Amount'] }} _____ ExpireDate : {{ session('data')['ExpaireDate'] }} 
							  </div>
                            </div>
                            @endif
							{{-- @if(session('data'))
                             {{ session('data')['Code'] }}
                             @endif --}}
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr>
												<th class="wd-lg-8p"><span>ID</span></th>
												<th class="wd-lg-8p"><span>Agnet</span></th>
												{{-- <th class="wd-lg-20p"><span></span></th> --}}
												<th class="wd-lg-20p"><span>Request_Date</span></th>
												<th class="wd-lg-20p"><span>Order_Number</span></th>
												<th class="wd-lg-20p"><span>Amount</span></th>
												<th class="wd-lg-20p"><span>Customer_ID</span></th>
												<th class="wd-lg-20p"><span>Case_Number</span></th>
												<th class="wd-lg-20p"><span>Contact_Reason</span></th>
												<th class="wd-lg-20p"><span>Channel</span></th>
												<th class="wd-lg-20p"><span>status</span></th>
												{{-- <th class="wd-lg-20p"><span>Action</span></th> --}}
											</tr>
										</thead>
										<tbody>
											@if(isset($data))
											<?php $i= 1 ; ?> 

											@foreach ($data as $data)
											<tr>
												{{-- <td>
													<img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset('assets/img/faces/1.jpg')}}">
												</td> --}}
												<td>{{$i++}}</td>
												<td>{{$data->AgentName}}</td>
												<td>{{$data->DateGiven}}</td>
												<td>{{$data->OrderNumber}}</td>
												<td>{{$data->Amount}}</td>
												<td>{{$data->CustomerID}}</td>
												<td>{{$data->CaseNumber}}</td>
												<td>{{$data->ContactReason}}</td>
												<td>{{$data->Channel}}</td>
												@if($data->status == 'Pending')
												<td class="text-center">
													<span class="label text-warning d-flex"><div class="dot-label bg-warning ml-1"></div>Pending</span>
												</td>
												<td>
												<form action="{{ route('accept', ['id' => $data->id]) }}" method="post">
													@csrf
													<button type="submit" ><a class="btn btn-sm btn-success">
														<i class="las la-check"></i>
													</a></button>
												</form>	
												<br>
												<form action="{{ route('reject', ['id' => $data->id]) }}" method="post">
													@csrf

													<button type="submit" ><a class="btn btn-sm btn-danger  ">
														<i class="las la-times"></i>
													</a></button>
												</form>
												</td>
												{{-- <td>
													<div class="btn  swal-warning">
															Click me !
													</div>
														</div>
												</td> --}}
												@elseif($data->status == 'Accepted')
												<td class="text-center">
													<span class="label text-success d-flex"><div class="dot-label bg-success ml-1"></div>Accepted</span>
												</td>
												@elseif($data->status == 'Rejected')
												<td class="text-center">
													<span class="label text-danger d-flex"><div class="dot-label bg-danger ml-1"></div> Rejected</span>
												</td>
												<td></td>

												@endif
											
											</tr>
											@endforeach
											@endif
										</tbody>
									</table>
								</div>
								<ul class="pagination mt-4 mb-0 float-left">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/ratings.js')}}"></script>
<!--Internal  Sweet-Alert js-->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
<!-- Sweet-alert js  -->
<script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
@endsection