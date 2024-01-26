@extends('dashboard.layouts.master')
@section('css')
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Vendor CSS-->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- Main CSS-->
<link href="assets/css/custom.css" rel="stylesheet" media="all">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Filter</span>
						</div>
					</div>
			

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
			    <div class="row row-sm">
			
					<div class="col-xl-12">
						<div class="card">
							<br>
							<form method="GET" action="{{route('ContactReasonReport')}}">
								<div class="form-row m-2">
									<div class="form-group col-md-2">
										<label for="inputState">From</label>
										<input type="datetime-local" class="form-control" id="inlineFormInputName"  name="startDate" placeholder="{{ $from ?? ''}}">
									</div>
									<div class="form-group col-md-2">
										<label for="inputState">To</label>
										<input type="datetime-local" class="form-control" id="inlineFormInputName" name="endDate" placeholder="{{$to ?? ''}}">
									</div>
									  <div class="form-group col-md-4 ">
										<button class="glow-on-hover" type="submit">Filter</button>							
								      </div>
								  </div>
							</form>
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">STRIPED ROWS</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap example" >
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">Contact_Reason</th>
												<th class="wd-15p border-bottom-0">Total_Request</th>
												<th class="wd-15p border-bottom-0">Total_Ex_req</th>
												<th class="wd-15p border-bottom-0">Total_Ex_Acc</th>
												<th class="wd-15p border-bottom-0">Total_Ex_Rej</th>
												<th class="wd-15p border-bottom-0">Amount</th>
												<th class="wd-15p border-bottom-0">Count_Cases</th>
												<th class="wd-20p border-bottom-0">Count_Order</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											
											@if (isset($total_request))
											<tr>
												<td>{{$total_request}}</td>
												<td>{{$total_amount}}</td>
												<td>{{$Count_Cases}}</td>
												<td>{{$Count_Order}}</td>
												<td>{{$total_request}}</td>
												<td>{{$total_request}}</td>
												<td>{{$total_request}}</td>
												<td>{{$total_request}}</td>
												<td></td>
											</tr>
											@endif
										</tbody>
									</table>
								</div>
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->

				
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="vendor/jquery/jquery.min.js"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="assets/js/form.js"></script>
@endsection