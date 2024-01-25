$(function(e) {
	
	//Basic
	$('#swal-basic').on('click', function () {
		swal('Welcome to Your Admin Page')
	});
	
	//A title with a text under
	$('#swal-title').click(function () {
		swal(
			{
				title: 'Here is  a title!',
				text: 'All are available in the template',
			}
		)
	});
	
	//Success Message
	$('#swal-success').click(function () {
		swal(
			{
				title: 'Well done!',
				text: 'You clicked the button!',
				type: 'success',
				confirmButtonColor: '#57a94f'
			}
		)
	});
	
	//Warning Message
	$('.swal-reject').click(function () {
		swal({
		  title: "Are you sure",
		  text: "Your will Done this action",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Done",
		  closeOnConfirm: false
		},
		function(){
		  swal("Done", "Your Record Rejected .", "success");
		}, function(){
			
		});
	});
	$('.swal-accept').click(function () {
		swal({
		  title: "Are you sure",
		  text: "Your will Done this action",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Done",
		  closeOnConfirm: false
		},
		function(){
		  swal("Done", "Your Record Accepted .", "success");
		});
	});
	//Parameter
	$('#swal-parameter').click(function () {
		swal({
		  title: "Are you sure",
		  text: "You will done this action !",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Reject",
		  cancelButtonText: " cancel process",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
			swal("Rejected", "Your record  has been Rejected.", "success");
		  } else {
			swal("Cancelled", "Your process not done :)", "error");
		  }
		});
	});
	
	//Custom Image
	$('#swal-image').click(function () {
		swal({
			title: 'Lovely!',
			text: 'your image is uploaded.',
			imageUrl: 'assets/img/brand/logo.png',
			animation: false
		})
	});
	
	//Auto Close Timer
	$('#swal-timer').click(function () {
		swal({
			title: 'Auto close alert!',
			text: 'I will close in 1 seconds.',
			timer: 1000
		}).then(
			function () {
			},
			// handling the promise rejection
			function (dismiss) {
				if (dismiss === 'timer') {
					console.log('I was closed by the timer')
				}
			}
		)
	});
	
	
	//Ajax with Loader Alert
	$('#swal-ajax').click(function () {
		swal({
		  title: "Ajax request example",
		  text: "Submit to run ajax request",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, function () {
		  setTimeout(function () {
			swal("Ajax request finished!");
		  }, 2000);
		});
	});
	
});